<?php

class m0001_create_db{
    public function up()
    {
        $db = \wizarphics\wizarframework\Application::$app->db;
        $SQL = "CREATE DATABASE IF NOT EXISTS wizar_framework DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE wizar_framework";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = \wizarphics\wizarframework\Application::$app->db;
        $SQL = "DROP DATABASE IF EXISTS wizar_framework";
        $db->pdo->exec($SQL);
    }
}