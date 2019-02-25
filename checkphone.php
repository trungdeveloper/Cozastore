<?php
// Array with names
$conn = mysqli_connect("localhost","root","","php_project");
mysqli_set_charset($conn, 'UTF8MB4');

// get the q parameter from URL
$p = $_REQUEST["p"];

$hint = "";

 if (strlen($p)!=10) {
     $hint = "phone is not true";
     
 }else{
 $hint = "ok";
 }

// Output "no suggestion" if no hint was found or output correct values 
 echo $hint === "" ? "" : $hint;
?>