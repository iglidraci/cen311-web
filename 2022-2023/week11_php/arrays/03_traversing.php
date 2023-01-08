<?php
$names = array('foo', 'bar', 'baz');

foreach($names as $name)
  echo "$name\n";
for($i=0; $i < count($names); $i++)
  echo "{$names[$i]}\n";

/*
Calling a Function for Each Array Element
array_walk(array, callable);
*/

$printRow = function ($value, $key) { // callback function
  echo "<tr><td>${key}</td><td>${value}</td></tr>";
};

echo '<table border="1">';
$person = array('name' => "Foo", 'age' => 35, 'wife' => "Bar");
array_walk($person, $printRow);
echo "</table>\n";

/*
Reducing an array
array_reduce() applies a function to each element of the array in turn, to build a single value
*/

$addUpSquares = function ($runningTotal, $current) {
  $runningTotal += $current * $current;
  return $runningTotal;
};

echo array_reduce(range(1, 5), $addUpSquares), "\n";

/*
Filtering elements
To identify a subset of an array based on its values, use the array_filter() function
$filtered = array_filter(array, callback);
*/

function gt($nr) {
  $inner = function($element) use ($nr) {
    return $element > $nr;
  };
  return $inner;
}

$nrs = array(1, 2, 10, 29);
$filtered = array_filter($nrs, gt(20));
var_dump($filtered);

/*
Searching in an array
if (in_array(to_find, array)) { ... }
*/
?>
