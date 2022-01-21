<?php 
$title = "Author";
require_once 'common/header.php';
require_once 'db/conn.php';
?>

<h2>All Authors</h2>
<a class="btn btn-success" href="create_author.php">Create Author</a>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  </tbody>
</table>

<?php 
require_once 'common/footer.php';
?>