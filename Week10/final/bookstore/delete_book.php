<?php
$title = 'Delete Book';
require_once 'common/header.php';
require_once 'db/conn.php';

if (isset($_GET['book_id'])) {
    $book_id = $_GET['book_id'];
    $sql = "delete from `book` where id=$book_id";
    $result = mysqli_query($connection, $sql);
    if ($result)
        echo '<div class="alert alert-success" role="alert">
                Book deleted successfully!
            </div>';
    else
        echo '<div class="alert alert-danger" role="alert">
                Book deletion failed!
            </div>';
}

require_once 'common/footer.php';
?>