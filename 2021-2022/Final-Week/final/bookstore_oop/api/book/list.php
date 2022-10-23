<?php 
// who can read this file, * means all
// the value tells browsers to allow requesting code from any origin to access the resource
header("Access-Control-Allow-Origin: *");
// it will return json
header("Content-Type: application/json");

require_once __DIR__."/../../db/database.php";
require_once __DIR__.'/../../db/book.php';

$book = new Book($connection);

$stmt = $book -> select_all();

$num = $stmt->rowCount();

if ($num > 0) {
    $return_data = array();
    $return_data['data'] = array();
    $return_data['count'] = $num;
    while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
        $book_item = array(
            "id" => $row['id'],
            "isbn" => $row['isbn'],
            "title" => $row['title'],
            "isbn" => $row['isbn'],
            "author_name" => $row['author_name'],
            "author_id" => $row['author_id'],
            "price" => $row['price']
        );
        array_push($return_data['data'], $book_item);
    }
    http_response_code(200);
    echo json_encode($return_data);
} else {
    http_response_code(404);
    echo json_encode(array("msg" => "No books to select"));
}

?>