<?php

// suppose we have already filtered it
$clean['username'] = "'<foo>";
$html = array(); // another convention, html array, hold data that is safe to be used in the context of HTML
// Convert all applicable characters to HTML entities
$html['username'] = htmlentities($clean['username'], ENT_QUOTES, 'UTF-8');

echo "<p>Welcome back, {$html['username']}.</p>";

/*
 * urlencode()
 * This function is convenient when encoding a string to be used in a queries part of a URL,
 * as a convenient way to pass variables to the next page.
 * Returns a string in which all non-alphanumeric characters except -_. have been replaced with a percent (%) sign
 * followed by two hex digits and spaces encoded as plus (+) signs
 * */

$var1 = 'foo bar';
$var2 = 'baz qux';

$query_string = 'var1=' . urlencode($var1) . '&var2=' . urlencode($var2);
echo '<a href="04_escaping.php?' . htmlentities($query_string) . '">Go to 04_escaping.php</a>';
