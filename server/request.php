<?php
    // print_r($_POST);
    session_start();
    include("../common/db.php");
    
    if(isset($_POST["signup"])) {
        // echo "The Username is = {$_POST["username"]} <br>";
        // echo "The Password is = {$_POST["password"]} <br>";
        // echo "The Email is = {$_POST["email"]} <br>";
        // echo "The address is = {$_POST["address"]} <br>";

        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $address = $_POST["address"];

        $user = $conn->prepare("Insert into `users` (`id`,`username`,`password`,`email`,`address`)
            values (NULL,'$username','$password','$email','$address');
        ");
        $result = $user->execute();

        if($result) {
            echo "New User Registered...";
            // echo $username . "<br>";
            // echo $password;
            $_SESSION["user"] = ["username"=>$username,"email"=>$email];
            header('Location: /AskHub');
        }
        else {
            echo "New User Not Registered...";
        }
    }
    elseif(isset($_POST["login"])) {
        // print_r($_POST);
        $email = $_POST['email'];
        $password = $_POST['password'];
        $username = "";
        $query = "select * from `users` where email = '$email' and password = '$password'";
        $result = $conn->query($query);
        // echo $result->num_rows;
        if( $result->num_rows==1) {
            foreach($result as $row) {
                // echo $row['username'];
                $username = $row['username'];
            }
            $_SESSION["user"] = ["username"=>$username,"email"=>$email];
            header('Location: /AskHub');
        }
        else {
            echo "Account Not Found...";
        }

    }
    elseif(isset($_GET["logout"])) {
        session_unset();
        header("Location: /AskHub");
    }
?>