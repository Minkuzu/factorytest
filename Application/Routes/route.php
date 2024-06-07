<?php


use App\Router;
use App\Controllers\DantriParserController;
require __DIR__ . "/../Router.php";
require __DIR__ . "/../Controllers/DantriParserController.php";
$router = new Router();
if ($_SERVER['REQUEST_METHOD'] === 'GET')
{
    $router->get('/factorytest/public/', DantriParserController::class, 'home');
}
elseif ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $router->post('/factorytest/public/', DantriParserController::class, 'home');
}
// $router->get('/factorytest/public/', DantriParserController::class, 'home');
$router->dispatch();    
// if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SERVER['REQUEST_URI'] === '/factorytest/public') {
//     require_once "../Controllers/DantriParserController.php";
//     $controller = new DantriParserController();
//     $controller->home();
// }