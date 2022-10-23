<?php
$title = 'Variable scope';
require_once('common/header.php');
$x = 10;

function foo() {
    global $x;
    echo '<p>Foo: Value of x = ' . ++$x . '</p>';
}
function bar() {
    static $x = 5;
    echo '<p>Bar: Value of x = ' . ++$x . '</p>';
}
function baz($x) {
    $x++;
}

function qux(&$x) {
    $x++;
}

foo();
bar();
foo();
bar();
baz($x);
foo();
qux($x);
foo();

require_once('common/footer.php');
?>