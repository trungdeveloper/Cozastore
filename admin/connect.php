<?php 
	$conn = new mysqli("localhost","root","","php_project");
	mysqli_set_charset($conn, 'UTF8MB4');
//check connection
	if ($conn == false) {
		die("Connection failed: " . $conn->connect_error);
	}
?>