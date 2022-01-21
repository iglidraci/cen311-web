<?php 
    $host = '127.0.0.1';
    $db = 'bookstore_db';
    // root user
    $user = 'root';
    $password = '';
    // Open a new connection to the MySQL server
    $connection = mysqli_connect($host, $user, $password);

    if ($connection) {
        // Selects the default database for database queries
        $db = mysqli_select_db($connection, $db);
        if (!$db)
            echo '<div class="alert alert-danger" role="alert">
                        Failed to select database ' . $db . '</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">
                Failed to connect </div>';
    }

    function select_all($table) {
        $sql = "select * from $table where deleted=false";
        global $connection;
        // Performs a query on the database
        $result = mysqli_query($connection, $sql);
        // Fetch all result rows as an associative array, a numeric array, or both
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $rows;
    }

    function res_from_query($query) {
        global $connection;
        $result = mysqli_query($connection, $query);
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $rows;
    }
    
?>