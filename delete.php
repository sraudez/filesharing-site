<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Deletion</title>
</head>
<body>
    <?php
    session_start();
    //delete.php
    if(!isset($_SESSION['username'])){
        header("Location: login.php");
        exit;
    }

    //$username = $_SESSION['username'];
    //$userFolder = '/home/hmurr/srv/module2group/' . $_SESSION['username'];
    //$filename = $_GET['file'];
    $filename = filter_input(INPUT_GET, 'file', FILTER_SANITIZE_STRING);
    //filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);


    $userFolder = $_SESSION["userfolder"];

    $deletefile = $userFolder . '/' . $filename;

    if (unlink($deletefile)){
        echo "File deleted successfully";
    } else {
        echo "Error deleting file";
    }

    header("Location: viewfiles.php");
    exit();

    ?>
</body>
</html>