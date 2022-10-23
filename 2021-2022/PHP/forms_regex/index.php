<?php
require_once 'common/header.php';
$nationalities = array('albanian', 'german', 'polish');
?>

<h1>Registration Form</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <label for="username">Username</label><br>
    <input type="text" id="username" name="username"
        value="<?php echo isset($_POST['username']) ? 
                            htmlentities($_POST['username']) : 
                            ''; ?>"><br>
    <label for="password">Password</label><br>
    <input type="password" id="password" name="password"
        value="<?php echo isset($_POST['password']) ? 
                                htmlentities($_POST['password']) : 
                                ''; ?>"><br>
    <label for="hobbies">Hobbies</label><br>
    <textarea id="hobbies" name="hobbies">
        <?php echo isset($_POST['hobbies']) ? 
                            htmlentities($_POST['hobbies']) : 
                            ''; ?>
    </textarea><br>
    <label for="nationality">Nationality</label><br>
    <select id="nationality" name="nationality">
        <?php 
            for($i=0; $i < count($nationalities); $i++){
                echo '<option value="'.$i.'">'.$nationalities[$i].'</option>';
            }
        ?>
    </select><br>
    <input type="submit" name="submit" value="Submit data"/>
</form>

<?php
// check if the form is submitted

function get_error_message ($msg) {
    return '<p style="color: darkred">' . $msg . '</p>';
}
function get_success_message($msg) {
    return '<p style="color: green">'.$msg.'</p>';
}
function write_data_to_file($data, $file_name) {
    if(is_writeable($file_name)) {
        $handle = fopen($file_name, 'a');
        foreach ($data as $key => $value) {
            fwrite($handle, $key."=>".$value.' ');
        }
        fwrite($handle, "\n");
        fclose($handle);
    } else {
        echo '<p style="color: darkred">File not writeable</p>';
    }
}
if (isset($_POST['submit'])) {
    $clean = array();
    $error_messages = '';
    if (isset($_POST['username']) && ctype_alnum($_POST['username']))
        $clean['username'] = $_POST['username'];
    else
        $error_messages .= get_error_message('Username should contain only alphanumerical values');
    if (isset($_POST['password']) && strlen($_POST['password']) >= 6)
        $clean['password'] = $_POST['password'];
    else
        $error_messages .= get_error_message('Password should be at least 6 chars long');
    if (isset($_POST['hobbies']) && str_word_count($_POST['hobbies']) > 4)
        $clean['hobbies'] = trim($_POST['hobbies']);
    else
        $error_messages .= get_error_message('Describe your hobbies with at least 5 words');
    if (isset($_POST['nationality']))
        $clean['nationality'] = $nationalities[$_POST['nationality']];
    if ($error_messages)
        echo $error_messages;
    if (count($clean) > 0) {
        // we have at least one clean data
        echo 'Correct submitted data are: <br>';
        foreach($clean as $key => $val)
            echo  get_success_message($key . ': ' . $val);
        // all data are clean
        if (count($clean) === 4)
            write_data_to_file($clean, 'files/registrations.txt');
    } else {
        echo get_error_message('No clean data at all');
    }
} else {
    echo get_error_message('nothing submitted yet');
}
?>

<?php 

$users = file('files/registrations.txt');
if (count($users) > 0) {
    echo '<h2>Already registered users</h2>';
    foreach($users as $user){
        echo '<p style="color: blue">'.$user.'</p>';
    }
} else {
    echo '<p style="color: darkred">No registrations yet</p>';
}

?>

<?php
require_once 'common/footer.php';
?>
