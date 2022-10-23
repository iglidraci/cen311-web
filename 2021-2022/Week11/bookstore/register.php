<?php 
$title = 'Register';
require_once 'common/header.php';
require_once 'db/conn.php';


$reset_form = false;

if (isset($_POST['submit'])) {
    $clean = array();
    $validation_messages = array();
    $trimmed_username = trim($_POST['username']);
    // check username first
    if (strlen($trimmed_username) == 0) {
        $validation_messages['username'] = 'Username cannot be empty!';
    } else if (!preg_match('/^[a-zA-Z0-9_]+$/', $trimmed_username)) {
        $validation_messages['username'] = 'Username can only have digits, letters and _';
    } else {
        $sql = "select * from user where username = :username";
        $stmt = $pdo -> prepare($sql);
        $stmt -> bindParam(":username", $trimmed_username);
        $stmt -> execute();
        if ($stmt -> rowCount() > 0)
            $validation_messages['username'] = 'This username already exists!';
        else
            $clean['username'] = $trimmed_username;
    }
    // check password
    $trimmed_password = trim($_POST['password']);
    if (strlen($trimmed_password) < 6)
        $validation_messages['password'] = 'Password cannot be less than 6 chars!';
    else
        $clean['password'] = $trimmed_password;
    
    // check if any validation failed
    if (count($validation_messages) === 0) {
        $hashed_password = password_hash($trimmed_password, PASSWORD_DEFAULT);
        $data = array('username' => $clean['username'], 'password' => $hashed_password);
        if (insert_record('user', $data)) {
            $reset_form = true;
            echo '<div class="alert alert-success" role="alert">
                    User registered successfully!
                </div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">
                    User registration failed!</div>';
        }
    }
}

?>

<h1>
    Register
</h1>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
  <div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" name="username"
    value="<?php echo (isset($_POST['username'])  && !$reset_form) ? 
                            htmlentities($_POST['username']) : 
                            ''; ?>">
    <div class="form-text" style="color: darkred">
        <?php
            if (isset($validation_messages['username']))
                echo $validation_messages['username'];
        ?>
    </div>

    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
    <div class="form-text" style="color: darkred">
        <?php
            if (isset($validation_messages['password']))
                echo $validation_messages['password'];
        ?>
    </div>
  </div>
  <button name="submit" type="submit" class="btn btn-primary">Register</button>
</form>


<?php 

require_once 'common/footer.php';
?>