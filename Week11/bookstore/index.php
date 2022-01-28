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
        foreach ($rows as $row) {
            echo '<tr>
                <th scope="row">'. $row['id'] . '</th>
                    <td>' . $row['isbn'] . '</td>
                    <td>' . $row['title'] . '</td>
                    <td>' . $row['author_name'] . '</td>
                    <td>' . $row['price'] . '</td>
                    <td>
                        <a class="btn btn-primary" href="edit_book.php?book_id=' . $row['id'] .'">Edit</a>
                        <a class="btn btn-danger" href="delete_book.php?book_id=' . $row['id'] .'">Delete</a>
                    </td>
                </tr>';
        }
    ?>
  </tbody>
</table>

<?php 
require_once 'common/footer.php';
?>