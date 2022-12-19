<?php

    function strcat($left, $right) {
        $combined = $left . $right;
        return $combined;
    }
    $first = "This is a ";
    $second = " complete sentence!";
    echo strcat($first, $second);
    // Pass by reference
    function foo(&$value) {
        $value = $value << 1;
    }
    $a = 20;
    foo($a);
    echo "<br> a = $a <br>";

    // default parameters
    // defaulted parameters must be listed after all parameters that do not have default values
    function getPreferences($whichPreference = 'all') {
        // if $whichPreference is "all", return all prefs;
        // otherwise, get the specific preference requested...
    }

    /*
    Variable number of arguments
    Leave out the parameter block entirely
    function sum() {
        // some code
    }
    PHP provides 3 functions
    func_get_args() returns an array of all parameters provided
    func_num_args() returns the number of parameters provided to the function
    func_get_arg() returns a specific argument from the parameters
    */

    function sum() {
        $total = 0;
        for($i = 0; $i < func_num_args(); $i++) {
            $total += func_get_arg($i);
        }
        return $total;
    }

    echo sum(1, 2, 3) . " " . sum(4, 5) . " " . sum(4, 5, 6, 7) . " <br>";
    // return a value by reference
    $names = array("Foo", "Bar", "Baz", "Qux");
    function &getFirst($n) {
        global $names;
        return $names[$n];
    }
    $person =& getFirst(1);
    $person = "Thud";
    echo $names[1] . " <br>";
?>