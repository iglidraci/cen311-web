<?php

/*

Ascending   Descending    User-defined
sort()      rsort()       usort()       Sort array by values, then reassign indices starting with 0
asort()     arsort()      uasort()      Sort array by values and maintain index association 
ksort()     krsort()      uksort()      Sort array by keys
*/

// The array_reverse() function reverses the internal order of elements in an array

$nrs = array(20, 30, 10, 5);

asort($nrs);
var_dump($nrs);

$names = ["foo", "bar", "baz"];

$reversed = array_reverse($names);

var_dump($reversed);
// The array_flip() function returns an array that reverses the order of each original element’s key-value pair

$flipped = array_flip($names);
var_dump($flipped);

// to randomize an array, shuffle() function
?>
