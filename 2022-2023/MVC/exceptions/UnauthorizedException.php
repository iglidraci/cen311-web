<?php

class UnauthorizedException extends Exception
{
    public function __construct()
    {
        parent::__construct("Not authorized to access this page", 401);
    }
}