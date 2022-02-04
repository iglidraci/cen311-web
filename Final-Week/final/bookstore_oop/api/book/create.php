<?php 

// headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
// Maximum number of seconds the results can be cached
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once __DIR__ . '/../../db/database.php';
require_once __DIR__ . '/../../db/book.php';

$book = new Book($connection);

$request_data = json_decode(file_get_contents("php://input"));



$book->title = $request_data->title;
$book->isbn = $request_data->isbn;
$book->current_price = $request_data->current_price;
$book->original_price = $request_data->original_price;
$book->author_id = $request_data->author_id;
$book->published_date = $request_data->published_date;
$book->stock = $request_data->stock;

if ($book->insert()) {
    // HTTP 201 created success status response code
    http_response_code(201);
    echo json_encode(array("msg" => "Book created successfully"));
} else {
    // bad request
    http_response_code(400);
    echo json_encode(array('msg' => "Book creation failed"));
}

?>