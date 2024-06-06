<?php


use App\Router;
use App\Controllers\DantriParserController;
require __DIR__ . "/../Router.php";
require __DIR__ . "/../Controllers/DantriParserController.php";
$router = new Router();
$router->get('/factorytest/public/', DantriParserController::class, 'home');
$router->dispatch();    