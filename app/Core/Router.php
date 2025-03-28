<?php

class Router
{
    private static $routes = [];

    public static function get($route, $controller, $action)
    {
        self::$routes[] = [
            'method' => 'GET',
            'route' => $route,
            'controller' => $controller,
            'action' => $action
        ];
    }

    public static function post($route, $controller, $action)
    {
        self::$routes[] = [
            'method' => 'POST',
            'route' => $route,
            'controller' => $controller,
            'action' => $action
        ];
    }

    public static function delete($route, $controller, $action)
    {
        self::$routes[] = [
            'method' => 'DELETE',
            'route' => $route,
            'controller' => $controller,
            'action' => $action
        ];
    }

    public static function match()
    {
        $url = trim(substr($_SERVER['REQUEST_URI'], strlen('homapon_health_center/public/')), '/');
        $url = $url ? $url : '/';
        $method = $_SERVER['REQUEST_METHOD'];

        foreach (self::$routes as $route) {
            // if ($method == $route['method'] && $url == $route['route']) {
            //     return $route;
            // }
            $route_pattern = preg_replace('/{(\w+)}/', '(\d+)', $route['route']); // Match dynamic {id} part
            if ($method == $route['method'] && preg_match("#^$route_pattern$#", $url, $matches)) {
                // Extract dynamic parameters (like id)
                array_shift($matches); // Remove the full match from the beginning
                $route['params'] = $matches; // Store matched params (e.g., user ID)
                return $route;
            }
        }
        return null;
    }

    public static function dispatch()
    {
        $route = self::match();

        if ($route) {
            $controller_name = ucfirst($route['controller']) . 'Controller';
            $action_name = $route['action'];

            if (class_exists($controller_name)) {
                $controller = new $controller_name();

                if (method_exists($controller, $action_name)) {
                    // $controller->$action_name();
                    call_user_func_array([$controller, $action_name], $route['params']);
                } else {
                    echo "Action $action_name not found in controller $controller_name";
                }
            } else {
                echo "Controller $controller_name not found";
            }
        } else {
            echo "Route not found";
        }
    }
}
