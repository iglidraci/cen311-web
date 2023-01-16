<html>
<head>
<title>Cookies</title>
</head>

<body>
<?php

/*
setcookie(name [, value [, expires [, path [, domain [, secure [, httponly ]]]]]]);
*/

if($_SERVER['REQUEST_METHOD'] == 'GET') {
?>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
  Enter your favorite book: <input type="text" name="favBook"><br>
  <input type="submit" value="Submit">
</form>

<?php
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $favBook = $_POST['favBook'];
  setcookie('favorite_book', $favBook, time() + 60*2); // 2 minutes
  echo("your favorite book is: $favBook");
}
?>
</body>
</html>
