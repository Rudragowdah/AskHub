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
    elseif(isset($_GET['q-id'])){
        $qid = $_GET['q-id'];
        include("./client/question-details.php");
    }
    elseif(isset($_GET['c_id'])){
        $c_id = $_GET['c_id'];
        include("./client/questions.php");
    }
    else {
        include("./client/questions.php");
    }
    ?>
</body>
</html>