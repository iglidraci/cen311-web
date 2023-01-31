<?php
// not the best way to do this, I would suggest composer
require_once 'src/Database.php';
require_once 'src/BookManager.php';
require_once 'src/BookController.php';

function handleException($exception): void {
    http_response_code(500);
    echo json_encode([
        'code' => $exception->getCode(),
        'message' => $exception->getMessage(),
        'file' => $exception->getFile(),
        'line' => $exception->getLine()
    ]);
}

set_exception_handler('handleException');

header("Content-Type: application/json");


$resource = explode('/', $_SERVER['REQUEST_URI']);

//var_dump($resource);
//
//
if ($resource[1] != 'books') {
    http_response_code(404);
    exit('unknown');
}
//
//$id = $resource[2] ?? null;
//
//$database = new Database();
//$manager = new BookManager($database);
//$controller = new BookController($manager);
//$controller->handleRequest($_SERVER['REQUEST_METHOD'], $id);
