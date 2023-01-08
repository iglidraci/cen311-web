<?php

/*
htmlentities() changes all characters with HTML entity equivalents
*/

$str = htmlentities("überzeugen");

echo $str, "\n";
echo htmlentities("angle < 30"), "\n";
echo htmlentities("A 'quote' is <b>bold</b>"), "\n";


/*
There are no functions to convert back from the entities to the original text
but there is a simple trick to do it using get_html_translation_table()
*/

$table = get_html_translation_table(HTML_ENTITIES);
$revTranslation = array_flip($table); // exchange keys with values
echo strtr($str, $revTranslation), "\n";

// removing HTML tags
$input = 'The <b>bold</b> tags will <i>stay</i><p>';
$output = strip_tags($input, '<b>'); // <b> will stay, the rest will be removed
echo $output, "\n";

 ?>
