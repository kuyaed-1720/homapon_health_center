<?php

class Route
{
    public static function get($route, $controller, $action)
    {
        Router::get($route, $controller, $action);
    }
    public static function post($route, $controller, $action)
    {
        Router::post($route, $controller, $action);
    }
    public static function delete($route, $controller, $action)
    {
        Router::post($route, $controller, $action);
    }
}
