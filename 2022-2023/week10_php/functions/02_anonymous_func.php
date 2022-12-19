<?php
/**
 * usort() function uses a function you create and pass to it as a parameter to 
 * determine the sort order of the items in an array.
 */
$array = array("really long string here, boy", "this", "middling length", "larger");
usort($array, function($a, $b) {
    return strlen($a) - strlen($b);
});
print_r($array);
echo "<br>";
// anonymous funcs can use variables defined in their enclosing scope using the use syntax

$array = array("really long string here, boy", "this", "middling length", "larger");
$sortOption = 'random';

usort($array, function($a, $b) use ($sortOption) {
    if ($sortOption == 'random') {
        return rand(0, 2) - 1; // (-1, 0, 1) at random
    } else {
        return strlen($a) - strlen($b);
    }
});
print_r($array);
?>