<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include('./client/commonFiles.php'); ?>
</head>
<body>
    <?php 
    session_start();
    include('./client/header.php'); 
    if(isset($_GET["signup"])) {
        include('./client/signup.php');
    }
    elseif(isset($_GET['login'])) {
        include("./client/login.php");
    }
    else {
        // Something Else
    }
    ?>
</body>
</html>