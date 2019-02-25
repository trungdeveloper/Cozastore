<?php 
	require("permission.php");
	include("header.php");
	include("connect.php");
	error_reporting(2);
 ?>
 <style type="text/css">
	table tr td {
	    border-bottom: 2px solid #ccc;
	    padding-left: 12px;
	    padding-right: 12px;
	}
	th {
		padding-left: 35px;
	}
	td{
		text-align: center;
	}
	.icon{
		color: red;
	}
</style>
 <main class="mdl-layout__content mdl-color--grey-100">
    <div class="mdl-grid demo-content">
 	<div class="row">

 		<div class="col-md-11">
 			<?php 
				$sql="select * from products";
				$result = mysqli_query($conn,$sql);
		?>
		<table>
	    <thead>
	        <tr>
	            <!-- <th>ID</th> -->
	            <th>name</th>
	            <th>price</th>
	            <th>old_price</th>
	            <th>quantity</th>
	            <th>description</th>
	            <th>img</th>
	            <th>#</th>
	        </tr>
	    </thead>
	    <tbody>
	        <?php 
	        	while ($row = mysqli_fetch_array($result)): ?>
	            <tr>
	                <td><?php echo $row['name']; ?></td>
	                <td><?php echo $row['price']; ?></td>
	                <td><?php echo $row['old_price']; ?></td>
	                <td><?php echo $row['quantity'];  ?></td>  
	                <td><?php echo $row['description']; ?></td>  
	                <td><img class="img-thumbnail" src="<?php echo '../images/' .$row['img']; ?>" alt="" height="200" width="200"></td>
	                <td>

	                	<a class="mdl-navigation__link" title="edit" href="update_product.php?id=<?php echo $row['id'] ?>"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">assignment</i>edit</a>

	                	<a class="mdl-navigation__link" title="delete" href="delete_product.php?id=<?php echo $row['id'] ?>"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">delete</i>delete</a>

	                	
	                </td>
	            </tr>
	        <?php 
	    		endwhile; 
	    	?>
	    </tbody>
	</table>
		
		
 		</div>
 	</div>
 </div>
</main>