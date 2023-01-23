<?php

$clean = array();
$errors = array();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
    $passwordRegex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,32}$/";
    if (isset($_POST['password']) && preg_match($passwordRegex, $_POST['password'])) {
        $clean['password'] = $_POST['password'];
    } else {
        $errors['password'] = 'Wrong password format';
    }
    // In general, filtering is a process that ensures the integrity of your data
}

if (count($clean) == 3) {
    echo "Passed all the validations <br>";
    var_dump($clean);
} else {
?>

<html>
<head>
    <title>Form filtering</title>
    <style>
        .error {
            color: darkred;
        }
    </style>
</head>
<body>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Username: <input type="text" name="username"
                     value="<?php if(isset($_POST['username'])) echo $_POST['username'];?>"><br>
    <?php if (isset($errors['username'])) echo "<p class='error'>{$errors['username']}</p>" ?>

    Last name: <input type="text" name="last_name"
                value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']?>"> <br>
    <?php if (isset($errors['last_name'])) echo "<p class='error'>{$errors['last_name']}</p>" ?>

    Password: <input type="password" name="password"><br>
    <?php if (isset($errors['password'])) echo "<p class='error'>{$errors['password']}</p>" ?>

    <input type="submit" value="Register" name="submit">
</form>
</body>
</html>
<?php } ?>


