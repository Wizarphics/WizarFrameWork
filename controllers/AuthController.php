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

use wizarphics\wizarframework\Controller;
use wizarphics\wizarframework\http\Request;
use wizarphics\wizarframework\http\Response;
use wizarphics\wizarframework\middlewares\AuthMiddleWare;
use app\models\User;
use Exception;
use wizarphics\wizarframework\auth\models\PwdResetModel;
use wizarphics\wizarframework\validation\Validation;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleWare(['profile', 'logout']));
    }
    public function login(Request $request, Response $response)
    {
        if (auth()->isLoggedIn()) {
            return redirect(url_to('/'));
        }

        $this->setLayout('auth');
        $UserModel = new User();
        if ($request->isPost()) {
            $UserModel->loadData($request->getBody());
            $valid = $UserModel->validate(null, [
                'email' => ['required', 'valid_email'],
                'password' => ['required']
            ]);
            if ($valid) {
                $loginAttempt = auth($UserModel)->attempt([
                    'email' => $request->getVar('email'),
                    'password' => $request->getVar('password'),
                ]);
                if ($loginAttempt->isOK()) {
                    $response->redirect('/');
                    return;
                } else {
                    session()->setFlash('error', $loginAttempt->reason());
                }
            }
        }
        return $this->render('auth/login', [
            'model' => $UserModel
        ]);
    }

    public function register(Request $request, Response $response)
    {
        if (auth()->isLoggedIn()) {
            return redirect(url_to('/'));
        }

        $userModel = new User();
        $this->setLayout('auth');
        if ($request->isPost()) {
            $userModel->loadData($request->getBody());
            if ($userModel->validate() && $userModel->save()) {
                session()->setFlash('success', 'Thanks for registering');
                redirect("/auth/login");
                // header("Location: /login");
                return;
            }
        }

        return $this->render('auth/register', [
            'model' => $userModel
        ]);
    }

    public function forgotPassword(Request $request, Response $response)
    {
        if (auth()->isLoggedIn()) {
            return redirect(url_to('/'));
        }

        $this->setLayout('auth');
        $pwdResetModel = new PwdResetModel();
        $userModel = new User();

        if ($request->isPost()) {
            // Authentication::sendResetLink($request->getVar('email'));
            $userModel->loadData($request->getBody());

            if ($userModel->validate(
                null,
                [
                    'email' => ['required', 'valid_email', 'is_not_unique:users.email']
                ]
            )) {
                $user = $userModel->findOne([
                    'email' => $userModel->email
                ]);
                $link = $pwdResetModel->generateResetLink($userModel->email);
                if ($pwdResetModel->sendResetLink($user, $link)) {
                    session()->setFlash('success', 'Please check your email to reset your password');
                    return $this->render('auth/success', ['type' => 'reset-link']);
                } else {
                    session()->setFlash('error', 'There was an error sending the reset link');
                }
            }
        }
        return $this->render('auth/forgot-password', [
            'model' => $userModel
        ]);
    }

    public function resetPassword(Request $request, Response $response)
    {
        $this->setLayout('auth');
        $userModel = new User();
        $pwdResetModel = new PwdResetModel();

        if ($request->isPost()) {
            $validator = new Validation((object) $_ENV);
            $validator->setData($request->getMethodBody());
            $validator->setRules([
                'selector' => ['required'],
                'validator' => ['required'],
                'password' => ['required'],
                'passwordConfirm' => ['required'],
            ]);
            $valid = $validator->validate();
            $valid = $validator->validate();

            if ($valid) {
                $reset = $pwdResetModel->resetPassword($request, $userModel);
                if($reset->isOK()){
                    session()->setFlash('success', $reset->reason());
                    redirect(route_to('login'));
                }else{
                    session()->setFlash('error', $reset->reason());
                    redirect(route_to('forgot-password'));
                }
            } else {
                session()->setFlash('error', 'There was an error validating your request');
                redirect(route_to('forgot-password'));
            }
        } else {

            $validator = new Validation((object) $_ENV);
            $validator->setData($request->getMethodBody());
            $validator->setRules([
                'selector' => ['required'],
                'validator' => ['required']
            ]);
            
            $valid = $pwdResetModel->validateRequest($request);
            if ($valid->isOk()) {
                return $this->render('auth/reset-password', [
                    'model' => $userModel,
                ]);
            } else {
                session()->setFlash('error', $valid->reason());
            }
        }
        redirect(route_to('forgot-password'));
    }

    public function pin()
    {
        $this->setLayout('auth');
        return $this->render('auth/reset-pin', [
            'model' => new User()
        ]);
    }

    public function logout(Request $request, Response $response)
    {
        auth()->logout();
        redirect(route_to('logout'));
    }

    public function users(string|int $id = null, Request $request, Response $response)
    {
        $UserModel = new User();
        $user = $UserModel->findOne(['id' => $id]);
        if ($user) {
            print '<pre>';
            print_r($user);
            print '</pre>';
            exit;
        } else {
            throw new Exception("Error Processing Request");
        }
    }

    public function profile()
    {
        return $this->render('profile');
    }
}
