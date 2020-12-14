<?php

require_once '../vendor/autoload.php';
use app\Router;
use app\controllers\PlayerController;


$router = new Router();
 
$router->get('/',[PlayerController::class,'index']);
$router->get('/players',[PlayerController::class,'index']);

$router->get('/player/create',[PlayerController::class,'create']);
$router->post('/player/create',[PlayerController::class,'create']);

$router->get('/player/update',[PlayerController::class,'update']);
$router->post('/player/update',[PlayerController::class,'update']);

$router->post('/player/delete',[PlayerController::class,'delete']);

$router->resolve();