<html>
<head><title>Redirecting</title></head>
<body>
  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
    Enter the redirection url: <input name="url" type="text"/><br>
    <input type="submit" value="Go" name="submit"/>
  </form>
</body>
</html>

<?php

if (isset($_POST['submit'])) {
  $url = $_POST['url'];
  header("Location: http://$url");
  exit(); // we generally exit so that PHP won't output/generate the remainder of the code
}

?>
