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
</head>
<body>
        <div class="container my-5">

        <h2>List of Users</h2>
        <a class="btn btn-primary" href="add_staff.php" role="button">New User</a>
        <br>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Phone Number</th>
                    <th>Role</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Username</th>
                    <th>Action</th>
                </tr>

                <tbody>

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
                                <a class='btn btn-primary btn-sm' href='usersEdit.php?id=$row[id]'>Edit</a>
                                <a class='btn btn-danger btn-sm' href='usersDelete.php?id=$row[id]'>Delete</a>
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