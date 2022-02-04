<?php
function validate_isbn($isbn, &$clean, &$validation_messages) {
    if (isset($isbn) && strlen($isbn) > 0){
        if (strlen($isbn) === 13)
            $clean['isbn'] = $isbn;
        else
            $validation_messages['isbn'] = 'ISBN should be 13 chars long!';
    } else {
        $validation_messages['isbn'] = 'ISBN cannot be empty!';
    }
}

function validate_title($title, &$clean, &$validation_messages) {
    if (isset($title) && strlen($title) > 0) {
        if (strlen($title) <= 225)
            $clean['title'] = $title;
        else
            $validation_messages['title'] = 'Title should be lte 255 chars!';
    } else {
        $validation_messages['title'] = 'ISBN cannot be empty!';
    }
}

function validate_stock($stock, &$clean, &$validation_messages) {
    if (isset($stock) && intval($stock) > 0) {
        $clean['stock'] = $stock;
    } else {
        $validation_messages['stock'] = 'Stock should be set to a positive integer!';
    }
}

function validate_published_date($pub_date, &$clean, &$validation_messages) {
    if (isset($pub_date))
        $clean['published_date'] = $pub_date;
    else
        $validation_messages['published_date'] = 'Published date cannot be empty!';
}

?>