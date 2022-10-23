<?php

$title = 'Arrays';
require_once 'common/header.php';

function print_array($arr) {
    $size = count($arr);
    for($i=0; $i < $size; $i++)
        echo $arr[$i].' ';
    echo '<br>';
}

function print_array_foreach($arr) {
    foreach($arr as $el)
        echo $el . ' ';
    echo '<br>';
}

function print_associative_array($arr) {
    foreach($arr as $key => $value)
        echo $key . ': ' . $value . ' ';
    echo '<br>';
}

$arr = array(10, 11, 4, 19);
print_r($arr);
echo '<br>';
print_array($arr);
print_array_foreach($arr);
echo 'sort array: ';
sort($arr);
print_array($arr);
echo '<br>';
echo 'rsort array: ';
rsort($arr);
print_array($arr);

// associative arrays
$our_hero = array(
    'name' => 'Batman',
    'superpower' => "he's rich",
    'car' => 'Batmobil'
);
$our_hero['age'] = 'unknown';
echo 'Our hero:';
print_r($our_hero);
echo '<br>';
print_associative_array($our_hero);
echo 'ksort associative array: ';
ksort($our_hero);
print_associative_array($our_hero);
echo '<br>';
echo 'krsort associative array: ';
krsort($our_hero);
print_associative_array($our_hero);
echo '<br>';
echo 'asort associative array: ';
asort($our_hero);
print_associative_array($our_hero);
echo '<br>';
echo 'arsort associative array: ';
arsort($our_hero);
print_associative_array($our_hero);

require_once 'common/footer.php';
?>