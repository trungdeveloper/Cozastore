<?php 
	include("connect.php");
	$id = $_GET["id"];
	error_reporting(2);
	$sql="select * from products where id =".$id;
	$result=mysqli_query($conn,$sql);

 ?>
 
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 	<!-- Latest compiled and minified CSS & JS -->
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
 	<script src="//code.jquery.com/jquery.js"></script>
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
 </head>
 <body>
	<?php 
	include("header.php");
 ?>
 	<main class="mdl-layout__content mdl-color--grey-100">
      <div class="mdl-grid demo-content">
 	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
 		<?php 
 			$row = mysqli_fetch_array($result);
 		 ?>
		<form action="" method="POST" class="form-horizontal" role="form">
				<div class="form-group">
					<legend>update</legend>
				</div>

				<div class="form-group">
					<label>name</label>
					<div >
						<input type="text" name="name" value="<?php echo $row['name']; ?>" placeholder="">
					</div>
				</div>
				<div class="form-group">
					<label>price</label>
					<div >
						<input type="number" name="price" value="<?php echo $row['price']; ?>" placeholder="">
					</div>
				</div>
				<div class="form-group">
					<label>old_price</label>
					<div>
						<input type="number" name="old_price" value="<?php echo $row['old_price']; ?>" placeholder="">
					</div>
				</div>
				<div class="form-group">
					<label>quantity</label>
					<div >
						<input type="number" name="quantity" value="<?php echo $row['quantity']; ?>" placeholder="">
					</div>
				</div>
				<div class="form-group">
					<label>description</label>
					<div >
						<input type="text" name="description" value="<?php echo $row['description']; ?>" placeholder="">
					</div>
				</div>
				<div class="form-group">
					<label>img</label>
					<div>
						
						<input type="file" name="img" value="<?php echo'./images/'. $row['img']; ?>" placeholder="">
					</div>
				</div>
				<div class="form-group">
					<label> category </label>
					<div >
                        
                        <select class="form-control" name="category_id">
                        <?php
                            $sql = "SELECT * FROM categories";
                            $result = mysqli_query($conn,$sql);
                            if($result)
                            {
                                while($row = mysqli_fetch_assoc($result))
                                {
                        ?>
                                    <option class="col-sm-10 col-sm-offset-2" value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>   
                        <?php
                                }
                            }
                       ?>
                        </select>
                        </div>
                </div>

				<div class="form-group">
					<div>
						<button type="submit" class="btn btn-primary">update</button>
					</div>
				</div>
		</form>
		<?php 
			$name=$_POST['name'];
			$price=$_POST['price'];
			$quantity=$_POST['quantity'];
			$category_id=$_POST['category_id'];
			$old_price=$_POST['old_price'];
			$description=$_POST['description'];
			$img=$_POST['img'];
			$sql1="update products set name='".$name."', price=".$price.",old_price=".$old_price.",quantity=".$quantity.",description='".$description."',category_id=".$category_id.",img='".$img."' where id=".$id;
			
			$result1=mysqli_query($conn,$sql1);
			if ($result1) {
				header("Location: http://localhost/cozastore/admin/product.php");
			}else{
				echo $description;
			}

		 ?>
	</div>
	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
		
	</div>
</div>
</main>
 </body>
 </html>