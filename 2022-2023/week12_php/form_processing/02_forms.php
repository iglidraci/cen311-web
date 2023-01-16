<?php
/*
Client can use GET or POST to pass form data to the server
1) A GET request encodes the form parameters in the URL in a query string
path/to/resource/file.php?name=Foo&surname=Bar
A POST request passes the form parameters in the body of the HTTP request,
leaving the URL untouched
2) You can bookmark GET queries but cannot do it with POST requests
3) GET requests are idempotent, POST requests are not
An HTTP method is idempotent if the intended effect on the server of making a single 
request is the same as the effect of making several identical requests
This does not necessarily mean that the request does not have any unique side effects (logging for example)
Idempotency only applies to effects intended by the client
4) GET requests shouldn't be used for any actions that cause a change in the server
*/

$word = $_POST['word'];
$number = $_POST['number'];

$chunks = ceil(strlen($word)/$number);

echo "The $number-letter chunks of '$word' are: <br>";
for($i=0; $i < $chunks; $i++) {
  $chunk = substr($word, $i*$number, $number);
  echo "$chunk <br>";
}
?>
