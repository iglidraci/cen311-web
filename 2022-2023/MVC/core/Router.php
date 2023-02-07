<?php

require_once 'Request.php';
require_once 'Response.php';
require_once 'exceptions/NotFoundException.php';

class Router
{
    private array $routes = [];

    public function get($path, $callback): void
    {
        $this->routes[Request::GET][$path] = $callback; // register the given path as a get request
    }

    public function post($path, $callback): void
    {
        $this->routes[Request::POST][$path] = $callback; // register the given path as a post request
    }

    public function resolve() {
        $path = Request::path();
        $method = Request::method();
        $callback = $this->routes[$method][$path] ?? false;
        if($callback === false){
            Response::setStatusCode(404);
            return $this->renderView('error', ['exception' => new NotFoundException()]);
        }
        $controller = new $callback[0]();
        $action = $callback[1];
        Application::$APP->setController($controller);
        Application::$APP->getController()->setAction($action);
        $callback[0] = Application::$APP->getController();
        return call_user_func($callback);
    }
    public function renderView(string $view, array $params = [])
    {
        // in the params array, we can add variables that we want to use in the view
        $layout = $this->getLayoutContent();
        $viewContent = $this->getView($view, $params);
        // layouts will contain a string {{main_content}} in order to replace it with the actual content of that page
        return str_replace("{{main_content}}", $viewContent, $layout);
    }

    private function getLayoutContent()
    {
        $layout = 'main';
        if(Application::$APP->getController())
            $layout = Application::$APP->getController()->getLayout();
        ob_start(); // nothing gets outputted in the browser
        require_once "views/layouts/$layout.php";
        return ob_get_clean();
    }

    private function getView(string $view, array $params)
    {
        foreach ($params as $key => $value) {
            $$key = $value; // in order to create variables with the given keys
        }
        ob_start(); // nothing gets outputted in the browser
        require_once  "views/$view.php"; // supposing that you will keep all the views in the view directory
        // perhaps you can solve it differently
        return ob_get_clean();
    }


}