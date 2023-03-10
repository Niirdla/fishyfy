<?php include 'inc/header_3.php';?>


<?php 
$login = Session::get("cuslogin");
if ($login == false) {
	echo '<style>.sign-out {visibility: hidden;}</style>';
    header("Location:login.php");
}
 ?>


<?php 
if (isset($_GET['productId'])) {
    $id = $_GET['productId'];
    $confirm = $ct->productShiftConfirm($id);

}

if (isset($_GET['delproid'])) {
	$id = $_GET['delproid'];
	$delOrder = $ct->delProductShifted($id);

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
	<title>Check Out</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="assets/img/aacbluelogo.png">
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

	<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">



	<style>
		.nav-link.active {
  background-color: #EFF2F8;
  color: black;
  font-weight:bold;
}

.nav-link.active,
.nav-link.active > * {
  color: black !important;
}
		</style>

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
								<img src="assets/img/aacbluelogo.png" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
							<li class="current-list-item"><a href="index.php">Home</a>
								</li>
								<li><a href="about.php">About</a></li>
								
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
						<form action="search_order.php" method="get">
				    		<input type="text" value="Search for Order ID, Product Name." name="search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search for Order ID, Product Name.';}">
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
	<div class="hero-area hero-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 offset-lg-2 text-center">
					<div class="hero-text">
						<div class="hero-text-tablecell">
							<h1 style = "font-size: 90px; color: white; font-family: calibri;">Order details</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->


<div class="checkout-section mt-150 mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
			
			
			<table  class="cart-table" style="width: 155%;">
				<thead class="cart-table-head">
				
                            <tr class="table-head-row">
                                <th ><a class="nav-link" style = "color:white;" href="?status=5">All Orders</a></th>
                                <th><a class="nav-link" style = "color:white;" href="?status=0">To pay</a></th>
								<th><a class="nav-link" style = "color:white;" href="?status=1">To ship</a></th>
                                <th><a class="nav-link" style = "color:white;" href="?status=2">To receive</a></th>
                                <th><a class="nav-link" style = "color:white;" href="?status=3">Received</a></th>
                            </tr>
                </thead>
</table>



    	
<div class="container">
            <table id="order-table" class="cart-table" style = "width: 155%;">
				<thead class="cart-table-head">
				<tr class="table-head-row">
                            <th colspan="9">
                                <h2 style="text-align: center; color:white;">Order details</h2>
                            </th>
                        </tr>
                            <tr class="table-head-row">
                                <th>Order no.</th>
                                
                                <th>Image</th>
								<th>Product Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Date</th>
								<th>Payment Method</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                </thead>
                <tbody>
                        <tr class="table-body-row">

                            <?php 
							$status = isset($_GET['status']) ? $_GET['status'] : '';
                            $cmrId = Session::get("cmrId");
                            $getOrder = $ct->getOrderedProduct($cmrId, $status);
                            if ($getOrder) {
                               
                                while ($result = $getOrder->fetch_assoc()) {
                                
                           

                             ?>
                                <td><?php echo $result['id'];;?></td>
								<td class="product-image"><img src="admin/<?php echo $result['image']; ?>" alt="" style= "    width: 90%;
    height: 100%;
	max-width:250px;
    position: relative;
    top: 50%;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);"/></td>
                                <td><?php echo $result['productName']; ?></td>
                                
                                <td><?php echo $result['quantity']; ?></td>
                    
                                <td>₱ <?php echo $result['price'];?></td>
                         <td><?php echo $fm->formatDate($result['date']); ?></td>
						 <td><?php echo $result['paymentMethod']; ?></td>
                         <td><?php

                         if ($result['status'] == '0') {
                             echo "To pay";
                         }elseif($result['status'] == '1'){
                            echo "To ship";
                       }elseif($result['status'] == '2'){
						echo "To receive";
				   	}elseif($result['status'] == '3'){
						echo "Order received";
				   } else{ 
                            echo "All orders";
                         }


           ?></td>
    

                
                    <?php 
                    if ($result['status'] == '2') { ?>
                     <td> <a href="?productId=<?php echo $result['id']; ?>">Confirm order</a></td>
                   <?php } elseif($result['status'] == '3'){?>
                    <td></td>

                  <?php }elseif ($result['status'] == '0') {?>
                      <td><a href="?delproid=<?php echo $result['id']; ?>">Cancel Order</a></td>
                 <?php  }  ?>
                   
            </tr>
                            


                        <?php } } ?>    
                  </tbody>
                </table>
                </div>
				  </div>
    	</div>
    </div>
 </div>
           

   <!-- logo carousel -->
	<div class="logo-carousel-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="logo-carousel-inner">
						<div class="single-logo-item">
							<img src="assets/img/aacbluelogo.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/aacbluelogo.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/aacbluelogo.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/aacbluelogo.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/aacbluelogo.png" alt="">
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
<!-- jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- DataTables JS -->
<script type="text/javascript" src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
</body>
</php>
<script>
// Get all anchor elements with class "nav-link"
const navLinks = document.querySelectorAll('.nav-link');

// Add click event listener to each anchor element
navLinks.forEach(function(navLink) {
  navLink.addEventListener('click', function(event) {
    // Add "active" class to clicked anchor element
    this.classList.add('active');

    // Store the clicked link's href value in localStorage
    localStorage.setItem('activeLink', this.getAttribute('href'));
  });
});

// Check for an active link on page load
const activeLink = localStorage.getItem('activeLink');
if (activeLink) {
  // Find the link with the stored href value and add the "active" class
  const activeNavLink = document.querySelector(`.nav-link[href="${activeLink}"]`);
  if (activeNavLink) {
    activeNavLink.classList.add('active');
  }
}
	</script>

<script>
$(document).ready(function() {
  $('#order-table').DataTable({
    "paging": true, // enable pagination
    "pageLength": 10, // number of rows per page
    "lengthChange": true, // enable length change dropdown
    "searching": true, // enable search box
    "ordering": true, // enable column sorting
    "info": true // enable showing current page info
  });
});
</script>