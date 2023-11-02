<?php
include 'Navigation/nav.php';
include 'function.php'; // Include the file containing your functions

$server = "localhost";
$username = "root";
$password = "";
$db = "web_inventory";

$connection = new mysqli($server, $username, $password, $db);

if ($connection->connect_error) {
    die("Connection Failed: " . $connection->connect_error);
}

// Check if an action and id are set in the URL
if (isset($_GET['action']) && isset($_GET['id'])) {
    $action = $_GET['action'];
    $productId = $_GET['id'];

    if ($action === 'archive') {
        // Archive the product
        if (archiveProduct($productId, $connection)) {
            // Successfully archived, redirect to archived_products.php
            header("Location: archived_products.php");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... (Your existing head section) ... -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archived Products</title>
    <link rel="stylesheet" href="css/archive.css">
    <link rel="stylesheet" href="Navigation/css/nav.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>
<body>
    <div class="container">
        <h1>Archived Products</h1>
        <table class="product-table">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Product ID</th>
                    <th>Category</th>
                    <th>Product_Measurement</th>
                    <th>Product_Price</th>
                    <th>Product_Quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = displayArchivedProducts($connection);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "
                            <tr>
                                <td>{$row['product_Name']}</td>
                                <td>{$row['product_ID']}</td>
                                <td>{$row['product_Category']}</td>
                                <td>{$row['product_Measurement']}</td>
                                <td>{$row['product_Price']}</td>
                                <td>{$row['product_Quantity']}</td>
                                <td>
                                    <a class='btn btn-success' href='restore.php?id={$row['id']}'>Restore</a>
                                    <a class='btn btn-danger btn-sm' href='delete_permanently.php?id={$row['id']}'>Delete Permanently</a>
                                </td>
                            </tr>
                        ";
                    }
                } else {
                    echo "<tr><td colspan='7'>No archived products found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script src="script.js"></script>
</body>
</html>
