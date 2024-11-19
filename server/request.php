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
            $_SESSION["user"] = ["username"=>$username,"email"=>$email,"user_id"=>$user->insert_id];
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
        $user_id = 0;
        $query = "select * from `users` where email = '$email' and password = '$password'";
        $result = $conn->query($query);
        // echo $result->num_rows;
        if( $result->num_rows==1) {
            foreach($result as $row) {
                // echo $row['username'];
                $username = $row['username'];
                $user_id = $row['id'];
            }
            $_SESSION["user"] = ["username"=>$username,"email"=>$email,"user_id"=>$user_id];
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
    elseif(isset($_POST['ask'])) {
        // print_r($_POST);
        // print_r($_SESSION);
        $title = $_POST["title"];
        $description = $_POST["desc"];
        $category_id = $_POST["category"];
        $user_id = $_SESSION["user"]["user_id"];

        $user = $conn->prepare("Insert into questions (`id`,`title`,`description`,`category_id`,`user_id`)
            values (NULL,'$title','$description','$category_id','$user_id');
        ");
        $result = $user->execute();
        if($result) {
            header('Location: /AskHub');
        }
        else {
            echo "Error In Storing Question in the Database";
        }
    }
    elseif(isset($_POST['answer'])) {
        // print_r($_POST);
        $answer = $_POST["answer"];
        $question_id = $_POST["question_id"];
        $user_id = $_SESSION["user"]["user_id"];

        $user = $conn->prepare("Insert into answers (`id`,`answer`,`question_id`,`user_id`)
            values (NULL,'$answer','$question_id','$user_id');
        ");
        $result = $user->execute();
        if($result) {
            header("Location: /AskHub/?q-id=$question_id");
        }
        else {
            echo "Error In Storing Answer in the Database";
        }
    }
    elseif(isset($_GET['delete'])) {
        $qid = $_GET['delete'];
        $query = $conn->prepare("delete from questions where id=$qid");
        $result = $query->execute();
        if($result) {
            header("Location: /askhub");
        }
        else {
            echo "Failed to Delete the Question";
        }
    }
?>