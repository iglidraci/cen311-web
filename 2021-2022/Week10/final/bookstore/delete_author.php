<?php
$title = 'Delete Author';
require_once 'common/header.php';
require_once 'db/conn.php';

if (isset($_GET['author_id'])) {
    $author_id = $_GET['author_id'];
    $sql = "delete from `author` where id=$author_id";
    $result = mysqli_query($connection, $sql);
    if ($result)
        echo '<div class="alert alert-success" role="alert">
                Author deleted successfully!
            </div>';
    else
        echo '<div class="alert alert-danger" role="alert">
                Author deletion failed!
            </div>';
}

require_once 'common/footer.php';
?>