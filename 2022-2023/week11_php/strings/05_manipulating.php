<?php

/*
To get a substring use $piece = substr(string, start [, length ]);

To learn how many times a smaller string occurs use
$nr = substr_count(big_string, small_string);

To replace parts of a string use
$string = substr_replace(original, new, start [, length ]);
*/

$greeting = "good morning people";
$farewell = substr_replace($greeting, "bye", 5, 7);
echo $farewell, "\n";
$farewell = substr_replace($farewell, "kind ", 9, 0); // insert without deleting
echo $farewell, "\n";
$farewell = substr_replace($farewell, "", 8); // delete without inserting
echo $farewell, "\n";
// insert at the beginning
$farewell = substr_replace($farewell, "now it's time to say ", 0, 0);
echo $farewell, "\n";
// negative start means number of chars from the end of the string
$farewell = substr_replace($farewell, "riddance", -3);
echo $farewell, "\n";

// strrev() takes a string and returns a reversed copy of it

/*
Decomposing a string

Split up a string according to some delimiter
$array = explode(separator, string);
*/

$input = "Foo,Bar,Baz";
$names = explode(',', $input);

// implode does the opposite of explode(), joins an array into a string

$str = implode(':', $names);

/*
String-searching functions
$pos = strpos($large, ","); // find first comma
will return false if it can't find the substring
always check if($pos === false) not just if ($pos), WHY?
*/

$bits = parse_url("https://google.com/path/to/resource/index.html?q=PHP&v=8#footer");
// returns an array of components of a URL
var_dump($bits);
?>
