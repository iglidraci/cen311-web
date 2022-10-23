<?php 
$title = 'List';

require_once 'common/header.php';
require_once 'db/conn.php';

$query = "SELECT book.id, title, isbn, author.name as author_name, 
          COALESCE(current_price, original_price) as price 
          FROM book inner join author on book.author_id = author.id 
          where book.deleted = false;";

$rows = res_from_query($query);
?>

<h2>All Books</h2>
<a class="btn btn-success" href="create_book.php">Create Book</a>

<button id="load-prereq" type="button" class="btn btn-secondary">Prerequisites</button>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Isbn</th>
      <th scope="col">Title</th>
      <th scope="col">Author</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
  <?php 
        $authenticated = false;
        if (!isset($_SESSION))
            session_start();
        if (isset($_SESSION['authenticated'])) {
          $authenticated = true;
        }
        foreach ($rows as $row) {
          $tr = '<tr>
                  <th scope="row">'. $row['id'] . '</th>
                    <td>' . $row['isbn'] . '</td>
                    <td>' . $row['title'] . '</td>
                    <td>' . $row['author_name'] . '</td>
                    <td>' . $row['price'] . '</td>
                    <td>
                      <a class="btn btn-primary" href="edit_book.php?book_id=' . $row['id'] .'">Edit</a>
                      <button book-id="'.$row['id'].'" class="btn btn-danger js-delete">Delete</button>';
          if ($authenticated) {
            $tr .= '<a class="btn btn-success" href="add_cart.php?book_id=' 
                    . $row['id'] .'">Add to cart</a>';
          }
          $tr .= '</td></tr>';
          echo $tr;
        }
    ?>
    <script src="js/delete_book.js"></script>
    <script src="js/prerequisites.js"></script>
  </tbody>
</table>

<?php 
require_once 'common/footer.php';
?>