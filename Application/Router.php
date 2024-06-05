<?php

namespace App;

class Router
{
    protected $method;
    protected $controller;

    public function __construct(
        $method, $controller
    ){
        $this->method=$method;
        $this->controller = $controller;
    }

    // private function addRoute($route, $controller, $action, $method)
    // {

    //     $this->routes[$method][$route] = ['controller' => $controller, 'action' => $action];
    // }

    // public function get($route, $controller, $action)
    // {
    //     $this->addRoute($route, $controller, $action, "GET");
    // }

    // public function post($route, $controller, $action)
    // {
    //     $this->addRoute($route, $controller, $action, "POST");
    // }
    //add if statement to verify the URI is in the DantriController.php path -> if yes, create DantriController object -> call to home() action
    public function dispatch()
    {
        $uri = strtok($_SERVER['REQUEST_URI'], '?');
        $method =  $_SERVER['REQUEST_METHOD'];

        // if (array_key_exists($uri, $this->routes[$method])) {
            // $controller = $this->routes[$method][$uri]['controller'];
            // $action = $this->routes[$method][$uri]['action'];

            // $controller = new $controller();
            // $controller->$action();
        // } else {
        //     throw new \Exception("No route found for URI: $uri");
        // }
    }
}