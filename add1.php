<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Car Information Form</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      background: linear-gradient(135deg, #ece9e6, #ffffff);
      min-height: 100vh;
      background-image: url('e2.jpg');
      background-position: center;
      background-size: cover;
    }

    /* Navbar styles */
    nav {
      background-color: #6c63ff;
      display: flex;
      justify-content: flex-end;;
      padding: 1rem 0;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    nav a {
      color: #fff;
      text-decoration: none;
      margin: 0 1.5rem;
      font-size: 1.1rem;
      position: relative;
      transition: color 0.3s ease;
    }

    nav a:hover {
      color: #ffd369;
    }

    nav a::after {
      content: "";
      position: absolute;
      width: 0%;
      height: 2px;
      bottom: -4px;
      left: 0;
      background-color: #e6ff69;
      transition: width 0.3s ease;
    }

    nav a:hover::after {
      width: 100%;
    }

    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 10px;
      margin:auto;
      margin-left: 25px;
      margin-right: 25px;
      max-width: fit-content;
    }

    .form-container {
      background: #fff;
      padding: 2rem 2.5rem;
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      width: 400px;
    }

    .form-container h2 {
      text-align: center;
      margin-bottom: 1.5rem;
      color: #333;
    }

    .form-group {
      margin-bottom: 1rem;
    }

    .form-group label {
      display: block;
      margin-bottom: 0.5rem;
      font-weight: 600;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
      width: 100%;
      padding: 0.75rem;
      border-radius: 8px;
      border: 1px solid #ccc;
      transition: all 0.3s ease;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
      border-color: #6c63ff;
      outline: none;
      box-shadow: 0 0 0 3px rgba(108, 99, 255, 0.2);
    }

    .button-group {
      display: flex;
      justify-content: space-between;
      margin-top: 1.5rem;
    }

    .button-group button {
      padding: 0.75rem 1.5rem;
      border: none;
      border-radius: 8px;
      font-size: 1rem;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    .btn-add {
      background-color: #6c63ff;
      color: #fff;
    }

    .btn-add:hover {
      background-color: #554fe7;
    }

    .btn-cancel {
      background-color: #6c63ff;
      color: #fff;
    }

    .btn-cancel:hover {
      background-color: #554fe7;
    }
  </style>
</head>
<body>

    <form method="POST" enctype="multipart/form-data"  action="">
  <!-- Navigation Bar -->
  <nav>
    <a href="book.php">Home</a>
    <a href="admin.php">Admin</a>
    <a href="#">Add</a>
    <a href="#">About</a>
  </nav>

  <!-- Form Container -->
  <div class="container">
    <div class="form-container">
      <h2>Add Car Details</h2>
      <form>
        <div class="form-group">
          <label for="carimg">Car Image</label>
          <input type="file" id="carimg" name="carimg" accept="image/*" />
        </div>
        <div class="form-group">
          <label for="carmodel">Car Model</label>
          <input type="text" id="carmodel" name="carmodel" placeholder="e.g. Toyota Corolla" required />
        </div>
        <div class="form-group">
          <label for="price">Price ($)</label>
          <input type="number" id="price" name="price" placeholder="e.g. 25000" required />
        </div>
        <div class="form-group">
          <label for="fueltype">Fuel Type</label>
          <select id="fueltype" name="fueltype">
            <option value="">Select</option>
            <option value="Petrol">Petrol</option>
            <option value="Diesel">Diesel</option>
            <option value="Electric">Electric</option>
            <option value="Hybrid">Hybrid</option>
          </select>
        </div>
        <div class="form-group">
          <label for="myear">Manufacturing Year</label>
          <input type="number" id="myear" name="myear" placeholder="e.g. 2021" required />
        </div>
        <div class="form-group">
            <label for="location1">Location</label>
            <input type="text" id="location1" name="location1" placeholder="e.g. Banglore" required />
          </div>

        <div class="form-group">
          <label for="description">Description</label>
          <textarea id="description" name="description" rows="3" placeholder="Add some details..."></textarea>
        </div>
        <div class="button-group">
          <button type="submit" class="btn-add">Add</button>
          <button type="reset" class="btn-cancel">Cancel</button>
        </div>
      </form>
    </div>
  </div>


  
</body>
</html>
<?php
$connection = mysqli_connect('localhost', 'root', '', 'car');

if (!$connection) {
    die("Connection failed: " );
}

if (isset($_POST['btn-add'])) {
    $carmodel = mysqli_real_escape_string($connection, $_POST['carmodel']);
    $carprice = mysqli_real_escape_string($connection, $_POST['price']);
    $carfuel = mysqli_real_escape_string($connection, $_POST['fueltype']);
    $carlocation = mysqli_real_escape_string($connection, $_POST['location1']);
    $cardesc = mysqli_real_escape_string($connection, $_POST['description']);
    $caryear = mysqli_real_escape_string($connection, $_POST['myear']);

    $filename = $_FILES['carimg']['name'];
    $tempname = $_FILES['carimg']['tmp_name'];
    $folder = 'uploadimages/';
    move_uploaded_file($tempname, $folder . $filename);

    $stmt = $connection->prepare("INSERT INTO carrent (carmodel, price, fueltype, description, myear, carimg, location1) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $carmodel, $carprice, $carfuel, $cardesc, $caryear, $filename, $carlocation);
    $stmt->execute();

    header('Location:' . $_SERVER['PHP_SELF']);
    exit;
}

$connection->close();
?>
