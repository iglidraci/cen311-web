<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email'])) {
    $folder = 'surveys/' . strtolower($_POST['email']);
    // send path information to the session
    $_SESSION['folder'] = $folder;
    if (!file_exists($folder)) {
        // make the directory and then add the empty files
        mkdir($folder);
    }
    header('Location: 02_survey.php');
} else { ?>

<html>
<head>
    <title>Files & folders - On-line Survey</title>
</head>
<body>
    <h2>Survey Form</h2>
    <p>Please enter your e-mail address to start recording your comments</p>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <p>Email address:
            <input type="email" name="email" size="45" /><br />
            <input type="submit" name="submit" value="Submit">
        </p>
    </form>
</body>
</html>
<?php }