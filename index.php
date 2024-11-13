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
    // $_SESSION["user"] = ["username"=>""];
    include('./client/header.php'); 
    if(isset($_GET["signup"]) && !isset($_SESSION['user']['username'])) {
        include('./client/signup.php');
    }
    elseif(isset($_GET['login']) && !isset($_SESSION['user']['username'])) {
        include("./client/login.php");
    }
    elseif(isset($_GET['ask'])) {
        // Something Else
        include("./client/ask.php");
    }
    else {
        include("./client/questions.php");
    }
    ?>
</body>
</html>