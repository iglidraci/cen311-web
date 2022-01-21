<?php 
$title = 'Create Book';

require_once 'common/header.php';
require_once 'db/conn.php';
require_once 'book_validation.php';

$reset_form = false;
$all_authors = select_all('author');



if (isset($_POST['submit'])){
    $clean = array();
    $validation_messages = array();
    validate_isbn($_POST['isbn'], $clean, $validation_messages);
    validate_title($_POST['title'], $clean, $validation_messages);
    validate_stock($_POST['stock'], $clean, $validation_messages);
    validate_published_date($_POST['published_date'], $clean, $validation_messages);
    $clean['original_price'] = $_POST['original_price'];
    $clean['current_price'] = $_POST['current_price'];
    $clean['author_id'] = $_POST['author_id'];
    if (count($validation_messages) === 0) {
        $reset_form = true;
        $title = $clean['title'];
        $isbn = $clean['isbn'];
        $author_id = $clean['author_id'];
        $current_price = $clean['current_price'];
        $original_price = $clean['original_price'];
        $published_date = $clean['published_date'];
        $stock = $clean['stock'];
        $sql = "INSERT INTO `book` (`title`, `isbn`, `author_id`, `current_price`, 
                                    `original_price`, `published_date`, `stock`) 
            VALUES ('$title','$isbn','$author_id','$current_price', '$original_price', 
                    '$published_date', '$stock');" ;
        $result = mysqli_query($connection, $sql);
        if ($result)
            echo '<div class="alert alert-success" role="alert">
                    Book added successfully!
                </div>';
        else
            echo '<div class="alert alert-danger" role="alert">
                    Book insertion failed!
                </div>';
    }
}

?>

<h1>
    Create an author
</h1>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    <!-- isbn -->
  <div class="mb-3">
    <label for="isbn" class="form-label">ISBN</label>
    <input type="text" class="form-control" id="isbn" name="isbn"
    value="<?php echo (isset($_POST['isbn'])  && !$reset_form) ? 
                            htmlentities($_POST['isbn']) : 
                            ''; ?>">
    <div class="form-text" style="color: darkred">
        <?php
            if (isset($validation_messages['isbn']))
                echo $validation_messages['isbn'];
        ?>
    </div>
  </div>
  <!-- title -->
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" id="title" name="title"
    value="<?php echo (isset($_POST['title'])  && !$reset_form) ? 
                            htmlentities($_POST['title']) : 
                            ''; ?>">
    <div class="form-text" style="color: darkred">
        <?php
            if (isset($validation_messages['title']))
                echo $validation_messages['title'];
        ?>
    </div>
  </div>
  <!-- author -->
  <div class="mb-3">
    <label for="author_id" class="form-label">Author</label>
    <select class="form-select" name="author_id">
        <?php
            foreach ($all_authors as $author) {
                echo '<option value="' . $author['id'] .'">'.$author['name'].'</option>';
            }
        ?>
    </select>
    <div class="form-text" style="color: darkred">
        <?php
            if (isset($validation_messages['author_id']))
                echo $validation_messages['author_id'];
        ?>
    </div>
  </div>
  
  <!-- stock -->
  <div class="mb-3">
    <label for="stock" class="form-label">Stock</label>
    <input type="number" class="form-control" id="stock" name="stock"
    value="<?php echo (isset($_POST['stock'])  && !$reset_form) ? 
                            htmlentities($_POST['stock']) : 
                            ''; ?>">
    <div class="form-text" style="color: darkred">
        <?php
            if (isset($validation_messages['stock']))
                echo $validation_messages['stock'];
        ?>
    </div>
  </div>
  <!-- original price -->
  <div class="mb-3">
    <label for="original_price" class="form-label">Original price</label>
    <input type="number" class="form-control" id="original_price" name="original_price"
    value="<?php echo (isset($_POST['original_price'])  && !$reset_form) ? 
                            htmlentities($_POST['original_price']) : 
                            ''; ?>">
    <div class="form-text" style="color: darkred">
        <?php
            if (isset($validation_messages['original_price']))
                echo $validation_messages['original_price'];
        ?>
    </div>
  </div>
  <!-- current price -->
  <div class="mb-3">
    <label for="current_price" class="form-label">Current price</label>
    <input type="number" class="form-control" id="current_price" 
            name="current_price"
    value="<?php echo (isset($_POST['current_price'])  && !$reset_form) ? 
                            htmlentities($_POST['current_price']) : 
                            ''; ?>">
    <div class="form-text" style="color: darkred">
        <?php
            if (isset($validation_messages['current_price']))
                echo $validation_messages['current_price'];
        ?>
    </div>
  </div>
  <!-- published date -->
  <div class="mb-3">
    <label for="published_date" class="form-label">Published date</label>
    <input type="date" class="form-control" id="published_date" 
            name="published_date"
    value="<?php echo (isset($_POST['published_date'])  && !$reset_form) ? 
                            htmlentities($_POST['published_date']) : 
                            ''; ?>">
    <div class="form-text" style="color: darkred">
        <?php
            if (isset($validation_messages['published_date']))
                echo $validation_messages['published_date'];
        ?>
    </div>
  </div>
  <button name="submit" type="submit" class="btn btn-primary">Submit</button>
</form>

<?php
require_once 'common/footer.php';
?>