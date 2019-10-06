<?php 
	session_start();

	include 'config.php';

		$username = $_SESSION['username'];
		$sql = "SELECT * FROM book_requests WHERE username='$username' AND status='Accepted'";
		$query = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Book Requests for Admin</title>
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


	<div class="container">
		<?php 
			while($row = mysqli_fetch_assoc($query))
			{
		?>
		<div class="card" style="margin-bottom: 20px; margin-top: 10px;">
			<div class="card-body">
				<h5 class="card-title">Title: <?php echo $row['book_title'] ?></h5>
				<footer class="blockquote-footer">Author: <?php echo $row['book_author'] ?></footer>
				<br>
				<p class="card-text">Description: <?php echo $row['book_description'] ?></p>
<!-- 				<a href="request_book.php?bookid<?php echo $row['book_id'] ?>" class="btn btn-primary" <?php if($_SESSION['username'] == 'admin') { echo "hidden"; } ?>>Request Book</a>
				<a href="update_book.php?bookid=<?php echo $row['book_id'] ?>" class="btn btn-primary" <?php if($_SESSION['username'] != 'admin') { echo "hidden"; } ?>>Update Book</a> -->
				<a href="delete_request.php?reqid=<?php echo $row['req_id'] ?>" class="btn btn-primary" name="delete-request">Return Book</a>
				<a href="accept_request.php?reqid=<?php echo $row['req_id'] ?>" class="btn btn-primary" name="accept-request" <?php if($_SESSION['username'] != 'admin') { echo "hidden"; } ?>>Accept Request</a>
			</div>
		</div>
		<?php 
			}
		?>		
	</div>

</body>
</html>