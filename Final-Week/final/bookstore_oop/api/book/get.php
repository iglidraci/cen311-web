<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json");

require_once __DIR__ . '/../../db/database.php';
require_once __DIR__ . '/../../db/book.php';

$book = new Book($connection);
if (isset($_GET['book_id'])) {
    $book->id = $_GET['book_id'];
    $book->get();
    if ($book->isbn != null){
        $book_response = array(
            'id' => $book->id,
            'isbn' => $book->isbn,
            'title' => $book->title,
            'author_id' => $book->author_id,
            'original_price' => $book->original_price,
            'current_price' => $book->current_price,
            'stock' => $book->stock,
            'published_date' => $book->published_date
        );
        http_response_code(200);
        echo json_encode($book_response);
    } else {
        http_response_code(400);
        echo json_encode(array('msg' => "Book not found!"));
    }
} else{
    http_response_code(500);
    echo json_encode(array('msg' => "Internal error!"));
}
?>