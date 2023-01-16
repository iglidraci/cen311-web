<html>
<head><title>Favorite languages</title></head>
<body>
  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET">
    Select your favorite languages: <br>
    <select name="languages[]" multiple>
      <option value="c++">C++</option>
      <option value="java">Java</option>
      <option value="python">Python</option>
      <option value="php">PHP</option>
    </select><br>
    <input type="submit" value="Submit your languages" name="submit"/>
  </form>
  <?php

  if(isset($_GET['submit'])) { // or array_key_exists('submit', $_GET)
    /**
     * Submit button has a name 'submit' and we check whether it is set or not
     * To ensure that PHP recognizes the multiple values that the browser passes to a 
     * form-processing script, you need to use square brackets, [], after the name of 
     * the field in the HTML form
     */
    $languages = implode(', ', $_GET['languages']);
    echo "<p>Your selected languages are: $languages<p>";

    // The same technique applies for any form field where multiple values can be returned
  }
  ?>
</body>
</html>
