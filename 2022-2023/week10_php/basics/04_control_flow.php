<?php 

    if($active) { echo "yes"; } else { echo "no"; }
    $name = 'foo';
    switch ($name) {
        case 'foo': // fall-through
        case 'bar':
            print("yes");
            break;
        default:
            print("no");
            break;
    }

    $counter = 0;
    while ($counter < 10) {
        echo "Counter is {$counter} <br/>";
        $counter++;
    }

    for($counter = 0; $counter < 10; $counter++) {
        echo "Counter is $counter <br/>";
    }

    /**
     * Including code
     * include() and require()
     * The main difference is that attempting to require a nonexistent file is a fatal error,
     * while attempting to include such a file produces a warning but 
     * does not stop script execution
     * include_once() and require_once()
     * They behave the same as include and require the first time a file is loaded,
     * but quietly ignore subsequent attempts to load the same file
     */
?>