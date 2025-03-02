<?php
//uploadfile.php
    session_start();

    if (!isset($_SESSION['username'])) {
        die("Error: User not logged in.");
    }

    //$userFolder = '/home/hmurr/srv/module2group/' . $_SESSION['username'];
    //$_SESSION["userfolder"] = $userFolder;
    $userFolder = $_SESSION["userfolder"];

    if (!is_writable($userFolder)) {
    die("Error: The folder $userFolder is not writable.");
    }
    //https://www.w3schools.com/php/php_file_upload.asp
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $userFolder . '/' . basename($_FILES["fileToUpload"]["name"]))) {
        echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
        header("Location: viewfiles.php");
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

?>