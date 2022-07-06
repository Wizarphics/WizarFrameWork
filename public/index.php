<?php
/*
 * Copyright (c) 2022.
 * User: Fesdam
 * project: WizarFrameWork
 * Date Created: $file.created
 * 6/30/22, 8:19 PM
 * Last Modified at: 6/30/22, 8:18 PM
 * Time: 8:19
 * @author Wizarphics <Wizarphics@gmail.com>
 *
 */


use app\controllers\AuthController;
use app\core\Application;
use app\controllers\AppController;


require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();


$config = [
    'userClass'=>\app\models\User::class,
    'db'=>[
        'dsn'=>$_ENV['DB_DSN'],
        'user'=>$_ENV['DB_USER'],
        'password'=>$_ENV['DB_PASSWORD']
    ]
];

$app = new Application(dirname(__DIR__), $config);

$router= $app->router;

$router->get('/', [AppController::class, "home"]);
$router->get('/contact', [AppController::class, "contact"]);
$router->post('/contact',[ AppController::class, "handleForm"] );
$router->get('/login',[ AuthController::class, "login"] );
$router->post('/login',[ AuthController::class, "login"] );
$router->get('/register',[ AuthController::class, "register"] );
$router->post('/register',[ AuthController::class, "register"] );
$router->get('/logout',[ AuthController::class, "logout"] );

$app->run();