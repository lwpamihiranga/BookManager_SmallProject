<?php
	include 'config.php';

	$req_id = $_GET['reqid'];

	$sql = "DELETE FROM book_requests WHERE req_id='$req_id'";

	if($conn->query($sql) == TRUE) {
		header("Location: requested_books.php");
    } else {
    	echo 'Error: ' . $sql . "<br>" . $conn->error;
    }
?>