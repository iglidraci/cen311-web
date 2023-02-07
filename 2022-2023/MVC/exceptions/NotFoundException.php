<?php

class NotFoundException extends Exception
{
    public function __construct()
    {
        parent::__construct("Resource not found", 404);
    }
}