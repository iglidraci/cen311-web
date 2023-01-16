<?php
session_start(); // loads registered variables into the associative array
// session_id() function returns the current session ID
// session_destroy() function removes the data stored for the current session
?>

<html>

<head><title>Sessions</title></head>

<body>
<?php
if($_SERVER['REQUEST_METHOD'] == 'GET') {
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
  Enter username: <input type="text" name="username"><br>
  Enter password: <input type="password" name="password"><br>
  <input type="submit" value="Login"/>
</form>
<?php
} else {
  $username = $_POST['username'];
  $password = $_POST['password'];
  if ($username == 'foo' && $password == 'bar') {
    $_SESSION['user'] = $username;
    echo "you logged in successfully <br>";
    echo <<<EOF
      If you wish -> <a href="05_session.php">Logout</a>
    EOF;
  } else {
    echo "User doesn't exist <br>";
  }
}
?>
</body>
</html>
