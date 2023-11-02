<?php
    include 'Navigation/nav.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="Navigation/css/nav.css">
    <link rel="stylesheet" href="orders_receive.css">
    
</head>
<body>
        <div class="container my-5">

        <h2>List of Orders</h2>
        <br>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Full Name</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>Quantity</th>
                    <th>Time of Orders</th>
                    <th>Action</th>
                </tr>

                <tbody class="table-responsive-md">

                <?php
                $server = "localhost";
                $username = "root";
                $password = "";
                $db = "web_inventory";

                // Create Connection
                $conn = mysqli_connect($server, $username, $password, $db);

                // Check Connection
                if ($conn->connect_error) {
                    die("Connection failed:" . $conn->connect_error);
                }

                // Read all rows from the database
                $sql = "SELECT * FROM users";
                $result = $conn->query($sql);

                if (!$result) {
                    die("Invalid query: " . $conn->error);
                }

                // Read data for each row
                while ($row = $result->fetch_assoc()) {
                    echo "
                        <tr>
                            <td>$row[id]</td>
                            <td>$row[full_name]</td>
                            <td>$row[phone_number]</td>
                            <td>$row[role]</td>
                            <td>$row[gender]</td>
                            <td>$row[address]</td>
                            <td>$row[username]</td>
                            <td>
                            <div class='btn-group btn-group-sm gap-3' role='group' aria-label='Small button group'>
                                <a class='btn btn-success btn-sm' href='#'>Accept</a>
                                <a class='btn btn-danger btn-sm' href='#'>Reject</a>
                                <a class='btn btn-info btn-sm' href='view_orders.php'>Details</a>
                            </td>
                        </tr>
                    ";
                }
                ?>


                  
                </tbody>
            </thead>
        </table>
        </div>
</body>
</html>