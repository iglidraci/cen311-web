<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host = '127.0.0.1';
$db = 'bookstore_db';
// root user
$username = 'root';
$password = '';
$charset = 'utf8mb4';
// data source name
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $db = new PDO($dsn, $username, $password);
    /**
     * for persistent connection add the following argument
     * array(
        PDO::ATTR_PERSISTENT => true
        )
     */
} catch (PDOException $exception) {
    echo "DB connection:" . $exception->getMessage() . "<br>";
    die();
}

?>
