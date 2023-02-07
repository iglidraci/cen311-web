<?php

require_once 'core/BaseController.php';

class SiteController extends BaseController
{
    public function home() {
        $data = ['name' => 'Foo'];
        return Application::$APP->getRouter()->renderView('home', $data);
    }

    public function about() {
        $data = ['company' => 'Bar'];
        return Application::$APP->getRouter()->renderView('about', $data);
    }
}