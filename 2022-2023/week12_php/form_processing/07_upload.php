<?php 
// proper file handling
try {
    // Check $_FILES['uploadedFile']['error'] value.
    switch ($_FILES['uploadedFile']['error']) {
        case UPLOAD_ERR_OK: // There is no error
            break;
        case UPLOAD_ERR_NO_FILE:
            throw new RuntimeException('No file sent.');
        case UPLOAD_ERR_INI_SIZE: // The uploaded file exceeds the upload_max_filesize
        case UPLOAD_ERR_FORM_SIZE: // The uploaded file exceeds the MAX_FILE_SIZE
            throw new RuntimeException('Exceeded filesize limit.');
        default:
            throw new RuntimeException('Unknown errors.');
    }
    // You should also check filesize here. 
    if ($_FILES['uploadedFile']['size'] > 102400) {
        throw new RuntimeException('Exceeded filesize limit.');
    }
    // DO NOT TRUST $_FILES['uploadedFile']['type'] VALUE !!
    // Check MIME Type by yourself.
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    if (false === $ext = array_search(
        $finfo->file($_FILES['uploadedFile']['tmp_name']),
        array(
            'jpg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
            'pdf' => 'application/pdf'
        ),
        true
    )) {
        throw new RuntimeException('Invalid file format.');
    }

    // You should name it uniquely.
    // DO NOT USE $_FILES['uploadedFile']['name'] WITHOUT ANY VALIDATION !!
    // On this example, obtain safe unique name from its binary data.
    if (!move_uploaded_file(
        $_FILES['uploadedFile']['tmp_name'],
        sprintf('./files/%s.%s',
            sha1_file($_FILES['uploadedFile']['tmp_name']),
            $ext
        )
    )) {
        throw new RuntimeException('Failed to move uploaded file.');
    }

    echo 'File is uploaded successfully.';
} catch(RuntimeException $e) {
    echo $e->getMessage();
}

?>