<?php 
$title = 'Create Author';

require_once 'common/header.php';
require_once 'db/conn.php';

$reset_form = false;

if (isset($_POST['submit'])){
    $clean = array();
    $validation_messages = array();
    
    if (isset($_POST['name']) && strlen($_POST['name']) > 0){
        if (ctype_alpha(str_replace(' ', '', $_POST['name'])))
            $clean['name'] = $_POST['name'];
        else
            $validation_messages['name'] = 'Name should contain only letters!';
    } else {
        $validation_messages['name'] = 'Name cannot be empty!';
    }
    if (count($validation_messages) === 0) {
        $reset_form = true;
        $sql = "INSERT INTO `author` (`name`) VALUES ('" . $clean['name'] . "');";
        $result = mysqli_query($connection, $sql);
        if ($result)
            echo '<div class="alert alert-success" role="alert">
                    Author added successfully!
                </div>';
        else
            echo '<div class="alert alert-danger" role="alert">
                    Author insertion failed!
                </div>';
        // in case you want to navigate to the index.php
        // header("Location: index.php");
        // exit;
    }
}

?>

<h1>
    Create an author
</h1>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name"
    value="<?php echo (isset($_POST['name'])  && !$reset_form) ? 
                            htmlentities($_POST['name']) : 
                            ''; ?>">
    <div class="form-text" style="color: darkred">
        <?php
            if (isset($validation_messages['name']))
                echo $validation_messages['name'];
        ?>
    </div>
  </div>
  <button name="submit" type="submit" class="btn btn-primary">Submit</button>
</form>

<?php
require_once 'common/footer.php';
?>