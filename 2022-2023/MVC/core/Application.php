<?php

require_once 'Router.php';
require_once 'BaseController.php';
require_once 'Database.php';
require_once 'models/User.php';


class Application {
    public static Application $APP; // keep an instance of itself, since there will be only one instance of Application at start
    private ?BaseController $controller = null;
    private Router $router;
    private Database $db;
    private ?User $user = null;

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    public function __construct($dbConfig)
    {
        self::$APP = $this;
        $this->router = new Router();
        $this->db = new Database($dbConfig);
        if($this->isAuthenticated()) {
            $email = $_SESSION['email'];
            $this->user = User::findOne(['email' => $email]);
        }
    }



    /**
     * @return Database
     */
    public function getDb(): Database
    {
        return $this->db;
    }

    /**
     * @return Router
     */
    public function getRouter(): Router
    {
        return $this->router;
    }

    /**
     * @return BaseController|null
     */
    public function getController(): ?BaseController
    {
        return $this->controller;
    }

    /**
     * @param BaseController|null $controller
     */
    public function setController(?BaseController $controller): void
    {
        $this->controller = $controller;
    }


    public function start(): void
    {
        try {
            echo $this->router->resolve();
        } catch (Exception $e) {
            Response::setStatusCode($e->getCode());
            echo $this->router->renderView('error', ['exception' => $e]);
        }
    }

    public function setUserData(User $user): void
    {
        session_start();
        session_regenerate_id();
        $_SESSION['auth'] = true;
        $_SESSION['email'] = $user->email;
        $this->user = $user; // save the user so that you can use it globally
    }

    public function clearUserData(): void {
        session_start();
        session_destroy();
        $this->user = null;
    }

    public function isAuthenticated(): bool
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        return isset($_SESSION['auth']) && $_SESSION['auth'] === true;
    }
}