<?php

// we have seen matching and splitting

preg_match('/y.*e$/', 'Sylvie'); // returns true
preg_match('/y(.*)e$/', 'Sylvie', $m); // $m is array('ylvie', 'lvi')

/*
Replacing
It finds all occurrences of a pattern in a string and changes those occurrences to something else
$new = preg_replace(pattern, replacement, subject [, limit ]);
*/
$better = preg_replace('/<.*?>/', '!', 'do <b>not</b> press the button');
// $better is 'do !not! press the button'
// you can also pass an array to make the substitution on all of them
$names = array('Noam Chomsky', 'Norman Finkelstein', 'Benny Morris');
$newNames = preg_replace('/(\w)\w*\s(\w+)/', '\1 \2', $names);
var_dump($newNames);

/*
Splitting
extract chunks when you know what separates the chunks from each other
$chunks = preg_split(pattern, string [, limit [, flags ]]);
The optional limit specifies the maximum number of chunks to return
*/
$ops = preg_split('/[+*/-]/', '3+5*9/2');
var_dump($ops); // -> [3, 4, 9, 2]
// to extract operands
$ops = preg_split('{([+*/-])}', '3+5*9/2', -1, PREG_SPLIT_DELIM_CAPTURE);
var_dump($ops);

/*
Filtering an array with regular expressions
Return those elements of an array that match a given pattern
$matching = preg_grep(pattern, array);
*/

$files = array('foo.txt', 'bar.htxt', 'baz.pdf');
$textfiles = preg_grep('/\.txt$/', $files);
var_dump($textfiles);

/*
Quoting for regular expressions
preg_quote() 
Every character in string that has special meaning inside a regular expression (e.g., * or $)
is prefaced with a backslash
*/
$toFind = '/usr/file.txt';
$re = preg_quote($toFind, '/');
$filename = '...';
if (preg_match("/{$re}/", $filename)) {
    // found it!
}
 ?>
