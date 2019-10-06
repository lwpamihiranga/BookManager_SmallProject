<?php
	session_start();
	include 'config.php';

	$book_id = $_GET['bookid'];
	$sql = "SELECT * FROM books WHERE book_id='$book_id' LIMIT 1";
	$query = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($query);

	if(isset($_POST['btn-update-book'])) {
		$book_id 	= $_POST['book_id'];
		$title 		= $_POST['title'];
		$author 	= $_POST['author'];
		$category 	= $_POST['category'];
		$description= $_POST['description'];
		$num_copies = $_POST['copies'];

		$sql = "UPDATE books SET title='$title', author='$author', category='$category', description='$description', copies_num='$num_copies' WHERE book_id='$book_id'";

		if($conn->query($sql) == TRUE) {
			header("Location: book_list.php");
      		echo 'Book updated';
    	} else {
      		echo 'Error: ' . $sql . "<br>" . $conn->error;
    	}

    	$conn->close();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Book Update Page</title>
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

	<div class="container jumbotron" style="margin-top: 10px; padding-top: 20px;"">
		<form action="update_book.php" method="post">
			<div class="form-group">
				<label>Book ID</label>
				<input type="text" name="book_id" class="form-control" value="<?php echo $row['book_id'] ?>" readonly>
			</div>
			<div class="form-group">
				<label>Title</label>
				<input type="text" name="title" class="form-control" value="<?php echo $row['title'] ?>">
			</div>
			<div class="form-group">
				<label>Author</label>
				<input type="text" name="author" class="form-control" value="<?php echo $row['author'] ?>">
			</div>
			<div class="form-group">
				<label>Category</label>
				<input type="text" name="category" class="form-control" value="<?php echo $row['category'] ?>">
			</div>
			<div class="form-group">
				<label>Description</label>
				<textarea name="description" class="form-control" rows="4"><?php echo $row['description'] ?></textarea>
			</div>
			<div class="form-group">
				<label>Copies Available</label>
				<input type="number" name="copies" class="form-control" value="<?php echo $row['copies_num'] ?>">
			</div>
			<button name="btn-update-book" type="submit" class="btn btn-primary">Update Details</button>
		</form>
	</div>
</body>
</html>