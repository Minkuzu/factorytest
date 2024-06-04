
<?php

require '../vendor/autoload.php';
use App\Router;
use App\Controllers\DantriParserController;
$uri = $_SERVER['REQUEST_URI'];

$router = new Router();
var_dump(DantriParserController::class);
var_dump($router->addRoute());
die();
// $router->dispatch($uri);
?>