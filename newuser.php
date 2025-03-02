<?php
//newuser.php
session_start();

//$newusername = $_POST['newusername'];
$newusername = filter_input(INPUT_POST, 'newusername', FILTER_SANITIZE_STRING);
//filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);

$_SESSION["username"] = $newusername;

$filePath = "/home/hmurr/srv/module2group/users.txt"; 

$users = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

if (in_array($newusername, $users)) {
    echo 'You already have an account, ' . $newusername . '!';
} else {
    echo 'Hello, ' . $newusername . ' you are now registered!';

    file_put_contents($filePath, $newusername . PHP_EOL, FILE_APPEND | LOCK_EX);
    
    $userFolder = '/home/hmurr/srv/module2group/' . $_SESSION['username'];

    if (!file_exists($userFolder)) {
        if (mkdir($userFolder, 0777, true)) {
            echo "Folder created successfully!";
        } else {
            echo "Failed to create folder.";
        }
    } else {
        echo "Folder already exists.";
    }

    header("Location: viewfiles.php");
    exit();
}

?>
