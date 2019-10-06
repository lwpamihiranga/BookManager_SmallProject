<?php
	session_start();

	include 'config.php';

	$sql = "SELECT * FROM books";
	$query = mysqli_query($conn, $sql);
?>

</style>

<!DOCTYPE html>
<html>
<head>
	<title>Books List</title>
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
				<h5 class="card-title">Title: <?php echo $row['title'] ?></h5>
				<footer class="blockquote-footer">Author: <?php echo $row['author'] ?></footer>
				<br>
				<p class="card-text">Description: <?php echo $row['description'] ?></p>
				<a href="request_book.php?bookid=<?php echo $row['book_id'] ?>&title=<?php echo $row['title'] ?>&author=<?php echo $row['author'] ?>&description=<?php echo $row['description'] ?>" class="btn btn-primary" <?php if($_SESSION['username'] == 'admin') { echo "hidden"; } ?>>Request Book</a>
				<a href="update_book.php?bookid=<?php echo $row['book_id'] ?>" class="btn btn-primary" <?php if($_SESSION['username'] != 'admin') { echo "hidden"; } ?>>Update Book</a>
				<a href="delete_book.php?bookid=<?php echo $row['book_id'] ?>" class="btn btn-primary" name="delete-book" <?php if($_SESSION['username'] != 'admin') { echo "hidden"; } ?>>Delete Book</a>
			</div>
		</div>
		<?php 
			}
		?>		
	</div>

</body>
</html>