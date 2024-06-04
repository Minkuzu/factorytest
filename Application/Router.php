<?php
namespace App;
class Router {
    protected $routes = [];

    public function addRoute() { 
        //$this->routes[$route] = ['controller' => $controller, 'action' => $action]; //-> this function is currently empty
        //$this->routes['/'] = ['DantriParserController', 'home']
        // echo "hello";
    }

    public function dispatch($uri) { //$uri = /factorytest/Application/
        if (array_key_exists($uri, $this->routes)) { //$this->routes is currently null -> which means the addRoute() is not working
            $controller = $this->routes[$uri]['controller']; //$this->routes[/factorytest/Application/DantriParserController]
            $action = $this->routes[$uri]['action'];

            $controller = new $controller();
            $controller->$action();
        } else {
            throw new \Exception("No route found for URI: $uri");
        }
    }
}
    