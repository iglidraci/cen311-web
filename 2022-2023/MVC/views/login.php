<h1>Login</h1>

<form action="" method="POST">
    <?php
    require_once 'models/LoginModel.php';
    require_once 'core/FormField.php';
    /** @var $model LoginModel */
    $usernameField = new FormField($model, 'email');
    $passwordField = (new FormField($model, 'password'))->passwordField();
    echo $usernameField;
    echo $passwordField;
    ?>
    <div class="mb-3">
        <input type="submit" class="form-control" value="Login">
    </div>
</form>
