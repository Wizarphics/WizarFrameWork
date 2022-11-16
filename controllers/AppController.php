<?php
/*
 * Copyright (c) 2022.
 * User: Fesdam
 * project: WizarFrameWork
 * Date Created: $file.created
 * 6/30/22, 10:44 PM
 * Last Modified at: 6/30/22, 10:44 PM
 * Time: 10:44
 * @author Wizarphics <Wizarphics@gmail.com>
 *
 */

namespace app\controllers;

use wizarphics\wizarframework\Application;
use wizarphics\wizarframework\Controller;
use wizarphics\wizarframework\Request;
use wizarphics\wizarframework\Response;
use app\models\ContactModel;

class AppController extends Controller
{

    public function home(): array|bool|string
    {
        $params = [
            'name' => 'Wizarphics'
        ];
        return $this->render('home', $params);
    }

    public function contact()
    {
        $params = [
            'model' => new ContactModel()
        ];
        return $this->render('contact', $params);
    }

    public function handleForm(Request $request, Response $response)
    {
        $contactModel = new ContactModel();
        if ($request->isPost()) {
            $contactModel->loadData($request->getBody());

            if ($contactModel->validate() && $contactModel->send()) {
                Application::$app->session->setFlash('success', 'Thanks for contacting us.');
                $response->redirect('/contact');
            }
        }
        
        
        return $this->render('contact',  [
            'model' => $contactModel
        ]);
    }
}
