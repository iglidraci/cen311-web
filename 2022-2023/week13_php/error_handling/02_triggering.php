<?php

error_reporting(E_ALL);

// trigger_error — Generates a user-level error/warning/notice message

// trigger_error(string $message, int $error_level = E_USER_NOTICE): bool

function divide($a, $b) {
    if ($b == 0) {
        trigger_error("Can't divide by zero", E_USER_ERROR);
    }
    return $a/$b;
}

echo divide(1, 2) . '<br>';
echo divide(1, 0);

/**
 * If you want better error control than just hiding any errors (and you usually do), you can supply
 * PHP with an error handler.
 * The error handler is called when a condition of any kind is encountered, and can do anything you want it to,
 * from logging information to a file to pretty-printing the error message.
 * The basic process is to create an error-handling function and register it with set_error_handler().
 */


/**
 * @param $errno integer will be passed the level of the error raised
 * @param $errstr string will be passed the error message
 * @param $errfile string the filename that the error was raised in
 * @param $errline integer the line number where the error was raised
 * @return boolean If the function returns false then the normal error handler continues.
 */
function myErrorHandler($errno, $errstr, $errfile, $errline) {
    if (!(error_reporting() & $errno)) {
        // This error code is not included in error_reporting, so let it fall
        // through to the standard PHP error handler
        return false;
    }

    // $errstr may need to be escaped:
    $errstr = htmlspecialchars($errstr);

    switch ($errno) {
        case E_USER_ERROR:
            echo "<b>My ERROR</b> [$errno] $errstr<br />\n";
            echo "  Fatal error on line $errline in file $errfile";
            echo ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
            echo "Aborting...<br />\n";
            exit(1);

        case E_USER_WARNING:
            echo "<b>My WARNING</b> [$errno] $errstr<br />\n";
            break;

        case E_USER_NOTICE:
            echo "<b>My NOTICE</b> [$errno] $errstr<br />\n";
            break;

        default:
            echo "Unknown error type: [$errno] $errstr<br />\n";
            break;
    }

    /* Don't execute PHP internal error handler */
    return true;
}

set_error_handler("myErrorHandler");
