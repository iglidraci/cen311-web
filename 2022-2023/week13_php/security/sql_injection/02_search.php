<html>

<head><title>Bookstore</title></head>

<body>
<form method="POST">
    Search for books
    <input type="text" name="query"> |
    <input type="submit" name="submit" value="Search">
</form>
</body>
</html>

<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    include_once '../../databases/db.php';
    $search_query = $_POST['queries'];

    try {
        $sql_query = "select isbn, title from book where title like '%$search_query%'";
        $res = $db->query($sql_query);
        while ($row = $res->fetch()) {
            echo "title: {$row['title']}, isbn: {$row['isbn']}<br>";
        }
        echo "done<br>";
    } catch (PDOException $exception) {
        echo "Something went wrong<br>";
    }
}
