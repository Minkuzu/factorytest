<?php


use App\Router as Router;
use App\Controllers\DantriParserController;

$router = new Router();
$router->addRoute('/', DantriParserController::class, 'home');
    