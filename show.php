<!-- Latest compiled and minified CSS & JS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<script src="//code.jquery.com/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/util.css">

<!-- <div class="row isotope-grid"> -->

				<?php
					session_start();
					require("admin/connect.php");
					
					$value=$_SESSION['search'];
					$id=$_GET['id'];
					switch ($id) {
						case '1':
							$sql = "SELECT pro.id, pro.name, pro.img, pro.price,categories.name as cate FROM products as pro, categories WHERE pro.category_id = categories.id and pro.price<50 and pro.name like '%".$value."%'";
							break;
						case '2':
							$sql = "SELECT pro.id, pro.name, pro.img, pro.price, categories.name as cate FROM products as pro, categories WHERE pro.category_id = categories.id and pro.price<100 and pro.price>50";
							break;
						case '3':
							$sql = "SELECT pro.id, pro.name, pro.img, pro.price, categories.name as cate FROM products as pro, categories WHERE pro.category_id = categories.id and pro.price<150 AND pro.price>100";
							break;
						case '4':
							$sql = "SELECT pro.id, pro.name, pro.img, pro.price, categories.name as cate FROM products as pro, categories WHERE pro.category_id = categories.id and pro.price<200 AND pro.price>150";
							break;
						case '5':
							$sql = "SELECT pro.id, pro.name, pro.img, pro.price, categories.name as cate FROM products as pro, categories WHERE pro.category_id = categories.id and pro.price>200";
							break;
						case '6':
							$sql = "SELECT pro.id, pro.name, pro.img, pro.price, categories.name as cate FROM products as pro, categories WHERE pro.category_id = categories.id ORDER BY pro.price ASC";
							break;
						case '7':
							$sql = "SELECT pro.id, pro.name, pro.img, pro.price, categories.name as cate FROM products as pro, categories WHERE pro.category_id = categories.id ORDER BY pro.price DESC";
							break;
						
						default:
							$sql = "SELECT pro.id, pro.name, pro.img, pro.price, categories.name as cate FROM products as pro, categories WHERE pro.category_id = categories.id ";
							break;
					}
					$result = $conn->query($sql);
		            if ($result->num_rows > 0) {
		                // output data of each row
		            while($row = $result->fetch_assoc()) {
				 ?>

				<div id="filter<?php echo $row['id']?>" class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item Bag <?php echo $row['cate'] ?>">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img style="height:334.34px; width:270px" src="images/<?php echo $row['img'] ?>" alt="IMG-PRODUCT">

							<button class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" onclick="showModal(<?php echo $row['id']?>)">
								Quick View
							</button>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="product-detail.php?id=<?php echo $row['id'] ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									<?php echo $row['name'] ?>
								</a>
								
								<span class="stext-105 cl3">
									$<?php echo $row['price'] ?>.00
								</span>
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
								<button id="<?php echo $row['id']?>" onclick="addWish(<?php echo $row['id']?>,'<?php echo $row['name']?>')" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
									<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
								</button>
							</div>
						</div>
					</div>
				</div>
			<?php }} mysqli_close($conn); ?>

	<!-- </div> -->
		
<script type="text/javascript">
	
	
	function getsql(id){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("show").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "show.php?id=" + id, true);
        xmlhttp.send();
	   }
	function addWish(id, s){
		var a = new Array();
		if (localStorage.getItem("wishList") == null) {
			a.push(id);
			localStorage.setItem("wishList", JSON.stringify(a));
		}else{
			a = JSON.parse(localStorage.getItem("wishList"));
			var ok = 1;
			for (var i = 0; i < a.length; i++) {
				if (a[i] == id) {
					a.splice(i);
					ok = 0;
					swal(s, "is removed from wishlist !", "success");
					document.getElementById(id).className = "btn-addwish-b2 dis-block pos-relative js-addwish-b2";
					break;
				}else{
					ok = 1;
				}
			}
			if (ok == 1) {
				a.push(id);
			}
			localStorage.setItem("wishList", JSON.stringify(a));
		}
		
		// var number = document.getElementById("wishList").getAttribute('data-notify');
		// document.getElementById("wishList").setAttribute('data-notify',a.length);
		// document.getElementById("wishLish").
		a = JSON.parse(localStorage.getItem("wishList"));
		document.getElementById("wishList").setAttribute('data-notify',a.length);
	}
	a = JSON.parse(localStorage.getItem("wishList"));
	for (var i = 0; i < a.length; i++) {
		document.getElementById(a[i]).className = "btn-addwish-b2 dis-block pos-relative js-addwish-b2 js-addedwish-b2";
	}
	document.getElementById("wishList").setAttribute('data-notify',a.length);
</script>
	