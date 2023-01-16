<?php
/*
PHP creates 6 global arrays that contain the EGPCS information
$_ENV -> values of any environment variables
$_GET -> any parameters that are part of a GET request
$_POST -> any parameters that are part of a POST request
$_COOKIE -> any cookie values passed as part of the request
$_SERVER -> information about the web serve
$_FILES -> info about any uploaded files
*/

/*
The $_SERVER array (associative) contains a lot of useful information from the web server,
specified in the CGI specification
Some examples:

PHP_SELF -> name of the current script
SERVER_NAME -> hostname
SERVER_PORT
REQUEST_METHOD -> the method the client used to fetch the document (get, post)
QUERY_STRING -> everything after the ? in the url
GATEWAY_INTERFACE -> the version of the CGI standard

Apache sever also creates entries in the $_SERVER array for each http header
*/
var_dump($_SERVER);

?>
