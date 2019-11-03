<?php

namespace Model;

class AddressModel
{
    private $number;
    private $street;

    public function __construct($maybeNumber, $maybeStreet = null)
    {
        if(is_null($maybeStreet)) {
            $this -> streetAdress = $maybeNumber;
        } else {
            $this -> number = $maybeNumber;
            $this -> street = $maybeStreet;
        }
    }

    public function __set($prop, $value)
    {
        if($prop === "streetAdress") {
            if(preg_match("/^(\d+.*?)[\s,]+(.+)$/", $value, $matches)) {
                $this -> number = $matches[1];
                $this -> street = $matches[2];
            } else {
                throw new Exception("Error in adress : {$value}");
            }
        }
    }

    public function __get($prop)
    {
        if($prop === "streetAdress") {
            return $this -> number . " " . $this -> street;
        }
    }
}