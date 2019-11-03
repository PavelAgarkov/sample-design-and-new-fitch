<?php

spl_autoload_register(
    function ($className) {
        $alias = explode("\\", $className);
        $count = count($alias) - 1;
        $lastAlias = end($alias);
        $name = preg_split('/(?<=[a-z])(?=[A-Z])/u', $lastAlias);

        $directory = "";
        foreach ($alias as $key => $item) {
            if($key <= $count - 1) {
                $directory .= $item . "/";
            }
        }
        $className = implode("", $name);
        $fileName = $directory . $className . '.php';
        require_once $fileName;
    }
);