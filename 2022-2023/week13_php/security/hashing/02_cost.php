<?php

/**
 * Determine the appropriate cost for hashing algorithm
 * Should take not more than 70 milliseconds
 */
$timeTarget = 0.07;

$cost = 8;
do {
    $cost++;
    // returns current Unix timestamp with microsecond
    $start = microtime(true);
    password_hash("test", PASSWORD_BCRYPT, ["cost" => $cost]);
    $end = microtime(true);
} while (($end - $start) < $timeTarget);

echo "Appropriate Cost Found: " . $cost;
