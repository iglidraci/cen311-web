<?php
$title = 'Delete Author';
require_once 'common/header.php';
require_once 'db/conn.php';

if (isset($_GET['author_id'])) {
    $author_id = $_GET['author_id'];
    if (delete("author", $author_id)) {
        echo '<div class="alert alert-success" role="alert">
                Author deleted!</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">
                Author deletion failed!</div>';
    }
    // try {
    //     $author_id = $_GET['author_id'];
    //     $sql = "delete from author where id=:id";
    //     $stmt = $pdo -> prepare($sql);
    //     $stmt -> bindParam(":id", $author_id);
    //     $stmt -> execute();
    //     echo '<div class="alert alert-success" role="alert">
    //             Author deleted!</div>';
    // } catch (PDOException $ex) {
    //     echo '<div class="alert alert-danger" role="alert">
    //             Author deletion failed! ' . $ex -> getMessage() .'</div>';
    // }
}

require_once 'common/footer.php';
?>