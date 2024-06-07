<?php


use App\Router;
use App\Controllers\DantriParserController;
require __DIR__ . "/../Router.php";
require __DIR__ . "/../Controllers/DantriParserController.php";
$router = new Router();
$router->get('/factorytest/public/', DantriParserController::class, 'home');
$router->dispatch();    
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SERVER['REQUEST_URI'] === '/home') {
    require_once "../Controllers/DantriParserController.php";
    $controller = new DantriParserController();
    $controller->home();
}