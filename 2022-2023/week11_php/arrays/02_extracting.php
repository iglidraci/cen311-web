<?php
// extracting
$person = array("foo", 11, "bar");
list($name, $id, $wife) = $person;
// If you have more values in the array than in the list(), ignored
// If you have more values in the list() than in the array, NULL
// Two or more consecutive commas in the list() skip values in the array

// Slicing an array: $subset = array_slice(array, offset, length);
// array keys only: $arrayOfKeys = array_keys(array);
// array values only: $arrayOfValues = array_values(array);

// to check whether the key exists in the array: array_key_exists(key, array)
// isset() function  returns true if the element exists and is not NULL

$a = array(0, NULL, '');
function tf($v) {
  return $v ? 'T' : 'F';
}
for ($i=0; $i < 4; $i++) {
  printf("%d: %s %s\n", $i, tf(isset($a[$i])), tf(array_key_exists($i, $a)));
}

/*
Removing and Inserting Elements in an Array
$removed = array_splice(array, start [, length [, replacement ] ]);
*/
$countries = array("germany", "france", "england", "spain", "italy", "poland");
$removed = array_splice($countries, 1, 3);
var_dump($removed);

// to shift elements in the array
$newCountries = array("norway", "finland", "bulgaria");
array_splice($countries, 0, 0, $newCountries);
var_dump($countries);
$map[2.5] = 'a';
$map[3.4] = 'b';
var_dump($map);
 ?>
