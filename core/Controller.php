<?php
/*
 * Copyright (c) 2022.
 * User: Fesdam
 * project: WizarFrameWork
 * Date Created: $file.created
 * 6/30/22, 11:19 PM
 * Last Modified at: 6/30/22, 11:19 PM
 * Time: 11:19
 * @author Wizarphics <Wizarphics@gmail.com>
 *
 */

namespace app\core;

class Controller
{
    public string $layout = 'main';

    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    public function render($view, $params = [])
    {
        return Application::$app->router->renderView($view, $params);
    }
}