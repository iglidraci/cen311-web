<?php
$title = 'Edit Book';
require_once 'common/header.php';
require_once 'db/conn.php';
require_once 'book_validation.php';

$all_authors = select_all('author');

if (isset($_GET['book_id'])) {
    $book_id = $_GET['book_id'];
    $sql = "select * from book where id = :id";
    $stmt = $pdo -> prepare($sql);
    $stmt ->bindParam(":id", $book_id);
    $stmt -> execute();
    $rows = $stmt -> fetchAll();

    // Fetch all result rows as an associative array, a numeric array, or both
    if (isset($_POST['submit'])) {
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
            $data = array(
                'title' => $clean['title'],
                'isbn' => $clean['isbn'],
                'author_id' => $clean['author_id'],
                'current_price' => $clean['current_price'],
                'original_price' => $clean['original_price'],
                'published_date' => $clean['published_date'],
                'stock' => $clean['stock']
            );
            if (update_record("book", $data, array('id' => $book_id))) {
                echo '<div class="alert alert-success" role="alert">
                        Book updated successfully!
                    </div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">
                        Book update failed!
                    </div>';
            }
            // $title = $clean['title'];
            // $isbn = $clean['isbn'];
            // $author_id = $clean['author_id'];
            // $current_price = $clean['current_price'];
            // $original_price = $clean['original_price'];
            // $published_date = $clean['published_date'];
            // $stock = $clean['stock'];
            // $sql = "UPDATE `book` SET
            //         `isbn`='$isbn',`title`='$title',`author_id`='$author_id',
            //         `stock`='$stock',`original_price`='$original_price',
            //         `current_price`='$current_price',
            //         `published_date`='$published_date'
            //         WHERE `id`='$book_id'";
            // echo $sql;
            // $result = mysqli_query($connection, $sql);
            // if ($result)
            //     echo '<div class="alert alert-success" role="alert">
            //             Book updated successfully!
            //         </div>';
            // else
            //     echo '<div class="alert alert-danger" role="alert">
            //             Book update failed!
            //         </div>';
        }
    }
}
?>

<h2>Edit Book</h2>
<form action="<?php echo $_SERVER['PHP_SELF'].'?book_id='.$book_id ?>" method="POST">
   <!-- isbn -->
   <div class="mb-3">
    <label for="isbn" class="form-label">ISBN</label>
    <input type="text" class="form-control" id="isbn" name="isbn"
    value="<?php echo (isset($clean['isbn']) ? htmlentities($clean['isbn']) : htmlentities($rows[0]['isbn'])); ?>">
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
    value="<?php echo (isset($clean['title']) ? htmlentities($clean['title']) : htmlentities($rows[0]['title'])); ?>">
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
                echo '<option value="' . $author['id'] . '"'
                . ($author['id'] == $rows[0]['author_id'] ? ' selected="selected"' : '')
                .'>'.$author['name'].'</option>';
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
    value="<?php echo (isset($clean['stock']) ? htmlentities($clean['stock']) : htmlentities($rows[0]['stock'])); ?>">
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
    value="<?php echo (isset($clean['original_price']) ? htmlentities($clean['original_price']) : htmlentities($rows[0]['original_price'])); ?>">
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
            value="<?php echo (isset($clean['current_price']) ? htmlentities($clean['current_price']) : htmlentities($rows[0]['current_price'])); ?>">
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
            value="<?php echo (isset($clean['published_date']) ? htmlentities($clean['published_date']) : htmlentities($rows[0]['published_date'])); ?>">
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