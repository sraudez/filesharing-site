<?php
//openfile.php
session_start();


if (!isset($_SESSION['username'])) {
    header("Location: userlogin.php");
    exit;
}


$userFolder = $_SESSION["userfolder"];
$filetoopen = filter_input(INPUT_POST, 'openfile', FILTER_SANITIZE_STRING);
if (isset($filetoopen)) {
    $filename = basename($filetoopen);

    $filepath = $userFolder . '/' . $filename;

    //https://www.geeksforgeeks.org/how-to-open-a-pdf-files-in-web-browser-using-php/
    if (file_exists($filepath)) {
        header('Content-Type: ' . mime_content_type($filepath));

        readfile($filepath);
        exit;
    } else {
        echo "File not found or inaccessible.";
    }
} else {
    echo "No file specified.";
}