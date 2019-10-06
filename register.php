<?php
  session_start();

  include('config.php');

  if(isset($_POST['btn-register'])) {
    $firstname  = $_POST['firstname'];
    $lastname   = $_POST['lastname'];
    $username   = $_POST['username'];
    $password   = $_POST['password'];

    $sql1 = "SELECT * FROM users WHERE username='$username' LIMIT 1";
    $query = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_array($query);
    $db_username = $row['username'];

    if(!empty($db_username)) {
      echo '<div class="alert alert-danger container" style="margin-top: 10px; margin-bottom: 5px;" role="alert">Sorry! User already exists</div>';
    } else {
          $sql = "INSERT INTO users (firstname, lastname, username, password)
    VALUES ('$firstname', '$lastname', '$username', '$password')";

    if($conn->query($sql) == TRUE) {
      echo '<div class="alert alert-success container" style="margin-top: 10px; margin-bottom: 5px;" role="alert">User registerd successfully</div>';
    } else {
      echo 'Error: ' . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    }


  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registration Page</title>
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css">
</head>
<body style='background-image: url("Titanium.jpg");'>
  <div class="container jumbotron" style="padding-top: 10px; margin-top: 50px;">
    <h1 class="display-4">Registration Page</h1>
    <form action="register.php" method="post">
        <div class="form-group">
          <label for="">First Name</label>
          <input type="text" name="firstname" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Last Name</label>
          <input type="text" name="lastname" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Username</label>
          <input type="text" name="username" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Password</label>
          <input type="password" name="password" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary" name="btn-register">Register</button>
        <a href="login.php" class="btn btn-link">Go to Login Page</a>
    </form>
  </div>
</body>
</html>
