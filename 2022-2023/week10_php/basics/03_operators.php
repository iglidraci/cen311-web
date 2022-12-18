<?php 
    /**
     * Operator precedence
     * Implicit casting (type juggling)
     * int and float => int is converted to float
     * int and string => string is converted to number
     * float and string => string is converted to float
     * Arithmetic operators (+, -, /, *, %, **)
     * String concatenation operator (.)
     */
    $n=5;
    $s = 'There were ' . $n . ' ducks.'; // $s is 'There were 5 ducks'
    // Auto-increment and auto-decrement
    /**
     * Comparison Operators
     * Equality (==), if both operands are equal
     * Identity (===), if both are equal and same type
     * "0.0" == "0"
     * Inequality (!=), Not identical (!==)
     * Spaceship (<=>)
     * Null coalescing operator (??)
     * echo $var1 ?? $var2
     */

     /*
     Logical operators
     &&, and, ||, or, xor, !
     $result = fopen($filename) or exit();
    */
    /**
     * Casting
     */
    $a = "5";
    $b = (int) $a;
?>