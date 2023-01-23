<?php

session_start();
$folder = $_SESSION['folder'];
$filename = $folder . "/question1.txt";

// Open for reading and writing
// place the file pointer at the end of the file.
// If the file does not exist, attempt to create it
$file_handle = fopen($filename, "a+");

// pick up any text in the file that may already be there
// file_get_contents() reads entire file into a string
$comments = file_get_contents($filename);
fclose($file_handle); // close this handle

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // create file if first time and then //save text that is in $_POST['question1']
    $question1 = $_POST['question1'];
    // Open for reading and writing; place the file pointer at the beginning of the file
    $file_handle = fopen($filename, "w+");
    if (flock($file_handle, LOCK_EX)) {
        // do an exclusive lock
        if (!fwrite($file_handle, $question1)) {
            echo "Cannot write to file ($filename)";
        }
        // release the lock
        flock($file_handle, LOCK_UN);
    }
    fclose($file_handle);
    echo "Thank you!";
} else { ?>

    <html>
    <head>
        <title>Files & folders - Online Survey</title> </head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        What is your opinion on global warming?<br/>
        <textarea name="question1" rows=12 cols=35><?= $comments ?></textarea> <br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
<?php } ?>