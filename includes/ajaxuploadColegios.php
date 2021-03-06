<?php
$valid_exts = array('png'); // valid extensions
$max_size = 400 * 1024; // max file size
$path = '../media/imglogo/'; // upload directory

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if( ! empty($_FILES['image']) ) {
        // get uploaded file extension
        $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        // looking for format and size validity
        if (in_array($ext, $valid_exts) AND $_FILES['image']['size'] < $max_size) {
            $nombre = uniqid();
            $path = $path . $nombre . '.' .$ext;
            // move uploaded file from temp to uploads directory
            if (move_uploaded_file($_FILES['image']['tmp_name'], $path)) {
                echo $nombre.".".$ext;
            }
        } else {
            echo"<script>alert('Error. Por favor seleccione una imagen con extension .png');</script>";
        }
    } else {
        echo 'photo_NA.jpg';
    }
} else {
    echo 'photo_NA.jpg';
}
?>