<?php
session_start();
$msg = "";

// Admin login
if (isset($_POST['admin_login'])) {
    $con = mysqli_connect("localhost", "root", "", "rental_system");

    if ($con) {
        $email = trim($_POST['admin_email']);
        $pass = trim($_POST['admin_pass']);
        $qry = "SELECT * FROM admin_details WHERE adminemail='$email' AND adminpass='$pass'";
        $res = mysqli_query($con, $qry);

        if (mysqli_num_rows($res) == 1) {
            $_SESSION["admin_email"] = $email;
            $msg = "Admin login successful!";
            header("Location:adminchoice.php");
        } else {
            $msg = "Invalid admin credentials!";
        }
    } else {
        $msg = "Connection failed.";
    }
}

// User login
if (isset($_POST['user_login'])) {
    $con = mysqli_connect("localhost", "root", "", "rental_system");

    if ($con) {
        $email = trim($_POST['user_email']);
        $pass = trim($_POST['user_pass']);
        $qry = "SELECT * FROM user_details WHERE useremail='$email' AND userpass='$pass'";
        $res = mysqli_query($con, $qry);

        if (mysqli_num_rows($res) == 1) {
            $_SESSION["email"] = $email;
            $msg = "User login successful!";
           // header("refresh:2;url=userview.php");
           header("Location:userview.php");
        } else {
            $msg = "Invalid user credentials!";
        }
    } else {
        $msg = "Connection failed.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login Page</title>
  <link rel="stylesheet" href="loginprg.css" />
</head>
<body>

<div class="out" id="out1">
  <h1>Hello user</h1>
  <p id="parag">Please click on sign in if you already have an account.</p>
  <button id="btn4">Sign In</button>
</div>

<div class="outerbox">
  <div class="inner2">
    <!-- Admin Login -->
    <div class="signup">
      <form method="POST" >
        <h1>Admin Login</h1>
        <p id="para">Use your admin credentials</p>
        <input type="email" name="admin_email" placeholder="Admin Email" required class="inputbox">
        <input type="password" name="admin_pass" placeholder="Password" required class="inputbox">
        <button type="submit" name="admin_login" id="btn3">Sign In</button>
        <p id="para2"><br>
        <a href="resetpassword.php">Forgot Your Password?</a></p>
      </form>
    </div>

    <!-- User Login -->
    <div class="createacc">
      <form method="POST">
        <h1>User Login</h1>
        <p id="para2">Use your registered user credentials</p>
        <input type="email" name="user_email" placeholder="User Email" class="inp" required>
        <input type="password" name="user_pass" placeholder="Password" class="inp" required>
        
        <input type="submit" name="user_login" id="btn" value="Sign In">
        <p id="para2">New User? <br><br>
        <a href="registration.php">Register here</a></p>
      </form>
    </div>
  </div>

  <!-- Login message -->
  <?php if (!empty($msg)) {
    $class = strpos($msg, 'successful') !== false ? 'success' : 'error';
    echo "<div class='msg $class'>$msg</div>";
  } ?>
</div>
<script src="index.js"></script>
</body>
</html>