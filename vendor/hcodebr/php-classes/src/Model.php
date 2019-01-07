<?php
/**
 * Created by PhpStorm.
 * User: Hamilton
 * Date: 07/01/2019
 * Time: 08:54
 */

namespace Hcode;


class Model{

    private $values = [];

    public function __call($name, $args)
    {
        $method = substr($name, 0,3);
        $fieldName = substr($name, 3,strlen($name));

        switch ($method){

            case "get":
                return $this->values[$fieldName];
            break;

            case "set":
                $this->values[$fieldName] = $args[0];
            break;
        }

    }

    public function setData($data = array()){

        foreach ($data as $key => $value){

            $this->{"set".$key}($value);
        }
    }

    public function getValues(){

        return $this->values;
    }

}