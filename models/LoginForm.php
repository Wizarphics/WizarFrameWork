<?php
/*
 * Copyright (c) 2022.
 * User: Fesdam
 * project: WizarFrameWork
 * Date Created: $file.created
 * 7/6/22, 10:18 AM
 * Last Modified at: 7/6/22, 10:18 AM
 * Time: 10:18
 * @author Wizarphics <Wizarphics@gmail.com>
 *
 */

namespace app\models;

use wizarphics\wizarframework\Application;
use wizarphics\wizarframework\Model;

class LoginForm extends Model
{

    public string $email = '';
    public string $password = '';

    public function rules(): array
    {
        return [
            'email'=>[self::RULE_REQUIRED, self::RULE_EMAIL],
            'password'=>[self::RULE_REQUIRED]
        ];
    }

    public function labels(): array
    {
        return [
            'email'=>'Email Address',
            'password'=>'Password'
        ];
    }

    public function login()
    {
        $user = User::findOne(['email'=> $this->email]);
        if (!$user){
            $this->addError('email', 'User does not exist with this Email Address');
            return false;
        }
        if (!password_verify($this->password, $user->password)){
            $this->addError('password', 'Password is incorrect');
            return false;
        }
        return Application::$app->login($user);
    }
}