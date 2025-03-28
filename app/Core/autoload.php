<?php

function my_autoload($class)
{
    // require "../app/Models/" . $class . ".php";
    $model_base_dir = "../app/Models/";
    $controller_base_dir = "../app/Controllers/";

    if (file_exists($model_base_dir . $class . '.php')) {
        require_once $model_base_dir . $class . '.php';
    } elseif (file_exists($controller_base_dir . $class . '.php')) {
        require_once $controller_base_dir . $class . '.php';
    } else {
        echo "Class '$class' not found";
    }
}

spl_autoload_register('my_autoload');
