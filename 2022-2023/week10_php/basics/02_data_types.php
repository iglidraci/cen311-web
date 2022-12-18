<?php
    /**
     * PHP provides 8 data types
     * Four are scalar types: integers, floating-points numbers, strings, booleans
     * Two are collection types: arrays and objects
     * Two are special types: NULL and resource
     * is_int() function to test whether a value is an integer
     * is_float() to test whether a value is a floating-point
     */
    $name = 'Foo';
    # variables are interpolated within double quotes (not within single)
    echo "Hi, $name <br>";
    echo 'Hi, $name <br>';
    /**
     * In PHP the following values evaluate to false:
     * false, 0, 0.0, empty string "", string "0", empty array, NULL
     * What is not false, is true
     * is_bool() to test whether is boolean
     */

    if(is_bool("0"))
        echo "\"0\" is boolean value <br>";
    else if (is_bool(false))
        echo "false is boolean <br>";
    /**
     * Arrays with number index or some identifying index (associative)
     */
    $people[0] = "Foo";
    $people[1] = "Bar";

    $worldCups['Argentina'] = 3;
    $worldCups['Brazil'] = 5;

    // using array construct
    $animals = array("tiger", "cat", "bear");
    $creators = array("light bulb" => "Edison", "microphone" => "James West");
    foreach($people as $name) {
        echo "Person $name <br>";
    }

    foreach($creators as $invention => $inventor) {
        echo "$inventor invented the $invention <br>";
    }
    /**
     * PHP also supports OOP
     * After you define a class, create objects using new keyword
     * The object properties and methods can be accessed with the -> construct
     */

    /**
     * Resources
    $res = database_connect();
    database_query($res);
    $res = "boo";
    // database connection automatically closed because $res is redefined
    */

    /**
     * NULL datatype
     */
    $a = NULL;
    if (is_null($a)) {
        // a is null
    }
    /**
     * Variable can hold a value of any type, replace it with another type
     * Uninitialized variable behaves as NULL value
     */
    if (is_null($uninitializedVariable)) {
        echo "Yes it is null <br>";
    }
    // variable variables
    $foo = 'bar';
    $$foo = 'baz';
    echo "$bar <br>";
    // Variable references
    $bigLongVariableName = "PHP";
    $short =& $bigLongVariableName;
    $bigLongVariableName .= " programming!";
    echo "$short <br>";
    // Variable scope: Local, global, static and function parameters
    /**
     * Local scope
     * A variable declared in a function is local to that function (not accessible outside)
     * In addition, global variables are not accessible inside the function
     */
    function updateCounter() {
        // global $counter;
        $counter++;
    }
    $counter = 10;
    updateCounter();
    echo "$counter <br>"; // -> 10
    /**
     * Global scope
     * Use global keyword to allow a function to access global variable
     */
    /**
     * Static scope
     * Retains its value between calls to a function but is visible only within function
     */
    function foo() {
        static $a = 0;
        $a++;
        echo "Static a is $a <br>";
    }
    $a = 10;
    foo();
    foo();
    echo "Global a is $a <br>";
    /**
     * Function parameters are local
     */

     /**
      * garbage collection: reference counting and copy-on-write
      * if you subsequently modify either copy, PHP allocates 
      *the required memory and makes the copy
      if you need more control -> unset() to remove the variable's value
      */
?>