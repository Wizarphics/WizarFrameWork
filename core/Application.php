<?php
/*
 * Copyright (c) 2022.
 * User: Fesdam
 * project: WizarFrameWork
 * Date Created: $file.created
 * 6/30/22, 6:30 PM
 * Last Modified at: 6/30/22, 6:30 PM
 * Time: 6:30
 * @author Wizarphics <Wizarphics@gmail.com>
 *
 */

namespace app\core;

class Application
{
    public static string $ROOT_DIR;
    public string $userClass;
    public static Application $app;
    public Controller $controller;
    public Request $request;
    public Router $router;
    public Response $response;
    public Database $db;
    public Session $session;
    public ?DbModel $user;

    public function __construct($rootPath, array $config)
    {
        $this->userClass= $config['userClass'];
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session= new Session();
        $this->router = new Router($this->request, $this->response);

        $this->db= new Database($config['db']);

        $primaryValue = $this->session->get('user');
        if ($primaryValue) {
            $userClassInstance=new $this->userClass;
            $primaryKey =$userClassInstance->primaryKey();
            $this->user = $userClassInstance->findOne([$primaryKey => $primaryValue]);
        }else{
            $this->user=null;
        }
    }

    public static function isGuest()
    {
        return !self::$app->user;
    }

    public function run()
    {
        echo $this->router->resolve();
    }

    /**
     * @return Controller
     */
    public function getController(): Controller
    {
        return $this->controller;
    }

    /**
     * @param Controller $controller
     */
    public function setController(Controller $controller): void
    {
        $this->controller = $controller;
    }

    public function login(DbModel $user)
    {
        $this->user=$user;
        $primaryKey = $user->primaryKey();
        $primaryValue = $user->{$primaryKey};
        $this->session->set('user', $primaryValue);
        return true;
    }

    public function logout()
    {
        $this->user=null;
        $this->session->remove('user');
    }
}