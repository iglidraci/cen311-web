<?php

function factorial($n) {
    if($n == 1) return 1;
    return $n * factorial($n - 1);
}

function is_prime($n) {
    if($n == 1) return false;
    // primality test
    for($i=2; $i < $n/2; $i++) {
        if($n % $i == 0)
            return false;
    }
    return true;
}


function prime_numbers_up_to($nr) {
    $res = array();
    for($i = 2; $i <= $nr; $i++) {
        if(is_prime($i)) {
            $res[] = $i;
        }
    }
    return $res;
}

if(isset($_GET['type'])) {
    $type = $_GET['type'];
    switch ($type) {
        case 'factorial':
            $nr = $_GET['nr'];
            $res = factorial($nr);
            echo "factorial of $nr is $res";
            break;
        case 'primes':
            $nr = $_GET['nr'];
            $res = implode(',', prime_numbers_up_to($nr));
            echo "prime numbers up to $nr are: $res";
            break;
        case 'div':
            $nr1 = $_GET['nr1'];
            $nr2 = $_GET['nr2'];
            echo "$nr1 / $nr2 = " . $nr1/$nr2;
            break;
    }
}