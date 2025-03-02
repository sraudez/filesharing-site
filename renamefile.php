<?php
//renamefile.php
session_start();

//$oldname = $_POST['oldname'];
$oldname = filter_input(INPUT_POST, 'oldname', FILTER_SANITIZE_STRING);
//$newname = $_POST['newname'];
$newname = filter_input(INPUT_POST, 'newname', FILTER_SANITIZE_STRING);
//filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);

$userFolder = $_SESSION["userfolder"];

$oldFilePath = $userFolder . '/' . $oldname;
$newFilePath = $userFolder . '/' . $newname;

rename($oldFilePath,$newFilePath);

header("Location: viewfiles.php");
exit();

?>