<?php 
$title = 'Create Author';

require_once 'common/header.php';
require_once 'db/conn.php';


?>

<h1>
    Create an author
</h1>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name">
    <div class="form-text" style="color: darkred">
        <!-- error messages -->
    </div>
  </div>
  <button name="submit" type="submit" class="btn btn-primary">Submit</button>
</form>

<?php
require_once 'common/footer.php';
?>