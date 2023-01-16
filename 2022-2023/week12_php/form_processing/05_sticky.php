<html>
<head><title>Favorite languages</title></head>
<body>

<?php

// You’ll need to check whether each possible value in the form was one of the submitted values

if(!isset($_GET['languages'])) {
  $query = array();
} else {
  $query = $_GET['languages'];
}

function printOptions($query, $options) {
  foreach($options as $value => $label) {
    $selected = in_array($value, $query) ? "selected" : "";
    echo "<option value=\"$value\" $selected />";
    echo "$label <br/>";
  }
}

$languages = array(
  "cpp" => "C++",
  "py" => "Python",
  "java" => "Java",
  "rb" => "Ruby"
);
?>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET">
  Select your favourite languages: <br>
  <select name="languages[]" multiple>
    <?php
      printOptions($query, $languages);
     ?>
  </select><br>
  <input type="submit" value="Submit your languages" name="submit"/>
</form>

<?php

if(isset($_GET['submit'])) {
  $languages = implode(', ', $_GET['languages']);
  echo "<p>Your selected languages are: $languages<p>";
}
?>

</body>
</html>
