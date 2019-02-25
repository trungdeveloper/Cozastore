
<?php
session_start();
error_reporting(2);
if (isset($_SESSION['login_user']) == false ) {
 // Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
 	header('Location: page404.php');
}elseif (isset($_SESSION['login_user']) == true) {
	 // Ngược lại nếu đã đăng nhập
	 $permission = $_SESSION['login_user'];
	 // Kiểm tra quyền của người đó có phải là admin hay không
	 if ($permission != 'admin') {
		 // Nếu không phải admin thì xuất thông báo
		 echo "Bạn không đủ quyền truy cập vào trang này</h1><br>";
		 echo "<a href='../product.php'> Click để về lại trang chủ</a>";
		 exit();
	 }
	 
}
?>