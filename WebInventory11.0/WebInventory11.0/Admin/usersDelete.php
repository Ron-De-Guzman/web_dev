<?php

    if( isset($_GET["id"])){

        $id = $_GET["id"];

        $server = "localhost";
        $username = "root";
        $password = "";
        $db = "web_inventory"; 

        //Create Connection

        $conn = mysqli_connect($server, $username, $password, $db);

        $sql = "DELETE FROM users WHERE id=$id";
        $conn->query($sql);
    }

    header("location: users.php");
?>