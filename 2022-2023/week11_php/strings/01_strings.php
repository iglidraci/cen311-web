<?php

$n = 10;
echo "You are the {$n}th person\n"; // disambiguate from $nth variable
$house = 'O\'Reilly';
echo $house;
$nope = '\n'; // not an escape echo $nope;
echo $nope;
echo "\n";
// heredoc style
$stuff = <<< StuffToSay
The quick brown fox
Jumps over the lazy dog.

StuffToSay;
echo $stuff; // if you need new line, add one yourself
// echo is a language construct, not a function
if (print("test\n")) {
  print("it worked\n");
}
$a = array('name' => 'Fred', 'age' => 35, 'wife' => 'Wilma');
// var_dump() function displays any PHP value in human-readable format
var_dump($a);
/*
Accessing individual characters
strlen() function returns the length of the string
*/
$str = "PHP";
for($i=0; $i < strlen($str); $i++) {
  printf("The %dth character is %s\n", $i, $str[$i]);
}
?>
