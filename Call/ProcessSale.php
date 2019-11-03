<?php

namespace Call;

use Exception;

class ProcessSale
{
    private $callbacks;

    public function registerCallback($callback)
    {
        if(!is_callable($callback)) {
            throw new Exception("Функция не вызываема");
        }
        $this -> callbacks[] = $callback;
    }

    public function sale($product)
    {
        print "{$product -> name} : обрабатывается... \n";
        foreach ($this -> callbacks as $callback) {
            call_user_func($callback, $product);
        }
    }

}