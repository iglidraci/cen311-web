<?php

// When a browser sends a cookie back to the server, 
// you can access that cookie through the $_COOKIE array.

if (isset($_COOKIE['favorite_book'])) {
  $favBook = $_COOKIE['favorite_book'];
  echo "Your favorite book is: $favBook <br>";
} else {
  echo "Your session expired or you haven't submitted your favorite book <br>";
  echo <<<EOF
  <a href="01_cookies.php">Go here to submit your book</a>
  EOF;
}

/**
 * Some caveats about the use of cookies
 * 1) Not all clients (browsers) support or accept cookies,
 * and even if the client does support cookies, the user can turn them off.
 * 2) The cookie specification says that no cookie can exceed 4 KB in size
 * 3) Only 20 cookies are allowed per domain, 300 on total for client
 * 4) You have no control over when browsers actually expire cookies
 */
?>