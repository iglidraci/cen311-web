<?php 
include_once 'common/header.php';

// the whole regex has to be matched
// not the whole data string though

/**
 * /pattern/i for case insensitive comparison
 * [abc] multiple options
 * [a-zA-Z] range
 * \d match a digit
 * \s match a whitespace character
 * \w match any word character (aplhanum and underscore)
 * ? zero or 1 time
 * * zero or more
 * + 1 or more
 * {x, y} between x and y
 * ^ match in the start, $ match in the end
 */

 function print_result($pattern, $subject) {
     if (preg_match($pattern, $subject))
         return '<p style="color: green">' . $subject . ' is correct</p>';
    else
        return '<p style="color: darkred">' . $subject . ' is not correct</p>';
 }

 $epoka_email_pattern = '/^[a-z][a-z]+\d{2}@epoka.edu.al/i';
 $email = 'JMorgan18@epoka.edu.al';
 echo print_result($epoka_email_pattern, $email);
// +380 4(4 or 5 or 8) xxx-xx-xx 
$phone_nr_pattern = '/\+380\s4[458]\s\d{3}-\d{2}-\d{2}/';
$phone_nr = '+380 48 555-55-66';
echo print_result($phone_nr_pattern, $phone_nr);

// replace using pattern matching
$today = 'Friday 14, January 2022';
$replace_pattern = "/(\w+)\s(\d+),\s(\w+)\s(\d+)/";
$new_today = preg_replace($replace_pattern, "$1-$2-$3-$4", $today);
echo $new_today.'<br>';
include_once 'common/footer.php';
?>