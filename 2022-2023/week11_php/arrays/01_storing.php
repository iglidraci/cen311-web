<?php
$addresses[0] = "spam@cyberpromo.net";
$addresses[1] = "scamer@example.com";
$addresses[-1] = "root@example.com";
// echo $addresses[2], "\n"; // produces a warning
var_dump($addresses);

echo $addresses[2], "\n";

// associative array using array() construct
$price = array('gasket' => 15.29, 'wheel' => 75.25, 'tire' => 50.00);
$price = ['gasket' => 15.29, 'wheel' => 75.25, 'tire' => 50.0];

// To add more values to the end of an existing indexed array, use the [] syntax
$family = ["me", "foo", "bar"];
$family[] = "baz";
var_dump($family);
$numbers = range(2, 5); // $numbers = array(2, 3, 4, 5);
// count() will return the length of array
$size = count($family);
echo $size, "\n";

// multidimensional array
$row1 = array(1, 2, 3, 4);
$row2 = array(0, 1, 6, 3);
$row3 = array(0, 0, 1, 9);
$row4 = array(0, 0, 0, 1);
$matrix = array($row1, $row2, $row3, $row4);
 ?>
