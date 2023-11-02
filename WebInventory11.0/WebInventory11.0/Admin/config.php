<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$server = "localhost";
$username = "root";
$password = "";
$db = "web_inventory"; 

$conn = mysqli_connect($server, $username, $password, $db);

if ($conn->connect_error){
    die("Connection failed:" . $conn->connect_error);
}