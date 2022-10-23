<?php 
$title = 'List';

require_once 'common/header.php';
require_once 'db/conn.php';

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
  
  </tbody>
</table>

<?php 

require_once 'common/footer.php';
?>