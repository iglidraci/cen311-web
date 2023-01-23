<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') { ?>

<form method="POST">
    <p>Please select a color:</p>
        <select name="color">
            <option value="red">red</option>
            <option value="green">green</option>
            <option value="blue">blue</option>
        </select>
        <input type="submit" />
</form>

<?php } else {
    $clean = array();
    switch ($_POST['color']) {
        case 'red':
        case 'green':
        case 'blue':
            $clean['color'] = $_POST['color']; break;
        default:
            // error
            break;
    }
    if($clean)
        echo $clean['color'];
    else
        echo 'wrong color';
}