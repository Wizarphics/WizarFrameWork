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


use wizarphics\wizarframework\Application;


require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->safeLoad();


$config = [
    'userClass' => \app\models\User::class,
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD']
    ]
];

$app = new Application(dirname(__DIR__), $config);


$router = $app->router;

ob_start();
require_once '../routes/web.php';
ob_clean();

$app->run();
