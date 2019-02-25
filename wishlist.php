<?php
$q = $_REQUEST["q"];
session_start();
function getWishlish(){
	   return isset($_SESSION['wishlish']) ? $_SESSION['wishlish'] : array();
}
if ($q=="") {
	$responseText = json_encode(getWishlish());
	echo $responseText;
}else{
	if (!isset($_SESSION['wishlish'])) {
		$array = getWishlish();
		array_push($array, $q);
		$_SESSION['wishlish'] = $array;
	}else{
		$array = getWishlish();
		$is_exist = 0;
		foreach ($array as $key => $value) {
		   if ($value == $q){
		       unset($array[$key]);
		       $is_exist = 1;
		   }
		}
		if ($is_exist == 0) {
			array_push($array, $q);
		} 
	
	}      
	       // Cập nhật lại Session
	// $array = getWishlish();
	// array_push($array, $q);
	sort($array);
	$_SESSION['wishlish'] = $array;

	$responseText = json_encode($array);
	echo $responseText;
}
?>