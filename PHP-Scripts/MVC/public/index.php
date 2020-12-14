<?php

use app\controllers\PlayerController;
use app\Router;

require_once __DIR__.'/../vendor/autoload.php';

$database = new \app\Database();
$router = new Router($database);

$router->get('/', [PlayerController::class, 'index']);
$router->get('/players', [PlayerController::class, 'index']);
$router->get('/players/index', [PlayerController::class, 'index']);
$router->get('/players/create', [PlayerController::class, 'create']);
$router->post('/players/create', [PlayerController::class, 'create']);
$router->get('/players/update', [PlayerController::class, 'update']);
$router->post('/players/update', [PlayerController::class, 'update']);
$router->post('/players/delete', [PlayerController::class, 'delete']);

$router->resolve();