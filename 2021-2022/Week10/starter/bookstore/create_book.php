<?php 
$title = 'Create Book';

require_once 'common/header.php';
require_once 'db/conn.php';


?>

<h1>
    Create an author
</h1>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    <!-- isbn -->
  <div class="mb-3">
    <label for="isbn" class="form-label">ISBN</label>
    <input type="text" class="form-control" id="isbn" name="isbn">
    <div class="form-text" style="color: darkred">
        
    </div>
  </div>
  <!-- title -->
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" id="title" name="title">
    <div class="form-text" style="color: darkred">
        
    </div>
  </div>
  <!-- author -->
  <div class="mb-3">
    <label for="author_id" class="form-label">Author</label>
    <select class="form-select" name="author_id">
        <option>Author 1</option>
        <option>Author 2</option>
    </select>
    <div class="form-text" style="color: darkred">
        
    </div>
  </div>
  
  <!-- stock -->
  <div class="mb-3">
    <label for="stock" class="form-label">Stock</label>
    <input type="number" class="form-control" id="stock" name="stock">
    <div class="form-text" style="color: darkred">
        
    </div>
  </div>
  <!-- original price -->
  <div class="mb-3">
    <label for="original_price" class="form-label">Original price</label>
    <input type="number" class="form-control" id="original_price" name="original_price">
    <div class="form-text" style="color: darkred">
    </div>
  </div>
  <!-- current price -->
  <div class="mb-3">
    <label for="current_price" class="form-label">Current price</label>
    <input type="number" class="form-control" id="current_price" 
            name="current_price">
    <div class="form-text" style="color: darkred">
        
    </div>
  </div>
  <!-- published date -->
  <div class="mb-3">
    <label for="published_date" class="form-label">Published date</label>
    <input type="date" class="form-control" id="published_date" 
            name="published_date">
    <div class="form-text" style="color: darkred">
        
    </div>
  </div>
  <button name="submit" type="submit" class="btn btn-primary">Submit</button>
</form>

<?php
require_once 'common/footer.php';
?>