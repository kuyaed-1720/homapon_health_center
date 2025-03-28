<?php

class App
{

    private $controller = 'AuthController';
    private $method = 'index';

    private function splitURL()
    {
        $URL = $_GET['url'];
        if (!$URL) {
            $URL = 'auth';
        }
        $URL = explode("/", trim($URL, "/"));
        return $URL;
    }

    public function loadController()
    {
        $URL = $this->splitURL();

        $filename = "../app/Controllers/" . ucfirst($URL[0]) . "Controller.php";
        if (file_exists($filename)) {
            require $filename;
            $this->controller = ucfirst($URL[0]) . "Controller";
            unset($URL[0]);
        } else {
            die("Controller " . $filename . " not found!");
        }
        $controller = new $this->controller;
        if (!empty($URL[1])) {
            if (method_exists($controller, $URL[1])) {
                $this->method = $URL[1];
                unset($URL[1]);
            }
        }
        call_user_func_array([$controller, $this->method], []);
    }
}
