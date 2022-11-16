<?php
/*
 * Copyright (c) 2022.
 * User: Fesdam
 * project: WizarFrameWork
 * Date Created: $file.created
 * 6/30/22, 11:38 PM
 * Last Modified at: 6/30/22, 11:38 PM
 * Time: 11:38
 * @author Wizarphics <Wizarphics@gmail.com>
 *
 */

namespace app\controllers;

use wizarphics\wizarframework\Application;
use wizarphics\wizarframework\Controller;
use wizarphics\wizarframework\middlewares\AuthMiddleware;
use wizarphics\wizarframework\Request;
use wizarphics\wizarframework\Response;
use app\models\LoginForm;
use app\models\User;
use Exception;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }
    public function login(Request $request, Response $response)
    {
        $loginForm = new LoginForm();
        if ($request->isPost()) {
            $loginForm->loadData($request->getBody());
            if ($loginForm->validate() && $loginForm->login()) {
                $response->redirect('/');
                return;
            }
        }
        $this->setLayout('auth');
        return $this->render('auth/login', [
            'model' => $loginForm
        ]);
    }

    public function register(Request $request, Response $response)
    {
        $userModel = new User();

        if ($request->isPost()) {
            $userModel->loadData($request->getBody());

            if ($userModel->validate() && $userModel->save()) {
                Application::$app->session->setFlash('success', 'Thanks for registering');
                $response->redirect('/');
                exit();
            }
            return $this->render('auth/register', [
                'model' => $userModel
            ]);
        }
        $this->setLayout('auth');
        return $this->render('auth/register', [
            'model' => $userModel
        ]);
    }

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect('/');
    }

    public function users( string|int $id = null, string $name = '', Request $request, Response $response)
    {
        $UserModel = new User();
        $user = $UserModel->findOne(['id'=>$id]);
        if($user){
            print '<pre>';
            print_r($user);
            print '</pre>';
            exit;
        }else{
            throw new Exception("Error Processing Request");
        }
    }

    public function profile()
    {
        return $this->render('profile');
    }
}
