<?php include 'inc/header_3.php';?>

<?php 


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$cartId = $_POST['cartId'];
	$quantity = $_POST['quantity'];

		$updateCart = $ct->updateCartQuantity($cartId,$quantity);

    if ($quantity <=0) {
    	$delProduct = $ct->delProductByCart($cartId);
    }
	
}

 ?>

 
<?php 
$login = Session::get("cuslogin");
if ($login == false) {
    header("Location:login.php");
}
 ?>

<?php 
if (isset($_GET['delpro'])) {
	$delId = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delpro']);
	$delProduct = $ct->delProductByCart($delId,$quantity);
}
 ?>
 <?php  
if (!isset($_GET['id'])) {
	echo "<meta http-equiv = 'refresh' content ='0;URL=?id=nayem' />";
}
 ?>

<!DOCTYPE php>
<php lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>Cart</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="assets/css/responsive.css">

</head>
<body>
	
	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="index.php">
								<img src="assets/img/aacaquaticslogo.png" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li class="current-list-item"><a href="#">Home</a>
									<ul class="sub-menu">
										<li><a href="index.php">Static Home</a></li>
										<li style = "text-align: center;"><a href="index_2.php">Slider Home</a></li>
									</ul>
								</li>
								<li><a href="about.php">About</a></li>
								<li><a href="catalogue.php">Catalogue</a>
									<ul class="sub-menu">
										<li><a href="news.php">News</a></li>
										<li style = "text-align: center;"><a href="single-news.php">Single News</a></li>
									</ul>
								</li>
								<li><a href="contacts.php">Contact</a></li>
								<li><a href="shop.php">Shop</a>
									<ul class="sub-menu">
										<li><a href="shop.php">Shop</a></li>
										<li><a href="checkout.php">Check Out</a></li>
										<li><a href="single-product.php">Single Product</a></li>
										<li style = "text-align: center;"><a href="cart.php">Cart</a></li>
									</ul>
								</li>
								<li>
									<div class="header-icons">
										<a class="shopping-cart" href="cart.php"><i class="fas fa-shopping-cart"></i></a>
										<a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>
										<a class="user-profile" href="profile.php"><i class='far fa-user-circle' style='font-size:18px'></i></a>
										<ul class="sub-menu">
											<li><a href="profile.php">My Account</a></li>
											<li><a href="orderdetails.php">My Orders</a></li>
										</ul>
										
										<a class="sign-out" href="?cid=<?php Session::get('cmrId') ?>"><i class='fas fa-sign-out-alt' style='font-size:18px;color:white'></i></a>
										
									</div>
								</li>

						
								
								
							</ul>
						</nav>
						<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->		   
