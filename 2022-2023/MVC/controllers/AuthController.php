<?php
require_once 'models/LoginModel.php';
require_once 'core/BaseController.php';
require_once 'models/User.php';
require_once 'exceptions/MethodNotAllowedException.php';

class AuthController extends BaseController
{

    public function login() {
        $loginForm = new LoginModel();
        if(Request::isPost()) {
            $loginForm->loadData(Request::requestBody());
            if($loginForm->validate() && $loginForm->login()) {
                Response::redirect('/');
                return;
            }
        }
        return Application::$APP->getRouter()->renderView('login', ['model' => $loginForm]);
    }

    public function register() {
        $user = new User();
        if(Request::isPost()) {
            $user->loadData(Request::requestBody());
            if($user->validate() && $user->save()) {
                Response::redirect('/');
                exit;
            }
            return Application::$APP->getRouter()->renderView('register', ['model'=>$user]);
        }
        return Application::$APP->getRouter()->renderView('register', ['model'=>$user]);
    }

    public function logout() {
        if(Request::isGet()) {
            Application::$APP->clearUserData();
            Response::redirect('/');
        } else throw new MethodNotAllowedException();
    }

}