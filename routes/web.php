<?php

use app\controllers\AppController;
use app\controllers\AuthController;

$router->get('/', [AppController::class, "home"]);
$router->get('/contact', [AppController::class, "contact"]);
$router->post('/contact',[ AppController::class, "handleForm"] );
$router->get('/login',[ AuthController::class, "login"] );
$router->post('/login',[ AuthController::class, "login"] );
$router->get('/register',[ AuthController::class, "register"] );
$router->post('/register',[ AuthController::class, "register"] );
$router->get('/logout',[ AuthController::class, "logout"] );
$router->get('/users/(:num)/(:any)', [AuthController::class, 'users']);
$router->get('/profile', [AuthController::class, 'profile']);