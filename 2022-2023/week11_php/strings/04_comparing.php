<?php
$o1 = 3;
$o2 = "3";

if ($o1 == $o2) {
  echo "== returns true \n";
}

if (!($o1 === $o2)) {
  echo "=== returns false \n";
}

/*
strcmp(string_1, string_2) function
returns a number < 0 if string_1 sorts before string_2
returns a number > 0 if string_2 sorts before string_1, 0 if they're the same
strnatcmp(string1, string2) identifies numeric portions of the string
*/

$n = strcmp("pic5.jpg", "pic10.jgp");
echo $n, "\n";
$n = strnatcmp("pic5.jpg", "pic10.jpg");
echo $n, "\n";
?>
