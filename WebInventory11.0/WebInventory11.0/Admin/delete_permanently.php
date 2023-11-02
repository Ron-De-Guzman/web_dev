<?php
include 'Navigation/nav.php';
include 'function.php';

$server = "localhost";
$username = "root";
$password = "";
$db = "web_inventory";

$connection = new mysqli($server, $username, $password, $db);

if ($connection->connect_error) {
    die("Connection Failed: " . $connection->connect_error);
}

if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    if (deletePermanently($productId, $connection)) {
        header("Location: archived_products.php"); // Redirect to the archive page
        exit();
    } else {
        echo "Failed to delete product permanently.";
    }
} else {
    echo "Product ID not provided.";
}
?>
