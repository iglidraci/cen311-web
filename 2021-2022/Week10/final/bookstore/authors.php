<?php 
$title = "Author";
require_once 'common/header.php';
require_once 'db/conn.php';

$rows = select_all('author');
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
    <?php 
        foreach ($rows as $row) {
            echo '<tr>
                <th scope="row">'. $row['id'] . '</th>
                    <td>' . $row['name'] . '</td>
                    <td>
                        <a class="btn btn-primary" href="edit_author.php?author_id=' . $row['id'] .'">Edit</a>
                        <a class="btn btn-danger" href="delete_author.php?author_id=' . $row['id'] .'">Delete</a>
                    </td>
                </tr>';
        }
    ?>
  </tbody>
</table>

<?php 
require_once 'common/footer.php';
?>