<?php
$title = 'Edit Author';
require_once 'common/header.php';
require_once 'db/conn.php';

if (isset($_GET['author_id'])) {
    $author_id = $_GET['author_id'];
    $sql = "select name from author where id = $author_id";
    $result = mysqli_query($connection, $sql);

    // Fetch all result rows as an associative array, a numeric array, or both
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    if (isset($_POST['submit'])) {
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
            $sql = "UPDATE author SET name='". $clean['name'] . "' WHERE id=$author_id";
            $result = mysqli_query($connection, $sql);
            
            if ($result)
                echo '<div class="alert alert-success" role="alert">
                        Author updated successfully!
                    </div>';
            else
                echo '<div class="alert alert-danger" role="alert">
                        Author update failed!
                    </div>';
        }
    }
}
?>

<h2>Edit Author</h2>
<form action="<?php echo $_SERVER['PHP_SELF'].'?author_id='.$author_id ?>" method="POST">
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name"
    value="<?php echo (isset($clean['name']) ? htmlentities($clean['name']) : htmlentities($rows[0]['name'])); ?>">
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