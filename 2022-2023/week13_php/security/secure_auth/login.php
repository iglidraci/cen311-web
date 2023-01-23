<?php
session_start();
require_once '../../databases/db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(!isset($_POST['username'], $_POST['password'])) {
        echo 'fill username and password';
    }
    $statement = $db->prepare("select * from user where username = :username");
    $statement->bindParam('username', $_POST['username']);
    $statement->execute();
    $res = $statement->fetch();
    $hashed_password = $res['password'];
    if (password_verify($_POST['password'], $hashed_password)) {
        // success login
        session_regenerate_id();
        $_SESSION['auth'] = true;
        $_SESSION['username'] = $res['username'];
        $_SESSION['id'] = $res['id'];
        echo "welcome " . $_SESSION['username'] . '<br>';
    } else {
        echo 'Wrong username or password <br>';
    }
} else {
    die('only post requests');
}
