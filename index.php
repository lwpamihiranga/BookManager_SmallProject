<?php
	 session_start();

	 if(!isset($_SESSION['id'])) {
	 	header("Location: login.php");
	 } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>HomePage</title>
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css">
</head>
<body style='background-image: url("Titanium.jpg");'>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
      <div class="navbar-nav">
        <a class="nav-item nav-link active" href="index.php">Home</a>
        <a class="nav-item nav-link" href="book_list.php">Book List</a>
        <a class="nav-item nav-link" href="requested_books.php">Reqested Books</a>
        <a class="nav-item nav-link" href="my_books.php" <?php if($_SESSION['username'] == 'admin') { echo "hidden"; } ?> >My Books</a>
        <a class="nav-item nav-link" href="add_book.php" <?php if($_SESSION['username'] != 'admin') { echo "hidden"; } ?>>Add Books</a>
<!--        <a class="btn btn-secondary nav-item nav-link" href="login.php">Login</a>
        <a class="btn btn-secondary nav-item nav-link" href="register.php">Register</a> -->
        <a class="btn btn-secondary nav-item nav-link" href="logout.php">Logout</a>
      </div>
    </nav>
    <div class="container" style="margin-top: 100px;">
          <div class="jumbotron">
      <h1 class="display-4">Welcome, <?php echo $_SESSION['username'] ?>!</h1>
      <p class="lead">
        <a class="btn btn-primary btn-lg" href="book_list.php" role="button" <?php if($_SESSION['username'] == 'admin') { echo "hidden"; } ?>>View Books</a>
      </p>  
      <p class="lead">
        <a class="btn btn-primary btn-lg" href="requested_books.php" role="button" <?php if($_SESSION['username'] != 'admin') { echo "hidden"; } ?>>Manage Requests</a>
      </p>  
    </div>
    </div>

</body>
</html>