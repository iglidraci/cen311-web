<?php
$host = '127.0.0.1';
$db = 'test_db';
// root user
$username = 'root';
$password = '';
// data source name
$dsn = "mysql:host=$host;dbname=$db";

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $exception) {
    echo "DB connection:" . $exception->getMessage() . "<br>";
    die();
}

if($_SERVER['REQUEST_METHOD'] == 'GET') {
?>

<form method="POST">
    last name: 
    <input type="text" name="last_name"><br>
    username: 
    <input type="text" name="username"><br>
    password:
    <input type="password" name="password"><br>
    <input type="submit" value="Submit">
</form>

<?php
} else {
    $clean = array();
    $errors = array();

    if (isset($_POST['username']) && ctype_alnum($_POST['username']) && strlen($_POST['username']) >= 4) {
        $clean['username'] = $_POST['username'];
    } else {
        $errors['username'] = 'Username should contain alphanumeric characters only and at least 4 characters long';
    }

    if (!isset($_POST['last_name']) || preg_match("/[^A-Za-z '\-]/", $_POST['last_name'])) {
        $errors['last_name'] = 'Last name should contain only alphabetic characters, spaces, hyphens, and single quotes';
    } else {
        $clean['last_name'] = $_POST['last_name'];
    }

    $passwordRegex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,20}$/";
    if (isset($_POST['password']) && preg_match($passwordRegex, $_POST['password'])) {
        $clean['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);
    } else {
        $errors['password'] = 'password should contain at least one lowercase, one uppercase, one digit and one special char';
    }
    if(count($errors) > 0) {
        // foreach error, display errors
        foreach($errors as $k => $v) {
            echo "error on $k: $v <br>";
        }
    } else {
        $stmt = $db->prepare("insert into user_tbl (last_name, username, password) values
                                (:last_name, :username, :password)");
        $stmt->execute($clean);
        $id = $db->lastInsertId();
        session_start();
        $_SESSION['user_id'] = $id;
        echo "user with id $id successfully created <br>";
    }
}