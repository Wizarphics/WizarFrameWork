<?php
/*
 * Copyright (c) 2022.
 * User: Fesdam
 * project: WizarFrameWork
 * Date Created: $file.created
 * 7/5/22, 9:59 PM
 * Last Modified at: 7/5/22, 9:59 PM
 * Time: 9:59
 * @author Wizarphics <Wizarphics@gmail.com>
 *
 */
class m0002_add_password_column_to_users_table {
    public function up()
    {
        $db=\app\core\Application::$app->db;
        $SQL = "ALTER TABLE users ADD COLUMN password VARCHAR(512) NOT NULL";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db=\app\core\Application::$app->db;
        $SQL = "ALTER TABLE users DROP COLUMN password";
        $db->pdo->exec($SQL);
    }
}

