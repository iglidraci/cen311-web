<?php

include_once '../../databases/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {?>

<html>
<head><title>SQL injection</title></head>
<body>

<form method="POST">
    Username: <input type="text" name="username"><br>
    Password: <input type="text" name="password"><br>
    <input type="submit" name="submit" value="Login">
</form>
</body>
</html>

<?php } else {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "select count(*) as cnt from user where username = '{$username}' and password = '{$password}'";

    echo $sql . '<br>';

    $res = $db->query($sql);
    if ($res->fetch()['cnt'] > 0) {
        echo "logged in";
    } else {
        echo "wrong credentials";
    }

}