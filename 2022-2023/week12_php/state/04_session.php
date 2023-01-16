<?php
session_start();

if(isset($_SESSION['user'])) {
  $user = $_SESSION['user'];
  echo "<p>User from session: $user </p>";
  $session_id = session_id();
  echo "session id $session_id<br>";
  echo <<<EOF
  If you wish -> <a href="05_session.php">Logout</a>
  EOF;
} else {
  echo <<<EOF
  <a href="03_session.php">Login please</a>
  EOF;
}

/**
 * Sessions don’t persist after the browser ceases to exist
 * To change this, you’ll need to set the session.cookie_lifetime option in php.ini to 
 * the lifetime of the cookie in seconds
 * 
 * By default, the session ID is passed from page to page in the PHPSESSID cookie
 * PHP’s session system supports two alternatives: form fields and URLs
 */

?>
