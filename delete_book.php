<?php
	include 'config.php';

	$book_id = $_GET['bookid'];

	$sql = "DELETE FROM books WHERE book_id='$book_id'";

	if($conn->query($sql) == TRUE) {
		header("Location: book_list.php");
    } else {
    	echo 'Error: ' . $sql . "<br>" . $conn->error;
    }
?>