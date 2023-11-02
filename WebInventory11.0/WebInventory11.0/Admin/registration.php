<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $full_Name = $_POST['full_Name'];
    $business_Name = $_POST ['business_Name'];
    $username = $_POST['username'];
    $cityMunicipality = $_POST ['cityMunicipality'];
    $address = $_POST ['address'];
    $zipcode = $_POST ['zipcode'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $gender = $_POST['gender'];

    $duplicate = mysqli_query($conn, "SELECT * FROM tbl_admin WHERE username = '$username' OR email = '$email'");
    
    if (mysqli_num_rows($duplicate) > 0) {
        echo "<script>alert('Username or Email Has Already Taken');</script>";
    } elseif ($password !== $confirm_password) {
        echo "<script>alert('Password does not match!');</script>";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO tbl_admin (full_Name, business_Name, username, cityMunicipality, address, zipcode, email, phone_number, password, gender) 
            VALUES ('$full_Name', '$business_Name', '$username', '$cityMunicipality', '$address', '$zipcode', '$email', '$phone_number', '$hashed_password', '$gender')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "<script>alert('Registration Successfully!');</script>";
            header("Location: login.php");
            exit();
        } else {
            echo "<script>alert('Registration failed. Please try again later.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Registration</title>
    <link rel="stylesheet" href="css/registration.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <meta name="viewport" content="width=device-width, initial scale=1.0">
</head>
<body>
<div class="container">
    <div class="title">Tell us about your business</div>
    <p1>For the purpose of transparency, your details are required</p1>
    <form action="" method="POST">
        <div class="user-details">
            <div class="input-box">
                <span class="details">Full Name</span>
                <input type="text" placeholder="Enter your name" name="full_Name" required>
            </div>
            <div class="input-box">
                <span class="details">Business Name</span>
                <input type="text" placeholder="Enter business name" name="business_Name" required>
            </div>
            <div class="input-box">
                <span class="details">Username</span>
                <input type="text" placeholder="Enter your username" name="username" required>
            </div>
            <div class="input-box">
                <span class="details">City/Municipality</span>
                <input type="text" placeholder="City/Municipality" name="cityMunicipality" required>
            </div>
            <div class="input-box">
                <span class="details">Address</span>
                <input type="text" placeholder="Enter your address" name="address" required>
            </div>
            <div class="input-box">
                <span class="details">ZIP Code</span>
                <input type="text" placeholder="Enter ZIP Code" name="zipcode" required>
            </div>
            <div class="input-box">
                <span class="details">Email</span>
                <input type="text" placeholder="Enter your Email" name="email" required>
            </div>
            <div class="input-box">
                <span class="details">Phone Number</span>
                <input type="text" placeholder="Enter your phone number" name="phone_number" required>
            </div>
            <div class="input-box">
                <span class="details">Password</span>
                <input type="password" placeholder="Enter your password" name="password" required>
            </div>
            <div class="input-box">
                <span class="details">Confirm password</span>
                <input type="password" placeholder="Confirm password" name="confirm_password" required>
            </div>
        </div>
        <div class="gender-details">
                    <!-- radio button-->
                    <input type="radio" name="gender" id="dot-1" value="Male">
                    <input type="radio" name="gender" id="dot-2" value="Female">
                    <input type="radio" name="gender" id="dot-3" value="Prefer not to say">
                    <span class="gender-details">Gender</span>
                    <div class="category">
                        <label for="dot-1">
                            <span class="dot one"></span>
                            <span class="gender" name = "gender">Male</span>
                        </label>
                        <label for="dot-2">
                            <span class="dot two"></span>
                            <span class="gender" name = "gender">Female</span>
                        </label>
                        <label for="dot-3">
                            <span class="dot three"></span>
                            <span class="gender" name = "gender">Prefer not to say</span>
                        </label>
                    </div>
        </div>
        <div class="button">
            <input type="submit" name="submit" value="Register">
        </div>
        <button class="product-list" onclick="window.location.href='login.php'">
        <i class="fa-solid fa-right-to-bracket"></i> Back to Login
        </button>
        
    </form>
</div>
</body>
</html>
