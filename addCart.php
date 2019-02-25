<?php
session_start();
$id= $_POST['id'];
$quantity = $_POST['quantity'];
if($id != "") {
$_SESSION['giohang'][$id] = $quantity; 
// echo $_SESSION['giohang'][$id];

}
header('Location: shoping-cart.php');
?>