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
 * Class Model
 *
 * @package App\Models
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
        if (null != $var = $this->fromCamelCase(lcfirst(substr($method, 3)))) {
            if ($type == "get") {
                return $this->__get($var);
            }elseif ($type == "set") {
                return $this->__set($var, $params[0]);
            }
        }

        return parent::__call($method, $params);
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