<?php
/*
Two common problems with raw data are the presence of extraneous white‐space
and incorrect capitalization
*/

// trim(string [, charlist ]);

$name = " Winston\tLeonard\tChurchill\t\n";
$name = trim($name, "\r\n "); // $name is "Winston\tLeonard\tChurchill"

echo $name, "\n";

/*
Changing case
strtolower() and strtoupper() operate on entire strings
ucfirst() operates on only the first character of the string
ucwords() operates on the first character of each word in the string
*/

// "title case"
$str = "Php ProgRAMMing";
$titleCase = ucwords(strtolower($str));
print("$titleCase\n");
 ?>
