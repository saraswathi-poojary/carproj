


<?php
// Configuration
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'rental_system';

// Create connection
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Register user
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];
  
  $email_address = $_POST["email_address"];
 $mobile=$_POST["mobile"];
$state=$_POST["state"];
$city=$_POST["city"];
$district=$_POST["district"];
$pincode=$_POST["pincode"];
  // Check if passwords match
   if (isset($_POST['register'])) {
    $sql = "INSERT INTO user_details (username, userpass, useremail,mobile,city,district,state,pincode) VALUES('$username', '$password', '$email_address','$mobile','$city','$district','$state','$pincode' )";
$res=mysqli_query($conn,$sql);
if($res)

    {
      echo "<script>alert('Registration successful!');</script>";
    } else {
      echo "<script>alert(' enter valid details');</script>";
    }

   
    $conn->close();
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Registration Form</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <h2>Registration Form</h2>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <label>Username:</label>
    <input type="text" name="username" required><br><br>
    <label>Password:</label>
    <input type="password" name="password" required><br><br>
   
    <label>Mobile No:</label>
    <input type="text" name="mobile" required maxlength="10"><br><br>
    <label>Email Address:</label>
    <input type="email" name="email_address" required><br><br>
     <label>State:</label>
    
    <input type="text" name="state"required><br><br>


   <label >city</label>
    <input type="text" name="city"required><br><br>

    <label >district</label>


    <input type="text" name="district"required><br><br>
<label>pincode</label>
    <input type="text" name="pincode"required><br><br>

    <input type="submit" value="Register" name="register">
   
  
  
    
    
  </form>

</body>
</html>
