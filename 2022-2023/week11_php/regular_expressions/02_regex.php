<?php

/*
Character classes
[@[:digit:][:upper:]] to find any character that's a digit, uppercase or @
[:alnum:] -> alphanumeric characters [0-9a-zA-Z]
[:alpha:]
*/

// collating sequences: character sequences as if they were a single char [st[.ch.]]

/*
Anchors
An anchor limits a match to a particular location in the string
^ start of the string
$ end of the string
[[:<:]] start of a word
[[:>:]] end of a word
*/
echo preg_match("/[[:<:]]gun[[:>:]]/", "the Burgundy exploded"), "\n"; // returns false
echo preg_match("/[[:<:]]gun/", "gunpowder exploded"), "\n"; // returns true

/*
Greediness
The engine matches as much as it can while still satisfying the rest of the pattern
*/
preg_match("/(<.*>)/", "do <b>not</b> press the button", $match);
// $match[1] is '<b>not</b>'
echo $match[1], "\n";

// to make the quantifier nongreedy (minimal) append ?
preg_match("/(<.*?>)/", "do <b>not</b> press the button", $match);
// $match[1] is "<b>"
echo $match[1], "\n";

/*
Trailing options
/regex/i -> Match case-insensitively
/regex/s -> make period (.) match any character including new line (\n)
*/
preg_match("/cat/i", "Catherine the Great"); // returns true

$email = <<< EMAIL
To: user@domain.com
From: me@domain.com
Subject: lottery winner
Congrats,
You won the lottrey!
EMAIL;

echo preg_match("/^subject: (.*)/im", $email, $match), "\n";
var_dump($match);

/* 
Inline options
you can specify options within a pattern to have them apply only to part of the pattern
(?flags:subpattern)
flags are the same as above
*/

echo preg_match('/I like (?i:PHP)/', 'I like pHp', $match);
var_dump($match);

 ?>
