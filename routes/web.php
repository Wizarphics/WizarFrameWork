<?php

use app\controllers\AppController;
use app\controllers\AuthController;
use wizarphics\wizarframework\http\Request;
use wizarphics\wizarframework\http\Response;
use wizarphics\wizarframework\View;

/**
 * @var wizarphics\wizarframework\Router $router
 */

$router->get('/', [AppController::class, "home"]);
$router->get('/contact', [AppController::class, "contact"]);
$router->post('/contact', [AppController::class, "handleForm"])->name('contact');
$router->get('/users/{id:(:num)}', [AuthController::class, 'users']);
$router->get('/profile', [AuthController::class, 'profile']);
$router->get('/view/{dir}/{name}', function ($dir, $name, Request $request, Response $response) {
    /**
     * @var View $view
     */
    $view = app()->view;
    $view->title = ucfirst(esc($name));
    return $view->renderCustomView(VIEWPATH . $dir . '/' . $name);
});
