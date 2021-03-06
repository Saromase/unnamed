<?php
/**
 * Created by PhpStorm.
 * User: Maps_red
 * Date: 10/10/2017
 * Time: 22:56
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as BaseModel;

/**
 * App\Models\CustomModel
 *
 * @mixin \Eloquent
 */
class CustomModel extends BaseModel
{
    /**
     * @param string $method
     * @param array $params
     * @return mixed
     */
    public function __call($method, $params)
    {
        $type = substr($method, 0, 3);
        $params[0] = isset($params[0]) ? $this->transformValue($params[0]) : null;
        if (null != $var = $this->fromCamelCase(lcfirst(substr($method, 3)))) {
            if ($type == "get") {
                return $this->__get($var);
            }elseif ($type == "set") {
                return $this->__set($var, $params[0]);
            }elseif(strpos($method, "findOneBy") !== false) {
                $column = str_replace("findOneBy", "", $method);
                $column = $this->fromCamelCase(lcfirst($column));
                if (is_array($params[0])) {
                    return $this->where($this->paramsToData($params[0]))->first();
                }

                return $this->where($column, "=", $params[0])->first();
            }elseif(strpos($method, "findBy") !== false) {
                $column = str_replace("findBy", "", $method);
                $column = $this->fromCamelCase(lcfirst($column));
                if (is_array($params[0])) {
                    return $this->where($this->paramsToData($params[0]))->get();
                }

                return $this->where($column, "=", $params[0])->get();
            }
        }

        return parent::__call($method, $params);
    }

    /**
     * @param $params
     * @return array
     */
    private function paramsToData($params)
    {
        return array_map(function ($key, $value) {
            return [$key, "=", $this->transformValue($value)];
        }, array_keys($params), $params);
    }

    /**
     * @param BaseModel|mixed $value
     * @return mixed
     */
    private function transformValue($value)
    {
        return $value instanceof BaseModel ? $value->getId() : $value;
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return $this
     */
    public function __set($key, $value)
    {
        parent::__set($key, $value);

        return $this;
    }

    /**
     * @param $input
     * @return string
     */
    public function fromCamelCase($input)
    {
        preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $input, $matches);
        $ret = $matches[0];
        foreach ($ret as &$match) {
            $match = $match == strtoupper($match) ? strtolower($match) : lcfirst($match);
        }

        return implode('_', $ret);
    }
}