<?php

    if (isset($_GET["id"])) {
        $id = $_GET["id"];

        $server = "localhost";
        $username = "root";
        $password = "";
        $db = "web_inventory"; 
    
        //Create a connection
        $connection = new mysqli($server, $username, $password, $db);

        //Delete table in the inventory
        $sql = "DELETE  FROM tbl_product WHERE id=$id";
        $result = $connection->query($sql);
    }

    header("location: productTable.php");
    exit;
?>