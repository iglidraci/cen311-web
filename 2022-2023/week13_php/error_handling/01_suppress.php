<?php
// Turn off all error reporting, for Production
 error_reporting(0);

// Reporting E_NOTICE can be good too (to report uninitialized
// variables or catch variable name misspellings ...)
// error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

// Report all errors except E_NOTICE
// error_reporting(E_ALL ^ E_NOTICE);


// error suppression with @
@include("file.php");

$cache = array();
// this works for any expression, not just functions:
$value = @$cache['id']; // warning error otherwise


$my_file = @file ('non_existent_file') or
die ("Failed opening file: error was '" . error_get_last()['message'] . "'");

// @ operator does not suppress fatal errors

echo "end of file";


