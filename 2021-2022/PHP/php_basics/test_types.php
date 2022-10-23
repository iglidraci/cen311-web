
<?php
$title = 'Test types';
require 'common/header.php';
$testing; // declare a NULL value
echo "is null? ".(is_null($testing) ? 'true' : 'false'); // checks if null
echo "<br>";
$testing = 5;
echo "is an integer? ".is_int($testing); // checks if integer
echo "<br>";
$testing = "five";
echo "is a string? ".is_string($testing); // checks if string
echo "<br>";
$testing = 5.024;
echo "is a double? ".is_double($testing); // checks if double
echo "<br>";
$testing = true;
echo "is boolean? ".is_bool($testing); // checks if boolean
echo "<br>";
$testing = array('apple', 'orange', 'pear');
echo "is an array? ".is_array($testing); // checks if array
echo "<br>";
echo "is numeric? ".(is_numeric($testing)?'true':'false'); // checks if numeric
echo "<br>";
echo "is a resource? ".(is_resource($testing)?'true':'false'); // checks if a resource
echo "<br>";
echo "is an array? ".is_array($testing); // checks if an array
echo "<br>";

$a = "23";
$b = 23;
echo ($a == $b ? 'a == b' : 'a != b') . '<br>';
echo ($a === $b ? 'a === b' : 'a !== b') . '<br>';
$str = '';
if ($str) {
    echo 'str exists';
}

require 'common/footer.php';
?>