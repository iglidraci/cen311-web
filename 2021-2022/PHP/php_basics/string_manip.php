<?php 
    $title = 'String manipulation';
    require_once('common/header.php');
    $str1 = "by convention hot";
    $str2 = "by convention cold";
    // string concat
    echo '<p>' . $str1 . ", " . $str2 . '</p>';
    // uppercase the first letter (like capitalize in python)
    echo '<p>' . ucfirst($str1) . '</p>';
    // upper case the first letter of each word (like title in python)
    echo '<p>' . ucwords($str2) . '</p>';
    // uppercase the whole string
    echo '<p>' . strtoupper($str1) . '</p>';
    // lowercase the whole str
    echo '<p>' . strtolower($str2) . '</p>';
    // str repeat
    echo 'Repeat string ' . str_repeat($str1 . '<br>', 2);
    // start at index 3 and get me 4 chars after it
    echo 'Get a substring: ' . substr($phrase1, 3, 4) . '<br>';
    // string length
    echo 'str length of \'' . $str1 . '\' is ' . strlen($str1) . '<br>';
    // str replace
    echo str_replace("hot", "sweet", $str1) . ', ' . str_replace("cold", "bitter", $str2) . '<br>';
    // str_word_count() function counts the number of words in a string
    echo str_word_count($str1), '<br>';
    // reverse a string
    echo strrev($str1), '<br>';
    // split string by delimiter
    $full_name = 'Foo Bar Baz';
    $bits = explode(' ', $full_name);
    print_r($bits) . '<br>';
    // page footer
    require_once('common/footer.php');
?>