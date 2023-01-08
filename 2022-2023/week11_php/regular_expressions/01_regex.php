<?php

/*
There are 3 uses cases of regular expressions:
1) Matching
2) Substituting new text for matching text
3) Splitting a string into an array of smaller chunks
*/


/*
A caret (^) at the beginning of a regex indicates that it must match at the
beginning of the string
*/

echo preg_match("/^hello/", "say hello"), "\n"; // -> false
echo preg_match("/^hello/", "hello world"), "\n"; // -> true

/*
Similarly, a dollar sign ($) at the end of a regular expression means that
it must match the end of the string
*/
preg_match("/php$/", "php programming"); // returns false

// a period (.) matches any single character
preg_match('/c.t/', 'cat'); // returns true 

/*
If you want to match one of these special characters (called a metacharacter),
you have to escape it with a backslash
*/

// character classes
preg_match("/c[aeiou]t/", "I cut my hand"); // returns true

// negate the character class with a caret (^) at the start
preg_match("/c[^aeiou]t/", "I cut my hand"); // returns false

// define a range of chars with a hyphen (-)
preg_match("/[0-9]%/", "we are 25% complete"); // returns true

// alternatives
preg_match("/cat|dog/", "the cat rubbed my legs"); // returns true
preg_match("/cat|dog/", "the rabbit rubbed my legs"); // returns false

// check for strings that don't start with a capital letter
preg_match("/^([a-z]|[0-9])/", "The quick brown fox"); // returns false
preg_match("/^([a-z]|[0-9])/", "jumped over"); // returns true
preg_match("/^([a-z]|[0-9])/", "10 lazy dogs"); // returns true

/*
Repeating sequences
Quantifier (meaning)
? (0 or 1)
* (0 or more)
+ (1 or more)
{n} (exactly n times)
{n, m} (at least n times, no more than m times)
{n,} (at least n times)
*/

// matching valid US phone numbers
preg_match("/[0-9]{3}-[0-9]{3}-[0-9]{4}/", "303-555-1212"); // returns true

// subpatterns

preg_match("/a (very )+big dog/", "it was a very very big dog"); // returns true

/*
Delimiters
Each pattern must be enclosed in a pair of delimiters
Traditionally (from Perl) the forward slash is used (/pattern/) but can be
any non-alphanumeric character rather than backslash (\).
*/

echo preg_match("#/usr/local/#", "/usr/local/bin/perl"), "\n"; // returns true
 ?>
