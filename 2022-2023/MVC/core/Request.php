<?php

class Request
{
    public const GET = 'GET';
    public const POST = 'POST';
    public static function path() {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');
        if($position === false) {
            return $path;
        }
        return substr($path, 0, $position);
    }

    public static function method() {
        return $_SERVER['REQUEST_METHOD'];
    }

    public static function isGet(): bool
    {
        return self::method() === self::GET;
    }

    public static function isPost(): bool {
        return self::method() == self::POST;
    }

    /**
     * @return array - data being submitted
     * You may use $_GET and $_POST directly
     */
    public static function requestBody(): array
    {
        if (self::method() == self::GET) {
            return $_GET;
        }
        elseif (self::method() == self::POST) {
            return $_POST;
        }
        return [];
    }
}