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
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $user = $conn->prepare("Insert into `users` (`id`,`username`,`password`,`email`,`address`)
            values (NULL,'$username','$password_hash','$email','$address');
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
        $query = "select * from `users` where email = '$email'";

        $result = $conn->query($query);
        // print_r($result);
        // echo $result->num_rows;
        // $password = $result;
        if( $result->num_rows==1) {
            foreach($result as $row) {
                // echo $row;
                $username = $row['username'];
                $user_id = $row['id'];
                $password_hash = $row['password'];
            }
            if(password_verify($password, $password_hash))
            {
                $_SESSION["user"] = ["username"=>$username,"email"=>$email,"user_id"=>$user_id];
                header('Location: /AskHub');
            }
            else {
                // header('Location: /AskHub');
                // include("../client/header.php");
                // echo "<script>alert('Invalid Username or password')</script>";
                // include("../client/login.php");
                echo '<script>
                    alert("Invalid Username or Password?");
                    window.location.href = "../?login=true";
                    </script>';
            }
        }
        else {
            echo "<h2>Invalid Username and Password</h2>";
            echo '<script>
                    alert("Invalid Username or Password?");
                    window.location.href = "../?login=true";
                    </script>';
        }

    }elseif(isset($_GET["confirmlogout"])){
        session_unset();
        header("Location: /AskHub");
    }
    elseif(isset($_GET["logout"])) {
        echo '<script>
            if (confirm("Are you sure you want to logout?")) {
                window.location.href = "?confirmlogout=true";
            } else {
                window.location.href = "/AskHub";
            }
          </script>';
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
    // elseif(isset($_GET['delete'])) {
    //     $qid = $_GET['delete'];
    //     $query = $conn->prepare("delete from questions where id=$qid");
    //     $result = $query->execute();
    //     if($result) {
    //         header("Location: /askhub");
    //     }
    //     else {
    //         echo "Failed to Delete the Question";
    //     }
    // }
    elseif (isset($_GET['delete'])) {
        // Display a confirmation dialog
        echo '<script>
                if (confirm("Are you sure you want to delete this question?")) {
                    // If confirmed, redirect to a URL with the confirmdelete parameter
                    window.location.href = "?confirmdelete=' . $_GET['delete'] . '";
                } else {
                    // If cancelled, redirect back to the main page
                    window.location.href = "/askhub";
                }
              </script>';
    }
    
    elseif (isset($_GET['confirmdelete'])) {
        $qid = $_GET['confirmdelete'];
    
        // Use a prepared statement to safely delete the record
        $query = $conn->prepare("DELETE FROM questions WHERE id = ?");
        $query->bind_param('i', $qid);
        $result = $query->execute();
    
        if ($result) {
            header("Location: /askhub/u_id='$u_id'");
            exit();
        } else {
            echo "Failed to Delete the Question";
        }
    }
?>