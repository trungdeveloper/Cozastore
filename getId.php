<?php
// Array with names
$conn = mysqli_connect("localhost","root","","php_project");
mysqli_set_charset($conn, 'UTF8MB4');

// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

$array = array();
// lookup all hints from array if $q is different from "" 
 $sql = "SELECT * FROM products WHERE id=".$q;
 $result = mysqli_query($conn,$sql);
 while ($row = mysqli_fetch_array($result)) {
    $hint = json_encode($row);
 }
// Output "no suggestion" if no hint was found or output correct values 
 echo $hint;
?>