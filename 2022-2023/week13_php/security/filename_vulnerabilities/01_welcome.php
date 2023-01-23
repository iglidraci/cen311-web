<html>
<body>
<form method="POST">
    Username: <input type="text" name="username"><br>
    <input type="submit" value="Display" name="submit">
</form>
</body>
</html>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $filename = $_POST['username'];
    /*
     * realpath() Returns canonicalized absolute pathname
     * basename() Returns trailing name component of path
     * */
//    $vetted = basename(realpath($filename));
//    echo $vetted . '<br>';
//    if ($filename !== $vetted) {
//        die("{$filename} is not a good username");
//    }
    include $filename;
}

