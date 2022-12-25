<?php
/*
 * Copyright (c) 2022.
 * User: Fesdam
 * project: WizarFrameWork
 * Date Created: $file.created
 * 7/5/22, 11:28 AM
 * Last Modified at: 7/5/22, 11:28 AM
 * Time: 11:28
 * @author Wizarphics <Wizarphics@gmail.com>
 *
 */

// namespace app\migrations;

class m0002_initial
{
    public function up()
    {
        $db = \wizarphics\wizarframework\Application::$app->db;
        $SQL = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(256) NOT NULL,
    firstname VARCHAR(256) NOT NULL,
    lastname VARCHAR(256) NOT NULL,
    status TINYINT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)ENGINE=INNODB";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = \wizarphics\wizarframework\Application::$app->db;
        $SQL = "DROP TABLE IF EXISTS users;";
        $db->pdo->exec($SQL);
    }
}
