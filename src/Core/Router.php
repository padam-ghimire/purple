<?php

// src/Core/Router.php

namespace App\Core;

class Router
{
    protected static $routes = [];


    public static function get($uri, $action)
    {
        self::$routes[] = [
            'method' => 'GET',
            'uri' => $uri,
            'action' => $action
        ];
    }
    public static function dispatch($request)
    {
        $uri = $request->getUri();
    
        foreach (self::$routes as $route) {
            if ($route['uri'] === $uri) {
               
                [$controllerName, $method] = explode('@', $route['action']);
                $controllerClass = 'App\\Controllers\\' . $controllerName;
                if (class_exists($controllerClass)) {
                
                    $controllerInstance = new $controllerClass();
                    return $controllerInstance->$method();
                } else {
                    // If the controller class does not exist, return a 404 response
                    return new Response("404 Not Found", 404);
                }
            }
        }
    
       
    }
}