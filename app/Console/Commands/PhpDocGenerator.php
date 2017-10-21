<?php

namespace App\Console\Commands;

use Barryvdh\LaravelIdeHelper\Console\ModelsCommand;
use Illuminate\Support\Str;
use Symfony\Component\Console\Output\OutputInterface;
use Barryvdh\Reflection\DocBlock;
use Barryvdh\Reflection\DocBlock\Context;
use Barryvdh\Reflection\DocBlock\Tag;
use Barryvdh\Reflection\DocBlock\Serializer as DocBlockSerializer;


class PhpDocGenerator extends ModelsCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string $signature
     */
    protected $signature = 'doc:generator';

    /**
     * The console command description.
     *
     * @var string $description
     */
    protected $description = 'Command description';

    /** @var bool $where */
    private $where;

    public function handle()
    {
        $this->write = true;
        $this->reset = true;
        $this->where = false;
        $this->dirs = $this->laravel['config']->get('ide-helper.model_locations');
        $models = $this->loadModels();
        $this->generateDocs($models, '');
    }

    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     */
    protected function getMethods($model)
    {
        $table = $model->getConnection()->getTablePrefix() . $model->getTable();
        $schema = $model->getConnection()->getDoctrineSchemaManager($table);

        $database = null;
        if (strpos($table, '.')) {
            list($database, $table) = explode('.', $table);
        }

        $columns = $schema->listTableColumns($table, $database);

        if ($columns) {
            foreach ($columns as $column) {
                $name = $column->getName();
                if (in_array($name, $model->getDates())) {
                    $type = '\Carbon\Carbon';
                } else {
                    $type = $column->getType()->getName();
                    switch ($type) {
                        case 'string':
                        case 'text':
                        case 'date':
                        case 'time':
                        case 'guid':
                        case 'datetimetz':
                        case 'datetime':
                            $type = 'string';
                            break;
                        case 'integer':
                        case 'bigint':
                        case 'smallint':
                            $type = 'integer';
                            break;
                        case 'boolean':
                            switch (config('database.default')) {
                                case 'sqlite':
                                case 'mysql':
                                    $type = 'integer';
                                    break;
                                default:
                                    $type = 'boolean';
                                    break;
                            }
                            break;
                        case 'decimal':
                        case 'float':
                            $type = 'float';
                            break;
                        default:
                            $type = 'mixed';
                            break;
                    }
                }

                $this->setMethod(Str::camel("get_" . $name), $type, [], false);
                $this->setMethod(Str::camel("set_" . $name), '\\' . get_class($model), ['$value'], false);
                $this->setMethod(Str::camel("find_one_by_" . $name), '\\' . get_class($model), ['$value']);
                if ($name !== "id") {
                    $this->setMethod(Str::camel("find_by_" . $name), '\Illuminate\Database\Eloquent\Collection|\\' . get_class($model) . "[]", ['$value']);
                }
                if ($this->where) {
                    $this->setMethod(Str::camel("where_" . $name), '\Illuminate\Database\Eloquent\Builder', ['$value']);
                }
            }

            $this->setMethod(Str::camel("find_one_by"), '\\' . get_class($model), ['array $value']);
            $this->setMethod(Str::camel("find_by"), '\Illuminate\Database\Eloquent\Collection|\\' . get_class($model) . "[]", ['array $value']);
            $this->setMethod(Str::camel("get"), '\Illuminate\Database\Eloquent\Collection|\\' . get_class($model) . "[]", ['$columns = []']);
        }
    }

    protected function generateDocs($loadModels, $ignore = '')
    {


        $output = "<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */
\n\n";

        $hasDoctrine = interface_exists('Doctrine\DBAL\Driver');

        if (empty($loadModels)) {
            $models = $this->loadModels();
        } else {
            $models = array();
            foreach ($loadModels as $model) {
                $models = array_merge($models, explode(',', $model));
            }
        }

        $ignore = explode(',', $ignore);
        foreach ($models as $name) {
            if (in_array($name, $ignore)) {
                if ($this->output->getVerbosity() >= OutputInterface::VERBOSITY_VERBOSE) {
                    $this->comment("Ignoring model '$name'");
                }
                continue;
            }
            $this->properties = array();
            $this->methods = array();
            if (class_exists($name)) {
                try {
                    // handle abstract classes, interfaces, ...
                    $reflectionClass = new \ReflectionClass($name);

                    if (!$reflectionClass->isSubclassOf('Illuminate\Database\Eloquent\Model')
                        || $reflectionClass->isSubclassOf('Illuminate\Database\Eloquent\Relations\Pivot')) {
                        continue;
                    }

                    if ($this->output->getVerbosity() >= OutputInterface::VERBOSITY_VERBOSE) {
                        $this->comment("Loading model '$name'");
                    }

                    if (!$reflectionClass->IsInstantiable()) {
                        // ignore abstract class or interface
                        continue;
                    }

                    $model = $this->laravel->make($name);

                    if ($hasDoctrine) {
                        $this->getPropertiesFromTable($model);
                    }

                    if (method_exists($model, 'getCasts')) {
                        $this->castPropertiesType($model);
                    }

                    $this->getPropertiesFromMethods($model);
                    $this->getSoftDeleteMethods($model);
                    $this->getMethods($model);
                    $output .= $this->createPhpDocs($name);
                    $ignore[] = $name;
                    $this->nullableColumns = [];
                } catch (\Exception $e) {
                    $this->error("Exception: " . $e->getMessage() . "\nCould not analyze class $name.");
                }
            }
        }

        if (!$hasDoctrine) {
            $this->error(
                'Warning: `"doctrine/dbal": "~2.3"` is required to load database information. ' .
                'Please require that in your composer.json and run `composer update`.'
            );
        }

        return $output;
    }

    /**
     * @param $name
     * @param string $type
     * @param array $arguments
     * @param bool $static
     */
    protected function setMethod($name, $type = '', $arguments = array(), $static = true)
    {
        $methods = array_change_key_case($this->methods, CASE_LOWER);
        if (!isset($methods[strtolower($name)])) {
            $this->methods[$name] = array();
            $this->methods[$name]['type'] = $type;
            $this->methods[$name]['arguments'] = $arguments;
            $this->methods[$name]['static'] = $static;
        }
    }

    /**
     * @param string $class
     * @return string
     */
    protected function createPhpDocs($class)
    {

        $reflection = new \ReflectionClass($class);
        $namespace = $reflection->getNamespaceName();
        $classname = $reflection->getShortName();
        $originalDoc = $reflection->getDocComment();

        if ($this->reset) {
            $phpdoc = new DocBlock('', new Context($namespace));
        } else {
            $phpdoc = new DocBlock($reflection, new Context($namespace));
        }

        if (!$phpdoc->getText()) {
            $phpdoc->setText($class);
        }

        $properties = array();
        $methods = array();
        foreach ($phpdoc->getTags() as $tag) {
            $name = $tag->getName();
            if ($name == "property" || $name == "property-read" || $name == "property-write") {
                $properties[] = $tag->getVariableName();
            } elseif ($name == "method") {
                $methods[] = $tag->getMethodName();
            }
        }

        foreach ($this->properties as $name => $property) {
            $name = "\$$name";
            if (in_array($name, $properties)) {
                continue;
            }
            if ($property['read'] && $property['write']) {
                $attr = 'property';
            } elseif ($property['write']) {
                $attr = 'property-write';
            } else {
                $attr = 'property-read';
            }

            if ($this->hasCamelCaseModelProperties()) {
                $name = Str::camel($name);
            }

            $tagLine = trim("@{$attr} {$property['type']} {$name} {$property['comment']}");
            $tag = Tag::createInstance($tagLine, $phpdoc);
            $phpdoc->appendTag($tag);
        }

        ksort($this->methods);

        foreach ($this->methods as $name => $method) {
            if (in_array($name, $methods)) {
                continue;
            }
            $arguments = implode(', ', $method['arguments']);
            $static = $method['static'] ? "static " : "";
            $tag = Tag::createInstance("@method {$static}{$method['type']} {$name}({$arguments})", $phpdoc);
            $phpdoc->appendTag($tag);
        }

        if ($this->write && !$phpdoc->getTagsByName('mixin')) {
            $phpdoc->appendTag(Tag::createInstance("@mixin \\Eloquent", $phpdoc));
        }

        $serializer = new DocBlockSerializer();
        $serializer->getDocComment($phpdoc);
        $docComment = $serializer->getDocComment($phpdoc);


        if ($this->write) {
            $filename = $reflection->getFileName();
            $contents = $this->files->get($filename);
            if ($originalDoc) {
                $contents = str_replace($originalDoc, $docComment, $contents);
            } else {
                $needle = "class {$classname}";
                $replace = "{$docComment}\nclass {$classname}";
                $pos = strpos($contents, $needle);
                if ($pos !== false) {
                    $contents = substr_replace($contents, $replace, $pos, strlen($needle));
                }
            }
            if ($this->files->put($filename, $contents)) {
                $this->info('Written new phpDocBlock to ' . $filename);
            }
        }

        $output = "namespace {$namespace}{\n{$docComment}\n\tclass {$classname} extends \Eloquent {}\n}\n\n";
        return $output;
    }
}
