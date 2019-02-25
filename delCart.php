<?php
session_start();
$id= $_GET['id'];
if($id != "") {
unset($_SESSION['giohang'][$id]); 
// echo print_r($_SESSION['giohang']);

}
header('Location: shoping-cart.php');
?>