<?php

require_once 'core/Request.php';

class MethodNotAllowedException extends Exception
{
    public function __construct()
    {
        $method = Request::method();
        parent::__construct("Method $method not allowed", 405);
    }

}