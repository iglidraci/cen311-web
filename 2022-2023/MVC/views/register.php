<h1>Register</h1>

<?php
require_once 'models/User.php';
require_once 'core/FormField.php';
/** @var $model User */ ?>

<form action="" method="POST">
    <?php
    $firstNameField = new FormField($model, 'firstName');
    $lastNameField = new FormField($model, 'lastName');
    $emailField = new FormField($model, 'email');
    $passwordField = (new FormField($model, 'password'))->passwordField();
    echo $firstNameField;
    echo $lastNameField;
    echo $emailField;
    echo $passwordField;
    ?>
    <div class="mb-3">
        <input type="submit" class="form-control" value="Submit">
    </div>
</form>
