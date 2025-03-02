<?php
//userlogin.php
session_start();
//filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING)
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$_SESSION["username"] = $username;

$filePath = "/home/hmurr/srv/module2group/users.txt";

$users = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

if (in_array($username, $users)) {
    echo 'Welcome back, ' . htmlspecialchars($username) . '!';
    header('Location: viewfiles.php');
    exit;

} else {
    echo 'Hello, ' . $username . ' you are not registered!';
}

?>