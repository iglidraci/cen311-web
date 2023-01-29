<?php
// not the best way to do this, I would suggest composer
require_once 'src/Handler.php';
require_once 'src/Database.php';
require_once 'src/BookManager.php';
require_once 'src/BookController.php';

set_exception_handler('Handler::handleException');

header("Content-Type: application/json");

$resource = explode('/', $_SERVER['REQUEST_URI']);

if ($resource[1] != 'books') {
    http_response_code(404);
    exit('unknown resource');
}

$id = $resource[2] ?? null;

$database = new Database();
$manager = new BookManager($database);
$controller = new BookController($manager);
$controller->handleRequest($_SERVER['REQUEST_METHOD'], $id);
