<?php 
	include("connect.php");
	error_reporting(2);
	$id = $_GET["id"];
	$sql="delete from products where id=".$id;
	$result=mysqli_query($conn,$sql);
	if ($result) {
		header("location: product.php");
	}
	
 ?>