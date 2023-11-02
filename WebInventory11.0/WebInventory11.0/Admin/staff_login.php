<?php
session_start();

  if (isset($_SESSION['id'])) {
      header("Location:staff_home.php");
      exit();
  }
  // Include database connectivity
    
  include_once('config.php');
  
  if (isset($_POST['submit'])) {
      $errorMsg = "";
      $username = $conn->real_escape_string($_POST['username']);
      $password = $conn->real_escape_string(md5($_POST['password']));
      
  if (!empty($username) || !empty($password)) {
        $query  = "SELECT * FROM users WHERE username = '$username'";
        $result = $conn->query($query);
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $_SESSION['id'] = $row['id'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['full_Name'] = $row['full_Name'];
            header("Location:staff_home.php");
            die();                              
        }else{
          $errorMsg = "No user found on this username";
        } 
    }else{
      $errorMsg = "Username and Password is required";
    }
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/login.css"> <!-- Add your custom CSS file link here -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
  <div class="card text-center" style="padding:20px;">
  </div><br>
  <div class="container">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <?php if (isset($errorMsg)) { ?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $errorMsg; ?>
          </div>
        <?php } ?>
        <div class="center">
          <h1>Login as Staff</h1>
          <form method="post">
            <div class="txt_field">
              <input type="text" class="form-control" name="username" placeholder="" required>
              <span></span>
              <label>Username</label>
            </div>
            <div class="txt_field">
              <input type="password" class="form-control" name="password" placeholder="" required>
              <span></span>
              <label>Password</label>
            </div>
            <div class="pass">Forgot Password?</div>
            <input type="submit" name="submit" class="btn btn-success" value="Login">
            <div class="signup_link">
              Not a member? <a href="registration.php">Signup</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
