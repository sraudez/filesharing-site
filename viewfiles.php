
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: lightgray;
            color: black;
            border: 10px solid black;
            padding: 10px; 
          }
    </style>
    <title>View Files</title>
</head>
<body>
    <h1>Files in Folder:</h1>
<?php
//viewfiles.php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

$filePath = "/home/hmurr/srv/module2group/users.txt";


$userFolder = '/home/hmurr/srv/module2group/' . $_SESSION['username'];


$_SESSION["userfolder"] = $userFolder;



if (!is_dir($userFolder)) {
    mkdir($userFolder, 0777, true);
}

if (is_dir($userFolder)) {
    $userfiles = array_diff(scandir($userFolder), ['.', '..']);
} else {
    $userfiles = array(); // Empty array if no directory
}

//https://stackoverflow.com/questions/15774669/list-all-files-in-one-directory-php code used from this website below ($files = array_diff(scandir($userFolder), ['.', '..']);)
$userfiles = array_diff(scandir($userFolder), ['.', '..']);

foreach ($userfiles as $file):
    echo htmlspecialchars($file);
    echo htmlspecialchars(" ");
endforeach;

?>

<h1>Upload Files:</h1>
<?php
//https://www.w3schools.com/php/php_file_upload.asp
?>

<form action="uploadfile.php" method="post" enctype="multipart/form-data">
  Select file to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload File" name="submit">
</form>

<h1>Open File:</h1>
<form action="openfile.php" method="post">
  Select file to open (must include .pdf/.txt/.doc/.etc):
  <input type="text" id="openfile" name="openfile" required>
  <button type="submit">Open</button>
</form>



<h1>Rename File:</h1>
<form action="renamefile.php" method="post">
  Select file to rename (must include .pdf/.txt/.doc/.etc):
  <input type="text" id="oldname" name="oldname" required>
  
  <label for="newname">Rename it to:</label>
  <input type="text" id="newname" name="newname" required>
  
  <button type="submit">Submit</button>
</form>

<h1>Share File:</h1>
<form action="sharefile.php" method="post">
  Select file to share (must include .pdf/.txt/.doc/.etc):
  <input type="text" id="filetoshare" name="filetoshare" required>
  
  <label for="usertorecieve">Share it with:</label>
  <input type="text" id="usertorecieve" name="usertorecieve" required>
  
  <button type="submit">Submit</button>
</form>


<h1>Delete File:</h1>
  <form action="delete.php" method="GET">
  Filename: <input type="text" name="file">

  <button type="submit">Delete</button>
  </form>



  <form action="logout.php" method="POST">
    <button type="submit">Logout</button>
</form>

</body>
</html>