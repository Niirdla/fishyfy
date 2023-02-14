<?php include 'inc/header_3.php';?>

<?php 
$login = Session::get("cuslogin");
if ($login == false) {

	echo '<style>.sign-out {visibility: hidden;}</style>';

	
}
 ?>



<?php
if (isset($_GET['proid'])) {
   

    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['proid']);
}



if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $quantity = $_POST['quantity'];
    $addCart = $ct->addToCart($quantity,$id,$cmrId);
	
}
?>


<style>
	.mybutton{width: 100px;float: left;margin-right: 50px;}

</style>
<style>


  .images {
	float: left;
  width: 33.33%;
  padding: 5px;

  }
  .image-row::after {
  content: "";
  clear: both;
  display: table;
  
}
  

  .images img {
	width: 150px;
    height: 150px;
    background-color: black;





  }

  
  .images p {
	display: block;
	background-color: black;
	color:white;
	font-size: large;

}

</style>


<!DOCTYPE php>
<php lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">
	<script src="https://unpkg.com/js-image-zoom@0.7.0/js-image-zoom.js" type="application/javascript"></script>

	<!-- title -->
	<title>Single Product</title>

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
								<li><a href="news.php">News</a></li>
								
								<li><a href="catalogue.php">Catalogue</a></li>
								
								<li><a href="contacts.php">Contact</a></li>
								<li><a href="shop.php">Shop</a></li>
								<li>
									<div class="header-icons">
										<a class="shopping-cart" href="cart.php"><i class="fas fa-shopping-cart"></i></a>
										<a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>
										<a class="user-profile" href="profile.php"><i class='far fa-user-circle' style='font-size:1.7rem'></i></a>
										<ul class="sub-menu">
											<li><a href="profile.php">My Account</a></li>
											<li><a href="orderdetails.php">My Orders</a></li>
										</ul>
										<a class="sign-out" href="?cid=<?php Session::get('cmrId') ?>"><i class='fas fa-sign-out-alt' style='font-size:1.7rem;color:white'></i></a>
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
						<p>See more Details</p>
						<h1>Single Product</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- single product -->
	<div class="single-product mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-md-5">	

					<?php 
					$getPd = $pd->getSingleCatalogue($id);
					if ($getPd) {
						while ($result = $getPd->fetch_assoc()) {
							


					?>			
						<div class="single-catalogue-img" id= "img-container" style = "width: 1200px">
							<img src="admin/<?php echo $result['images']; ?>" alt="" />
							
							<h2><?php echo $result['fishName']; ?> </h2>
  						
							<div class="image-row">
						<div class="images">
						
						
							<img src="images/family.png" alt="Image 1">
							<p><?php echo $result['family']; ?></p>
						</div>
						<div class="images">		
  							<img src="images/care.png" alt="Image 2">
							  <p><?php echo $result['care']; ?></p>
						</div>
						<div class="images">	
  							<img src="images/lifespan.png" alt="Image 3">
							  <p><?php echo $result['life']; ?></p>
					  
						</div>	
						<div class="images">
							<img src="images/diet.png" alt="Image 4">
							<p><?php echo $result['diet']; ?></p>
						</div>
						<div class="images">	
  							<img src="images/breed.png" alt="Image 5">
							<p><?php echo $result['breed']; ?></p>
						</div>
						<div class="images">
  							<img src="images/tank.png" alt="Image 6">
							  <p><?php echo $result['tank']; ?></p>
						</div>
						</div>
					<p><h3>Fish Description:</h3><?php echo $result['Description']; ?></p>
						</div>
					</div>
					
				
				<div class="col-md-7">
					<div class="single-product-content">
						
					<div class="single-product-pricing">

						
							
						
						</div>
						

						<div class="single-product-form">
							<form action="" method= "post">
							
							</form>
							
						</div>


						<span style="color: red;font-size: 18px;">
					<?php 

					if (isset($addCart)) {
						echo $addCart;
					}
					 ?>

					 <?php 

					if (isset($insertCom)) {
						echo $insertCom;
					}


					if (isset($saveWlist)) {
						echo $saveWlist;
					}
					 ?>
				</span>

				
			</div>
			
			<?php } } ?>	
	</div>
						<h4>Share:</h4>
						<ul class="product-share">
							<li><a href=""><i class="fab fa-facebook-f"></i></a></li>
							<li><a href=""><i class="fab fa-twitter"></i></a></li>
							<li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
							<li><a href=""><i class="fab fa-linkedin"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end single product -->

	
	<<!-- logo carousel -->
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
					<script>

					var options1 = {
    				width: 250,
    				zoomWidth: 500,
    				offset: {vertical: 0, horizontal: 10},
					scale:1.5
					};

					// If the width and height of the image are not known or to adjust the image to the container of it
					var options2 = {
    				fillContainer: true,
    				offset: {vertical: 0, horizontal: 10}
					};

					new ImageZoom(document.getElementById("img-container"), options2);

					</script>

