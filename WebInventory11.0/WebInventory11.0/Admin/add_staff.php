<?php
include 'Navigation/nav.php';

$full_name = "";
$phone_number = "";
$role = "";
$gender = "";
$address = "";
$username = "";
$password = "";

$errorMessage = "";
$successMessage = "";

$server = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "web_inventory";

$conn = mysqli_connect($server, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection failed:" . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = $_POST["full_name"];
    $phone_number = $_POST["phone_number"];
    $role = $_POST["role"];
    $gender = $_POST["gender"];
    $address = $_POST["address"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    do {
        if (empty($full_name) || empty($phone_number) || empty($role) || empty($gender) || empty($address) || empty($username) || empty($password)) {
            $errorMessage = "All the fields are required";
            break;
        }

        $stmt = $conn->prepare("INSERT INTO users (full_name, phone_number, role, gender, address, username, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $full_name, $phone_number, $role, $gender, $address, $username, $password);
        $result = $stmt->execute();

        if (!$result) {
            $errorMessage = "Invalid query:" . $conn->error;
            break;
        }

        $full_name = "";
        $phone_number = "";
        $role = "";
        $gender = "";
        $address = "";
        $username = "";
        $password = "";

        $successMessage = "Client Successfully added";

        header("Location: users.php");
        exit;

    } while (false);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Inventory</title>
    <link rel="stylesheet" href="css/add_staff.css">
    <link rel="stylesheet" href="Navigation/css/nav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <script language="javascript" type="text/javascript">
        function preventBack() { window.history.forward() };
        setTimeout("preventBack()", 0);
        window.onunload = function () { null; }
    </script>
</head>
<body>
    <div class="contact-form">
        <h class="new-product-label">CREATE STAFF ACCOUNT</h>
        <p class="please-provide">Please provide the staff member details</p>

        <?php
        if (!empty($errorMessage)) {
            echo "<div class ='alert alert-warning alert-dismissble fade show'  role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
            </div>";
        }
        ?>

        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label for="full_name">Full Name</label>
            <input type="text" name="full_name" placeholder="Enter Full Name" value="<?php echo $full_name; ?>" required>
            <label for="phone_number">Phone Number</label>
            <input type="text" name="phone_number" placeholder="Enter Phone Number" value="<?php echo $phone_number; ?>" required>
            <label for="userole"> Role </label>
            <select id="user-role" name="role">
                <option value="admin" <?php if ($role == 'admin') echo 'selected'; ?>>Admin</option>
                <option value="staff" <?php if ($role == 'staff') echo 'selected'; ?>>Staff</option>
            </select>
            <label for="usergender">Gender</label>
            <select id="user-gender" name="gender">
                <option value="male" <?php if ($gender == 'male') echo 'selected'; ?>>Male</option>
                <option value="female" <?php if ($gender == 'female') echo 'selected'; ?>>Female</option>
                <option value="prefer not to say" <?php if ($gender == 'prefer not to say') echo 'selected'; ?>>Prefer not to say</option>
            </select>
            <label for="user_address">Address</label>
            <input type="text" name="address" placeholder="Enter Address" value="<?php echo $address; ?>" required>
            <label for="u_name">Username</label>
            <input type="text" name="username" placeholder="Create Username" value="<?php echo $username; ?>" required>
            <label for="pass">Password</label>
            <input type="text" name="password" placeholder="Create Password" value="<?php echo $password; ?>" required>

            <?php
            if (!empty($successMessage)) {
                echo "
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
                        </div>
                    </div>
                </div>
                ";
            }
            ?>

            <div class="button">
                <input type="submit" value="Save">
            </div>
        </form>
    </div>
</body>
</html>
