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

use app\core\Application;
use app\core\Controller;
use app\core\Request;

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
        return $this->render('contact');
    }

    public function handleForm(Request $request)
    {
       $body= $request->getBody();
        return "Handling Submitted Data";
    }
}