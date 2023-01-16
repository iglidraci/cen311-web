<html>
<head>
  <title>File Uploads</title>
</head>
<body>
  <form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>"
        method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="102400">
    File name: <input type="file" name="uploadedFile"/>
    <input type="submit" value="Upload" name="submit"/>
  </form>

  <a href="01_server.php">Go here</a>
  <?php
  /*
  Risk of getting a file that is too large.
  PHP has two ways to stop it: hard limit and soft limit
  The 'upload_max_filesize' option in php.ini gives a hard upper limit
  If the form submits a parameter called MAX_FILE_SIZE, PHP uses that as the soft
  upper limit.
  */

  /*
  Each element in $_FILES is itself an array, giving info about the uploaded files.
  Keys are:
  name, type, size, tmp_name (the name of the temporary file on the server)
  */

  // test whether it was uploaded
  if (isset($_POST['submit'])) {
    if (is_uploaded_file($_FILES['uploadedFile']['tmp_name'])) {
      // successfully uploaded
      var_dump($_FILES['uploadedFile']);
      // files are stored in the server's default temporary files directory specified in php.ini
      move_uploaded_file($_FILES['uploadedFile']['tmp_name'],
                          "files/{$_FILES["uploadedFile"]["name"]}");
      echo "<p style=\"color: green\">File is valid, and was successfully uploaded.</p>";
    } else {
      echo "Something went wrong!<br>";
    }
  }

  ?>
</body>
</html>
