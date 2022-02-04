<?php

use app\Base\App;
use app\Controllers\AdvertisementController;
use app\Controllers\IndexController;
use app\Controllers\UserController;

require_once __DIR__ . '/../vendor/autoload.php';

define("SERVER_ROOT", dirname(__DIR__));

$app = new App();

/* WEB Routes */
$app->router->get('/', [IndexController::class, 'index']);
$app->router->get('/users', [UserController::class, 'index']);
$app->router->get('/advertisements', [AdvertisementController::class, 'index']);

$app->make();
