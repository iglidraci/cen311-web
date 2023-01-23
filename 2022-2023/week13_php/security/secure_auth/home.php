<?php
session_start();

// if not logged in, redirect to login page

if(!isset($_SESSION['auth'])) {
    header('Location: login.html');
    die;
} ?>

<html>
<head>
    <title>Home page</title>
</head>
<body>
<h1>Our secret home page</h1>
<h2><?php echo "Welcome {$_SESSION['username']}" ?></h2>
<a href="logout.php">Logout</a>
</body>
</html>
