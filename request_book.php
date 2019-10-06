<?php 
	session_start();

	include 'config.php';

	$book_id 			= $_GET['bookid'];
	$book_title 		= $_GET['title'];
	$book_author 		= $_GET['author'];
	$book_description 	= $_GET['description'];
	$username 				= $_SESSION['username'];

	$sql = "INSERT INTO book_requests (book_id, book_title, book_author, book_description, username) VALUES ('$book_id', '$book_title', '$book_author', '$book_description', '$username')";

	if($conn->query($sql) == TRUE) {
		header("Location: requested_books.php");
     	echo 'Book added';
    } else {
      	echo 'Error: ' . $sql . "<br>" . $conn->error;
    }
?>