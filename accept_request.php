<?php
	include 'config.php';

	$req_id = $_GET['reqid'];

	$sql = "UPDATE book_requests SET status='Accepted' WHERE req_id='$req_id'";

	if($conn->query($sql) == TRUE) {
		header("Location: requested_books.php");
    } else {
    	echo 'Error: ' . $sql . "<br>" . $conn->error;
    }
?>