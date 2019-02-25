<?php 
	error_reporting(2);
	include("./admin/connect.php");
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title></title>
 	<link rel="stylesheet" href="">
 	<!-- Latest compiled and minified CSS & JS -->
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
 	<script src="//code.jquery.com/jquery.js"></script>
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
 	<link href="css/demo-page.css" rel="stylesheet" media="all">
	<link href="css/hover.css" rel="stylesheet" media="all">
 </head>
 <body>
 	<div class="containter">
	    <div class="signup col-md-12 col-xs-12 text-center" >
			<form action="" method="POST" id="signfrm" >
			<h3 class="sign-h" style="text-align: center;"><span id="sign-icon"><i class="fa fa-sign-in"></i></span>Sign Up!</h3>
				<input type="text" class="form-control sign-frm-input"  name="name" placeholder="enter Your Name" required="yes">
				<input type="number" class="form-control sign-frm-input"  name="phone" placeholder="enter Your Phone" required="yes" onkeyup="checkphone(this.value)">
				<input type="text" class="form-control sign-frm-input"  required="yes" name="address" placeholder="enter Your Address">
				<input type="text" class="form-control sign-frm-input"  required="yes" name="user_name" placeholder="enter Your User name" onkeyup="checkUser(this.value)">
				<input type="password" class="form-control sign-frm-input"  required="yes" name="password" placeholder="Creat Your Password" onkeyup="checkpassword(this.value)">
				<button type="submit" class="btn btn-primary hvr-pop hvr-glow" >Submit</button>
				
			</form>
			

			<div>

				<p id="show" name="show" style="color: red; text-align: center;">
					<?php echo $show; ?>
				</p>
			</div>
				<?php 
				// if(isset($_POST("sub"))){
					$name=$_POST['name'];
					$address=$_POST['address'];
					$user_name=$_POST['user_name'];
					$password=$_POST['password'];
					$phone=$_POST['phone'];
					$show=$_POST['show'];
				 	$sql="SELECT id from users where user_name='".$user_name."'" ;
				 	$result=mysqli_query($conn,$sql);
				 	$row=mysqli_fetch_array($result);
				 	$count=mysqli_num_rows($result);


				 	if ($count === 1 ) {    // kiểm tra có trong db chưa
				 		// echo("exist");
				 		header("signup.php");
				 	}
				 	elseif (strlen($password)<8) {
				 		// echo "pass";
				 		header("signup.php");
				 	
				 	}
				 	elseif (strlen($phone)!=10) {
				 		// echo "phone is not true";
				 		header("signup.php");
				 	}
			 		else{
			 			$sql_add_user="INSERT INTO users(user_name,password) value('".$user_name."','".$password."')";
					 	$sql_add_customer="INSERT INTO customers(`name`,`address`,`user_name`) value('".$name."','".$address."','".$user_name."')";
				 		$result1=mysqli_query($conn,$sql_add_user);
				 		$result2=mysqli_query($conn,$sql_add_customer);
				 		if ($result1 && $result2) {
				 			header("Location: login.php");
				 		}
				 			 		
			 		}
			 			
				 	
				 // }
				?>
		




		</div>
		<style type="text/css">
		#signfrm {
		  margin:5% auto;
		  width: 25%;
		  border: 1px solid #ccc;
		  border-radius: 20px;
		  padding: 20px;
		  }
		  .sign-frm-input {
		  margin-bottom: 10px;
		}

		.sign-h{
		text-align:left;
		color:#317EAC;
		}
		#sign-icon{
		margin-right:5px;
		color:#317EAC;
		}

		/*#sign-frm-input-btn {
		  width: 50%;
		  margin: auto;
		  font-size: 20;
		  padding: 5px !important;
		}*/
	</style>
	</div>
	<script type="text/javascript">
		function checkUser(name){
		     
		        var xmlhttp = new XMLHttpRequest();
		        xmlhttp.onreadystatechange = function() {
		            if (this.readyState == 4 && this.status == 200) {
		                document.getElementById("show").innerHTML = this.responseText;
		            }
		        };
		        xmlhttp.open("GET", "checkUser.php?q=" + name, true);
		        xmlhttp.send();
		    
		}
		function checkphone(phone){
		    // if (phone.length ===10) { 
		    //     document.getElementById("show").innerHTML = "";
		    //     return;
		    // } else {
		        var xmlhttp = new XMLHttpRequest();
		        xmlhttp.onreadystatechange = function() {
		            if (this.readyState == 4 && this.status == 200) {
		                document.getElementById("show").innerHTML = this.responseText;
		            }
		        };
		        xmlhttp.open("GET", "checkphone.php?p=" + phone, true);
		        xmlhttp.send();
		    
		}
		function checkpassword(password){
		    if (password.length >7) { 
		        document.getElementById("show").innerHTML = "ok";
		        return;
		    } else {
		        var xmlhttp = new XMLHttpRequest();
		        xmlhttp.onreadystatechange = function() {
		            if (this.readyState == 4 && this.status == 200) {
		                document.getElementById("show").innerHTML = this.responseText;
		            }
		        };
		        xmlhttp.open("GET", "checkpassword.php?pass=" + password, true);
		        xmlhttp.send();
		    }
		}
	</script>
 </body>
 </html>