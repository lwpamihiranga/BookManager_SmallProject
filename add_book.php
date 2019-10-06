<?php
	session_start();
	include 'config.php';
	$display = FALSE;

	if(isset($_POST['btn-add-book'])) {
		$book_id 	= $_POST['book_id'];
		$title 		= $_POST['title'];
		$author 	= $_POST['author'];
		$category 	= $_POST['category'];
		$description= $_POST['description'];
		$num_copies = $_POST['copies'];

		$sql = "INSERT INTO books (book_id, title, author, category, description, copies_num) VALUES ('$book_id', '$title', '$author', '$category', '$description', '$num_copies')";

		if($conn->query($sql) == TRUE) {
			$display = TRUE;
      		//echo 'Book added';
    	} else {
      		echo 'Error: ' . $sql . "<br>" . $conn->error;
    	}

    	$conn->close();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Book Page</title>
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

    <div class="alert alert-success container" style="margin-top: 10px; margin-bottom: 5px;" role="alert" <?php if(!$display) { echo "hidden"; } ?>>Book Added</div>

	<div class="container jumbotron" style="margin-top: 10px; padding-top: 20px;"">
		<form action="add_book.php" method="post">
			<div class="form-group">
				<label>Book ID</label>
				<input type="text" name="book_id" class="form-control" required>
			</div>
			<div class="form-group">
				<label>Title</label>
				<input type="text" name="title" class="form-control">
			</div>
			<div class="form-group">
				<label>Author</label>
				<input type="text" name="author" class="form-control">
			</div>
			<div class="form-group">
				<label>Category</label>
				<input type="text" name="category" class="form-control">
			</div>
			<div class="form-group">
				<label>Description</label>
				<textarea name="description" class="form-control" rows="4"></textarea>
			</div>
			<div class="form-group">
				<label>Copies Available</label>
				<input type="number" name="copies" class="form-control">
			</div>
			<button name="btn-add-book" type="submit" class="btn btn-primary">Add Book</button>
		</form>
	</div>
</body>
</html>