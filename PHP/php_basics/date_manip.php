<?php
    $title = 'Date manipulation';
    require_once 'common/header.php';

    $now = getdate();
    echo "Today's Date: <br>";
    echo "<p>Date is " . $now['mday'] . "</p>";
    echo "<p>Month is " . $now['mon'] . "</p>";
    echo "<p>Year is " . $now['year'] . "</p>";
    echo "<p>Time is</p>";
    echo time() . '<br>';
    print date("m/d/y G:i:s<br>", time());
    echo '<br>';
    echo "The date as of today is " . date("d/m/y") . "\n";


    require_once 'common/footer.php';
?>