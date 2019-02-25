<?php
// Array with names
$conn = mysqli_connect("localhost","root","","php_project");
mysqli_set_charset($conn, 'UTF8MB4');

// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from "" 
 $sql = "SELECT user_name FROM users";
 $result = mysqli_query($conn,$sql);
 while ($row = mysqli_fetch_array($result)) {
     $a[] = $row["user_name"];
 }
foreach ($a as $key => $value) {
 if ($q == $value) {
     $hint = "Username is exist please change another username";
     break;
 }else{
 $hint = "ok";
 }
}
// Output "no suggestion" if no hint was found or output correct values 
 echo $hint === "" ? "" : $hint;
?>