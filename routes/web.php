<?php

use app\controllers\AppController;
use app\controllers\AuthController;

/**
 * @var wizarphics\wizarframework\Router $router
 */

$router->get('/', [AppController::class, "home"]);
$router->get('/contact', [AppController::class, "contact"]);
$router->post('/contact', [AppController::class, "handleForm"])->name('contact');
$router->getPost('/auth/login', [AuthController::class, "login"])->name('login');
$router->get('/auth/register', [AuthController::class, "register"])->name('register');
$router->post('/auth/register', [AuthController::class, "register"]);
$router->get('/auth/forgot-password', [AuthController::class, "forgotPassword"])->name('forgot-password');
$router->getPost('/auth/logout', [AuthController::class, "logout"])->name('logout');
$router->getPost('/auth/reset-password', [AuthController::class, "resetPassword"])->name('reset-password');
$router->get('/auth/pin', [AuthController::class, "pin"])->name('pin');
$router->get('/users/{id:(:num)}', [AuthController::class, 'users']);
$router->get('/profile', [AuthController::class, 'profile']);
// $router->put('/hhh', []);