<?php

namespace Model;

use delegate\PersonWriterDelegate;

class PersonModel
{
    private $_name;
    private $_age;
    private $writer;

    public function __construct(PersonWriterDelegate $writer)
    {
        $this -> writer = $writer;
    }

    public function __call($methodName, $arguments)
    {
        if(method_exists($this -> writer, $methodName)) {
            return $this -> writer -> $methodName($this);
        }
    }

    public function __set($property, $value)
    {
        $method = "set{$property}";
        if (method_exists($this, $method)) {
            return $this->$method($value);
        }
    }

    public function __unset($property)
    {
        $method = "set{$property}";
        if (method_exists($this, $method)) {
            $this->$method(null);
        }
    }

    public function setName($name)
    {
        $this->_name = $name;
        if (!is_null($name)) {
            $this->_name = strtoupper($this->_name);
            echo $this->_name;
        }
    }

    function setAge($age)
    {
        $this->_age = strtoupper($age);
    }

    public function __get($property)
    {
        $method = "get{$property}";
        if (method_exists($this, $method)) {
            return $this->$method();
        }
    }

    public function __isset($property)
    {
        $method = "get{$property}";
        return (method_exists($this, $method));
    }

    public function getName()
    {
        echo "Ivan1";
    }

    public function getAge()
    {
        return 44;
    }
}