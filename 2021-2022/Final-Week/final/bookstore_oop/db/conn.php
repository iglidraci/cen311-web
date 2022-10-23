<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $host = '127.0.0.1';
    $db = 'bookstore_db';
    // root user
    $user = 'root';
    $password = '';
    $charset = 'utf8mb4';
    // data source name
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try {
        $pdo = new PDO($dsn, $user, $password);
        // show me there is an error
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $ex) {
        echo '<div class="alert alert-danger" role="alert">
                Failed to connect. '. $ex -> getMessage() .'</div>';
    }

    

    function select_all($table) {
        $sql = "select * from $table where deleted=false";
        global $pdo;
        return $pdo->query($sql);
    }

    function delete($table, $id) {
        try {
            $sql = "delete from $table where id=:id";
            global $pdo;
            $stmt = $pdo -> prepare($sql);
            $stmt -> bindParam(":id", $id);
            $stmt -> execute();
            return true;
        } catch (PDOException $ex) {
            return false;
        }
    }

    function insert_record($table, $map) {
        try {
            global $pdo;
            $map_func = function($el) {
                return ":$el";
            };
            $keys = implode(", ", array_keys($map));
            $values = implode(", ", array_map($map_func, array_keys($map)));
            $sql = "insert into $table ($keys) values ($values);";
            $stmt = $pdo -> prepare($sql);
            $stmt -> execute($map);
            return true;
        } catch (PDOException $ex) {
            echo $ex -> getMessage() . '<br>';
            return false;
        }
    }

    /*
    $sql = "UPDATE `book` SET
                    `isbn`='$isbn',`title`='$title',`author_id`='$author_id',
                    `stock`='$stock',`original_price`='$original_price',
                    `current_price`='$current_price',
                    `published_date`='$published_date'
                    WHERE `id`='$book_id'";
    */

    function update_record ($table, $data, $filters) {
        try {
            $map_func = function($el) {
                return "$el=:$el";
            };
            global $pdo;
            $placeholders = implode(", ", array_map($map_func, array_keys($data)));
            $filters_placeholders = implode(" and ", array_map($map_func, array_keys($filters)));
            $sql = "update $table set $placeholders where $filters_placeholders";
            $merged_data = array_merge($data, $filters);
            // print_r($merged_data);
            // echo $sql . '<br>';
            $stmt = $pdo -> prepare($sql);
            
            $stmt -> execute($merged_data);
            return true;
        } catch (PDOException $ex) {
            echo $ex -> getMessage() . '<br>';
            return false;
        }
    }

    function res_from_query($query) {
        global $pdo;
        return $pdo->query($query);
    }
    
?>