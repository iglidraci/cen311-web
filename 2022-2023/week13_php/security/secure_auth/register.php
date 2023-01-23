<?php
session_start();
require_once '../../databases/db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $clean = array();
    if (isset($_POST['username']) && ctype_alnum($_POST['username']) && strlen($_POST['username']) >= 4) {
        $clean['username'] = $_POST['username'];
    }
    $passwordRegex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,32}$/";
    if (isset($_POST['password']) && preg_match($passwordRegex, $_POST['password'])) {
        $clean['password'] = $_POST['password'];
    }
    if (count($clean) == 2) {
        $hashed_password = password_hash($clean['password'], PASSWORD_BCRYPT);
        $statement = $db->prepare("insert into user (username, password) values (:username, :password)");
        $statement->execute(array('username'=>$clean['username'], 'password'=>$hashed_password));
        $db = null;
        echo <<<EOF
        Registered successfully 
        <a href="login.html">Login now</a>
EOF;

    } else {
        echo "Provide valid username and password <br>";
    }

} else {
    die('only post requests');
}
