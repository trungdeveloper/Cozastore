<?php
// Array with names
$conn = mysqli_connect("localhost","root","","php_project");
mysqli_set_charset($conn, 'UTF8MB4');
error_reporting(2);
// get the q parameter from URL
$password = $_REQUEST["password"];

$hint = "";

 if (strlen($password)<=7) {
     $hint = "Password is less than 8 characters";
     
 }else{
 $hint == "ok";
 }

// Output "no suggestion" if no hint was found or output correct values 
 echo $hint === "" ? "" : $hint;
?>