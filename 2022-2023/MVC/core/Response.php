<?php

class Response
{
    public static function setStatusCode(int $code): void
    {
        http_response_code($code);
    }

    public static function redirect(string $url): void
    {
        header('Location:' . $url);
    }
}