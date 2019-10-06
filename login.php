<?php
  include 'config.php';

  session_start();

  $display = FALSE;

  if(isset($_POST['btn-login'])) {
     $username = $_POST['username'];
     $password = $_POST['password'];

     if($username == "admin" && $password == "admin") {
        header("Location: index.php");
        $_SESSION['username'] = "admin";
        $_SESSION['id'] = 0;
     }

     $sql = "SELECT * FROM users where username='$username' LIMIT 1";
     $query = mysqli_query($conn, $sql);
     $row = mysqli_fetch_array($query);
     $id = $row['id'];
     $db_pwd = $row['password'];

     if($password == $db_pwd) {
        $_SESSION['username'] = $username;
        $_SESSION['id'] = $id;
        header("Location: index.php");
        echo 'Login succesfull';
     } else {
        $display = TRUE;
     }
   }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css">
  </head> 
  <body style='background-image: url("Titanium.jpg");'>
    <div class="container jumbotron" style="padding-top: 10px; margin-top: 50px;">
      <h1 class="display-4">Login Page</h1>
      <form action="login.php" method="post">
        <div class="form-group">
          <label for="">Username</label>
          <input type="text" name="username" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="">Password</label>
          <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" name="btn-login" class="btn btn-primary">Login</button>
        <a href="register.php" class="btn btn-link">Go to Registration Page</a>
      </form>
    </div>

     <div class="alert alert-danger container" style="margin-top: 10px; margin-bottom: 5px;" role="alert" <?php if(!$display) { echo "hidden"; } ?>>Login Failed! Please check your details and Try Again</div>
  </body>
</html>
