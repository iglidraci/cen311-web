<?php 
header("Access-Control-Allow-Origin: *");
// it will return json
header("Content-Type: application/json; charset=UTF-8");

require_once __DIR__."/../../db/database.php";
require_once __DIR__.'/../../db/book.php';

$book = new Book($connection);
$stmt = $book->get_prerequisites();
$return_data = array();
while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
    array_push($return_data, array(
        'id' => $row['id'],
        'title' => $row['title'],
        'prerequisites_path' => $row['prerequisites_path']
    ));
}
http_response_code(200);
echo json_encode($return_data);
?>