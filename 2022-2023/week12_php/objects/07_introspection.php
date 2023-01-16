<?php

/*
Introspection is the ability of a program to examine an object’s characteristics,
such as its name, parent class (if any), properties, and methods.
*/

/*
Examining a class
*/

require_once('02_inheritance.php');
$classname = "Person";
$personExists = class_exists($classname);
echo $personExists ? "$classname exists" : "$classname doesn't exist", "\n";
$methods = get_class_methods($classname); // is a simple list of method names

// maps property names to values and also includes inherited properties
$properties = get_class_vars($classname);
var_dump($methods);
var_dump($properties);
$superclass = get_parent_class($classname);

/*
Examining an object
*/

$isObject = is_object($p);
echo $isObject, "\n";
$class = get_class($p);
echo $class, "\n";
$methodExists = method_exists($p, 'walk'); // -> false
$methodExists = method_exists($p, 'introduceYourself'); // -> true

// return an array of callable methods (include inherited methods)
function getCallableMethods($object) {
    $reflection = new ReflectionClass($object);
    $methods = $reflection->getMethods();
    return $methods; 
}

// return an array of properties
function getProperties($object) {
    $reflection = new ReflectionClass($object);
    return $reflection->getProperties(); 
}

?>
