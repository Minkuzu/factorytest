<?php


use App\Router as Router;
use App\Controllers\DantriParserController;
require __DIR__ . "/../Router.php";
require __DIR__ . "/../Controllers/DantriParserController.php";
$router = new Router("GET","/");
$router->get('/', DantriParserController::class, 'home');
$router->dispatch();    