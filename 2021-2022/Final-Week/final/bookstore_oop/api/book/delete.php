<?php 

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
require_once __DIR__ . '/../../db/database.php';
require_once __DIR__ . '/../../db/book.php';

$book = new Book($connection);

$request_data = json_decode(file_get_contents("php://input"));
$book->id = $request_data->id;

if ($book->delete()) {
    http_response_code(204);
    echo json_encode(array("msg"=>"Book deleted successfully"));
} else {
    http_response_code(400);
    echo json_encode("Book deletion failed!");
}

?>