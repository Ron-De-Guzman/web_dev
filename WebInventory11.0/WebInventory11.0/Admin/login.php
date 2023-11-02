<?php
session_start(); // Start the session at the beginning of the file

include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $loginQuery = "SELECT * FROM tbl_admin WHERE username = '$username'";
    $result = mysqli_query($conn, $loginQuery);

    if (mysqli_num_rows($result) == 1) {
        // Valid login credentials
        $row = mysqli_fetch_assoc($result);
    
        // Verify the hashed password
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['logged_in'] = true;
            header("location: home.php");
            exit;
        } else {
            // Invalid login credentials
            echo "<script>alert('Invalid password or username');</script>";
        }
    } else {
        // Invalid login credentials
        echo "<script>alert('Invalid password or username');</script>";
    }
}
?>

<!-- rest of your HTML code remains the same -->


<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="stylesheet" href="css/login.css">
  
         <!-- PREVENT BACK-->
         <script language="javascript" type="text/javascript">
            function preventBack(){window.history.forward()};
            setTimeout("preventBack()",0);
            window.onunload=function(){null;}
        </script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        </head>
        <body>
            <div class="center">
                <h1>Login as Admin</h1>
                <form method="post">
                    <div class="txt_field">
                        <input type="text" name= "username" required>
                        <span></span>
                        <label>Username</label>
                    </div>
                    <div class="txt_field">
                        <input type="password" name="password" required>
                        <span></span>
                        <label>Password</label>
                    </div>
                    <div class="pass">Forgot Password?</div>
                    <input type="submit" value="Login">
                    <div class="signup_link">
                        Not a member? <a href="registration.php">Signup</a>
                    </div>
                </form>
            </div>
            
        </body>
</html>