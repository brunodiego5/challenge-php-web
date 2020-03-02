<?php

namespace Cpw;

class Model {

  private $values = [];

  public function __call($name, $arguments)
  {
    $method = substr($name, 0, 3);
    $fieldName = substr($name, 3, strlen($name));

    switch ($method)
    {
      case "get":
        return $this->values[$fieldName];
      break;

      case "set":
        $this->values[$fieldName] = $arguments[0];
      break;
    }


  }

  public function setData($data = array())
  {
    foreach ($data as $key => $value) {
      $this->{"set".$key}($value);
    }
  }

  public function getValues()
  {
    return $this->values;
  }

  public static function utf8_string_array_encode(&$array){
    $func = function(&$value,&$key){
        if(is_string($value)){
            $value = utf8_encode($value);
        }
        if(is_string($key)){
            $key = utf8_encode($key);
        }
        if(is_array($value)){
          Model::utf8_string_array_encode($value);
        }
    };
    array_walk($array,$func);
    return $array;
}

}


?>