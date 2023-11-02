<?php

$server = "localhost";
$username = "root";
$password = "";
$db = "web_inventory";

// Create Connection
$conn = mysqli_connect($server, $username, $password, $db);

$full_name = "";
$phone_number = "";
$role = "";
$gender = "";
$address = "";
$username = "";
$password = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // GET method: Show the Data of the user
    if (!isset($_GET["id"])) {
        header("Location: users.php");
        exit;
    }

    $id = $_GET["id"];

    // read the row of the selected client from the database table
    $sql = "SELECT * FROM users WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("Location: users.php");
        exit;
    }
    

    $full_name = $row["full_name"];
    $phone_number = $row["phone_number"];
    $role = $row["role"];
    $gender = $row["gender"];
    $address = $row["address"];
    $username = $row["username"];
    $password = $row["password"];


} else {
    // POST method: Update the data of the user
    $full_name = $_POST["full_name"];
    $phone_number = $_POST["phone_number"];
    $role = $_POST["role"];
    $gender = $_POST["gender"];
    $address = $_POST["address"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Ensure $id is set
    if (!isset($_POST["id"])) {
        header("Location: users.php");
        exit;
    }

    $id = $_POST["id"];

    do {
        if (empty($full_name) || empty($phone_number) || empty($role) || empty($gender) ||
            empty($address) || empty($username) || empty($password)) {
            $errorMessage = "All the fields are required";
            break;
        }

        $sql = "UPDATE users SET " . 
            "full_name = '$full_name', phone_number = '$phone_number', role = '$role', " .
            "gender = '$gender', address = '$address', username = '$username', password = '$password' " .
            "WHERE id = $id";

        $result = $conn->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $conn->error;
            break;
        }

        $successMessage = "Client updated Successfully!";

        header("Location: users.php");
        exit;

    } while (true);

    }
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Inventory</title>
        <link rel="stylesheet" href="css/add_staff.css">
        <link rel="stylesheet" href="Navigation/css/nav.css">


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
        <script src=""></script>
        <script language="javascript" type="text/javascript">
            function preventBack(){window.history.forward()};
            setTimeout("preventBack()",0);
            window.onunload=function(){null;}
        </script>

</head>
<body>
  
    <div class="contact-form">
        <h class="new-product-label">CREATE STAFF ACCOUNT</h>
        <p class="please-provide">Please provide the staff member details</p>

        <?php
            if( !empty($errorMessage)){
                echo "<div class ='alert alert-warning alert-dismissble fade show'  role='alert'>
                    <strong>$errorMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
                </div>
                ";
            }
        ?>

        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label for="full_name">Full Name</label>
            <input type="text" name = "full_name"  placeholder = "Enter Full Name" value="<?php echo $full_name; ?>" required>
            <label for="phone_number">Phone Number</label>
            <input type="text" name ="phone_number" placeholder ="Enter Phone Number" value="<?php echo $phone_number; ?>" required>
            <label for ="userole"> Role </label>
            
            <select id="user-role" name="role">
                <option value="admin" <?php if ($role == 'admin') echo 'admin'; ?>>Admin</option>
                <option value="staff" <?php if ($role == 'staff') echo 'staff'; ?>>Staff</option>
            </select>
        </select>
        <label for="usergender">Gender</label>
        <select id="user-gender" name="gender">
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="prefer not to say">Prefer not to say</option>

            
        </select>

        


        <label for="user_address">Address</label>
            <input type="text" name = "address"  placeholder = "Enter Address" value="<?php echo $address; ?>" required>
            <label for="u_name">Username</label>
            <input type="text" name ="username" placeholder ="Create Username" value="<?php echo $username; ?>" required>
            <label for="pass">Password</label>
            <input type="text" name ="password" placeholder ="Create Password" value="<?php echo $password; ?>" required>
            
            <?php
                 if( !empty($successMessage)){
                    echo "
                    <div class='row mb-3'>
                        <div class='offset-sm-3 col-sm-6'>
                            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                <strong>$successMessage</strong>
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
                            </div
                        </div>
                    </div>
                    ";
                }
            ?>

        <div class="button">
        <input type="submit" value="Save" href="users.php">
        </div>
        
        
        </form>
        
    </div>
</body>
</html>