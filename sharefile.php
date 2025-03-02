<?php
//sharefile.php
session_start();

$userFolder = $_SESSION["userfolder"];

//filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
//$filename = $_POST['filetoshare'];
$filename = filter_input(INPUT_POST, 'filetoshare', FILTER_SANITIZE_STRING);

$sharefile = $userFolder . '/' . $filename;

//$usertorecieve = $_POST['usertorecieve'];
$usertorecieve = filter_input(INPUT_POST, 'usertorecieve', FILTER_SANITIZE_STRING);

$usertorecievefolder = "/home/hmurr/srv/module2group/" . $usertorecieve;

copy($sharefile, $usertorecievefolder . '/' . $filename);

header("Location: viewfiles.php");
?>