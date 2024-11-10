<?php
    // print_r($_POST);
    session_start();
    include("../common/db.php");
    
    if(isset($_POST["signup"])) {
        echo "The Username is = {$_POST["username"]} <br>";
        echo "The Password is = {$_POST["password"]} <br>";
        echo "The Email is = {$_POST["email"]} <br>";
        echo "The address is = {$_POST["address"]} <br>";

        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $address = $_POST["address"];

        $user = $conn->prepare("Insert into `users` (`id`,`username`,`password`,`email`,`address`)
            values (NULL,'$username','$password','$email','$address');
        ");
        $result = $user->execute();

        if($result) {
            // echo "New User Registered...";
            $_SESSION["user"] = ["username"=>$username,"email"=>$email];
            header('Location: /AskHub');
        }
        else {
            echo "New User Not Registered...";
        }
    }
?>