<!-- search area -->
<div class="search-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<span class="close-btn"><i class="fas fa-window-close"></i></span>
					<div class="search-bar">
						<div class="search-bar-tablecell">
						<h3>Search For:</h3>
						<form action="search.php" method="get">
				    		<input type="text" value="Search for Products" name="search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search for products';}">
							<button type="submit" name="submit" value="SEARCH">Search <i class="fas fa-search"></i></button>
				    	</form>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end search arewa -->

	
	
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
					
						<h1>Cart</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- cart -->
	
	<div class="cart-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
						<div class="cart-table-wrap">
						<?php 
						if (isset($updateCart)) {
							echo $updateCart;
						}

						if (isset($delProduct)) {
							echo $delProduct;
						}
						?>
							<table class="cart-table">
								<thead class="cart-table-head">
									<tr class="table-head-row">
										<th class ="product-price">SL</th>
										<th class="product-image">Product Image</th>
										<th class="product-name">Name</th>
										<th class="product-price">Price</th>
										<th class="product-quantity">Quantity</th>
										<th class="product-total">Total Price</th>
										<th class="product-remove"></th>
									</tr>
								</thead>

								<?php 

								$getPro = $ct->getCartProduct();
								if ($getPro) {
									$i = 0;
									$sum = 0;
									$qty = 0;
									while ($result = $getPro->fetch_assoc()) {
									
									$i++;

								?>

								<tbody>
									<tr class="table-body-row">
										<td><?php echo $i;?></td>
										<td class="product-image"><img src="admin/<?php echo $result['image']; ?>" alt=""/></td>
										<td class="product-name"><?php echo $result['productName']; ?></td>
										<td class="product-price">₱ <?php echo $result['price']; ?></td>
										<td class="product-quantity">
											<form action="" method="post">
													<input class = "buyfield"type = "number" style ="display:none;" name="stocks" value = "<?php echo $result['stocks']; ?>"/> 
													<input type="hidden" name="cartId" value="<?php echo $result['cartId']; ?>" />
													<input type="number" name="quantity" max = <?php echo $result['stocks']; ?> min =1 value="<?php echo $result['quantity']; ?>" onchange="this.form.submit()"/>	
													
											</form>
										</td>

										<td class="product-total">₱ 
											<?php
											$total = $result['price'] * $result['quantity'];
											echo $total;
										?></td>
										<td class="product-remove"><a onclick="return confirm('Are you Sure to Delete!')" href="?delpro=<?php echo $result['cartId']; ?>"> <i class="far fa-window-close"></i></a></td>
										<?php 
											$qty = $qty + $result['quantity'];
											$sum = $sum + $total;
											Session::set("qty",$qty);
											Session::set("sum",$sum);
											?>


										<?php } } ?>	
									
									</tr>
		
								</tbody>
							</table>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="total-section">
					<?php
						$getData = $ct->checkCartTable();
							if ($getData){

								?>
						<table class="total-table">
							<thead class="total-table-head">
								<tr class="table-total-row">
									<th>Total</th>
									<th>Price</th>
								</tr>
							</thead>
							<tbody>
								<tr class="total-data">
									<td><strong>Subtotal: </strong></td>
									<td >₱ <?php echo $sum; ?></td>
								</tr>
								<tr class="total-data">
									<td><strong>VAT :Shipping: </strong></td>
									<td>10%</td>
								</tr>
								<tr class="total-data">
									<td><strong>Grand Total : </strong></td>
									<td>₱
										<?php 
										$vat = $sum * 0.1;
										$gtotal = $sum + $vat;
										echo $gtotal;
										?>
									</td>
								</tr>
							</tbody>
						</table>

						<?php }else{
						
						echo "Cart Empty ! Please Shop Now...";
						
					} ?>

						<div class="cart-buttons">	
						<form action="" method="post">
							<a href="payment.php" class="boxed-btn">Check Out</a>
						</form>
						</div>
					</div>
					

					<div class="coupon-section">
						<h3>Apply Coupon</h3>
						<div class="coupon-form-wrap">
							<form action="index.php">
								<p><input type="text" placeholder="Coupon"></p>
								<p><input type="submit" value="Apply"></p>
							</form>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- end cart -->

	<!-- logo carousel -->
	<div class="logo-carousel-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="logo-carousel-inner">
						<div class="single-logo-item">
							<img src="assets/img/aacaquaticslogo.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/aacaquaticslogo.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/aacaquaticslogo.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/aacaquaticslogo.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/aacaquaticslogo.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end logo carousel -->

	<!-- footer -->
	<div class="footer-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="footer-box about-widget">
						<h2 class="widget-title">About us</h2>
						<p>Ut enim ad minim veniam perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box get-in-touch">
						<h2 class="widget-title">Get in Touch</h2>
						<ul>
							<li>280 Gov Fortunato Halili Ave, Santa Maria, Bulacan</li>
							<li>support@fishyfy.com</li>
							<li>+63 90 0000 0000</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box pages">
						<h2 class="widget-title">Pages</h2>
						<ul>
							<li><a href="index.php">Home</a></li>
							<li><a href="about.php">About</a></li>
							<li><a href="services.php">Shop</a></li>
							<li><a href="news.php">News</a></li>
							<li><a href="contact.php">Contact</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box subscribe">
						<h2 class="widget-title">Subscribe</h2>
						<p>Subscribe to our mailing list to get the latest updates.</p>
						<form action="index.php">
							<input type="email" placeholder="Email">
							<button type="submit"><i class="fas fa-paper-plane"></i></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end footer -->
	
	<!-- copyright -->
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<p>Copyrights &copy; 2022 - <a href="https://www.facebook.com/lorenzbrad">Lorenz Angeles</a>,  All Rights Reserved.</p>
				</div>
				<div class="col-lg-6 text-right col-md-12">
					<div class="social-icons">
						<ul>
							<li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end copyright -->
	
	<!-- jquery -->
	<script src="assets/js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap -->
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- count down -->
	<script src="assets/js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<script src="assets/js/waypoints.js"></script>
	<!-- owl carousel -->
	<script src="assets/js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
	<script src="assets/js/jquery.magnific-popup.min.js"></script>
	<!-- mean menu -->
	<script src="assets/js/jquery.meanmenu.min.js"></script>
	<!-- sticker js -->
	<script src="assets/js/sticker.js"></script>
	<!-- main js -->
	<script src="assets/js/main.js"></script>

</body>
</php>