<?php 
	error_reporting(2);
	include("./admin/connect.php");
	session_start();
 ?>
  	
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
	<div class="container" style="margin-top:40px">
		<div class="row">
			<div class="col-sm-6 col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong> Sign in to continue</strong>
					</div>
					<div class="panel-body">
						<form role="form" action="" method="POST">
							<fieldset>
								<div class="row">
									<div class="center-block">
										<img class="profile-img"
											src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120" alt="">
									</div>
								</div>

								<div class="row">
									<div class="col-sm-12 col-md-10  col-md-offset-1 ">
										<div>
											<p id="show" style="color: red; text-align: center;"></p>
										</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-user"></i>
												</span> 

												<!-- user name -->
												<input class="form-control" id="name" placeholder="Username" name="name" type="text" autofocus required="yes">
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-lock"></i>
												</span>
												<!-- password -->
												<input class="form-control" placeholder="password" id="password" name="password" type="password" value="" required="yes">
											</div>
										</div>
										<div class="form-group">
											<input type="submit" class="btn btn-lg btn-primary btn-block" value="Sign in">
										</div>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
					<div class="panel-footer ">
						Don't have an account! <a href="signup.php" onClick=""> Sign Up Here </a>
					</div>
                </div>
                	<?php 
					
						$name=$_POST["name"];
						$password=$_POST["password"];
						$sql = "SELECT * FROM users WHERE user_name = '".$name."' AND password = '".$password."'" ;
						$result = mysqli_query($conn,$sql);
						$count=mysqli_num_rows($result);

						if ($count==1) {
							$sql = "UPDATE `users` SET `is_active` = '1' WHERE `users`.`user_name` = '".$name."'";
								$result = mysqli_query($conn,$sql);
							$_SESSION['login_user']=$name;
							if ($name=="admin") {
								
								header("Location: admin/product.php");
							}else{
								header("Location: product.php");
								// echo "hello ".$name;

							}
							
						} else {
							
							?>

								<script type="text/javascript">
									document.getElementById("show").innerHTML="name or password is not incorrect";
								</script>
							<?php 
						}

	 				?>
			</div>
			<script  type="text/javascript" charset="utf-8" async defer>
				var name=document.getElementById("name").value;
				var password=document.getElementById("password").value;

			</script>
		</div>
	</div>


	<style type="text/css">
		.panel-heading {
		    padding: 5px 15px;
		}

		.panel-footer {
			padding: 1px 15px;
			color: #A0A0A0;
		}

		.profile-img {
			width: 96px;
			height: 96px;
			margin: 0 auto 10px;
			display: block;
			-moz-border-radius: 50%;
			-webkit-border-radius: 50%;
			border-radius: 50%;
		}
	</style>

</body>
</html>



<!------ Include the above in your HEAD tag ---------->

    