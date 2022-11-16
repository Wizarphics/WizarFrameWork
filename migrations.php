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


require_once __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


$config = [
    'userClass'=> \app\models\User::class,
    'db'=>[
        'dsn'=>$_ENV['DB_DSN'],
        'user'=>$_ENV['DB_USER'],
        'password'=>$_ENV['DB_PASSWORD']
    ]
];

$app = new Application(__DIR__, $config);

$app->db->applyMigrations();