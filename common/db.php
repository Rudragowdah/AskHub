<?php
    $db_server = "localhost:3307";
    $db_user = "root";
    $db_pass = "";
    $db_name = "AskHub";
    $conn = "";

    try{
        $conn = mysqli_connect($db_server,$db_user,$db_pass,$db_name);
    }
    catch(mysqli_sql_exception){
        echo "Could not connect <br>";
    }

    if($conn) {
        echo "You are connected <br>";
    }

?>