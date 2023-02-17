<?php include 'inc/header_3.php';?>

<?php 
$login = Session::get("cuslogin");
if ($login == false) {
	echo '<style>.header-icons {visibility: hidden;}</style>';
    header("Location:login.php");
}
 ?>

 

 <?php 
if (isset($_GET['orderid']) && $_GET['orderid'] == 'Order') {

	
 $cmrId = Session::get("cmrId");
 $insertOrder = $ct->orderProduct($cmrId);
 $delData = $ct->delCustomerCart();
 header("Location:orderdetails.php");

 $con = mysqli_connect("localhost","root","","db_shop");
 $sql = "SELECT tbl_customer.*,tbl_order.* from tbl_customer, tbl_order where tbl_customer.id = tbl_order.cmrId ORDER BY tbl_order.id DESC LIMIT 1";
 $result = mysqli_query($con, $sql);
 if (mysqli_num_rows($result) > 0) {
	 $row = mysqli_fetch_assoc($result);
	 $to = $row['email'];
    $subject = "Order Details";

	$message = "Order ID: " . $row['id'] . "\n" .
					"Order Date: " . $row['date'] . "\n" .

                         "Customer Name: " . $row['name'] . "\n" .
                         "Email: " . $row['email'] . "\n" .
                         "Item: " . $row['productName'] . "\n" .
                         "Quantity: " . $row['quantity'] . "\n" .
                         "Total Cost: ₱" . $row['price'] . "\n";


  $headers = "From: amberspirit16@gmail.com";
   

  if (mail($to, $subject, $message, $headers)) {
	echo "<script>
	alert('Check Your Email Inbox for the details');		
</script>";
   
  } else {
    echo "Failed to send email. Please try again later.";
  }
} else {
	echo "No recent order found.";
}
}
  ?>

<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
	$paymentMethod = $_POST['paymentMethod'];
	$cmrId = Session::get("cmrId");
	$insertOrder = $ct->orderProduct($_POST,$_FILES,$paymentMethod, $cmrId);
    

	$delData = $ct->delCustomerCart();
 header("Location:orderdetails.php");
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
	<!-- modal -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

	<!-- include Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<!-- include jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- include Bootstrap JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<script src = "https://www.paypal.com/sdk/js?client-id=AcTYM_vIcI8ruRN3yyXlp2PO02Ke58qj8xxBP_LGjimI9W9TMeVdtve_LMzRyDb86lLDY11tpbTUNXRE"></script>


	
</head>
<body  onload="changeImage()">
	

	
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
						<p>Fresh and Organic</p>
						<h1>Check Out Product</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- check out section -->
	<div class="checkout-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="checkout-accordion-wrap">
						<div class="accordion" id="accordionExample">
						  <div class="card single-accordion">
						    <div class="card-header" id="headingOne">
						      <h5 class="mb-0">
						        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						          Billing Address
						        </button>
						      </h5>
						    </div>

						    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
						      <div class="card-body">
						        <div class="billing-address-form">
								<?php 
									$id = Session::get("cmrId");
									$getdata = $cmr->getCustomerData($id);
									if ($getdata) {
										while ($result = $getdata->fetch_assoc()) {
									

									?>
										<table class="tblone">
											<tr>
												<td colspan="3"><h2>Your Profile Details</h2></td>
											</tr>
											<tr>
												<td width="20%">Name</td>
												<td width="5%">:</td>
												<td><?php echo $result['name'];?></td>
											</tr>
											<tr>
												<td>Phone</td>
												<td>:</td>
												<td><?php echo $result['phone'];?></td>
											</tr>
											<tr>
												<td>Email</td>
												<td>:</td>
												<td><?php echo $result['email'];?></td>
											</tr>
											<tr>
												<td>Address</td>
												<td>:</td>
												<td><?php echo $result['address'];?></td>
											</tr>
											<tr>
												<td>City</td>
												<td>:</td>
												<td><?php echo $result['city'];?></td>
											</tr>
											<tr>
												<td>Zipcode</td>
												<td>:</td>
												<td><?php echo $result['zip'];?></td>
											</tr>
											<tr>
												<td>Country</td>
												<td>:</td>
												<td><?php echo $result['country'];?></td>
											</tr>

											<tr>
												<td></td>
												<td></td>
												<td><a href="edit_profile_payment.php">Update Details</a></td>
											</tr>

										</table>
									<?php }} ?>
						        </div>
						      </div>
						    </div>
						  </div>
						  
						  <div class="card single-accordion">
						    <div class="card-header" id="headingThree">
						      <h5 class="mb-0">
						        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" >
						         Payment method
						        </button>
						      </h5>
						    </div>
						    <div id="collapseThree" class="collapse in" aria-labelledby="headingThree" data-parent="#accordionExample">
						      <div class="card-body">
						        <div class="card-details">

						        <div style="display: flex;">
  <div style="flex: 1;">
    <img id="image" src="assets/img/COD.png" alt="Image" style="max-width: 100%;">
  </div>
  <div style="flex: 1;">
    <select id="imageSelector" onchange="changeImage()" name="paymentMethod" style= "background-color: white;
  font-weight: bold; margin-top:30px; height:40px; width:300px;">
  	
      <option value="Cash on Delivery">Cash on Delivery</option>
      <option value="Gcash">Gcash </option>
    </select>
  </div>
</div>

<script>
// JavaScript code
function changeImage() {
  var selector = document.getElementById("imageSelector");
  var selectedValue = selector.value;
  var image = document.getElementById("image");
  var button = document.getElementById("uploadButton");

  switch(selectedValue) {
    case "Cash on Delivery":
      image.src = "assets/img/COD.png";
	  button.style.display = "none";
      break;
    case "Gcash":
      image.src = "assets/img/gcash.png";
	  button.style.display = "block";
      break;
    default:
      image.src = "assets/img/COD.png";
	  button.style.display = "none";
      break;
  }
}
changeImage();
</script>
									<!-- button to trigger the modal -->
	<button id="uploadButton" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Pay and upload proof of payment</button>

<!-- modal window -->
<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">
		<!-- modal content -->
		<div class="modal-content">
			<!-- modal header -->
			<div class="modal-header">
				<h4 class="modal-title">Upload your proof of payment</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<!-- modal body -->
			<div class="modal-body">
				<!-- image at the top of the modal -->
				<img src="assets/img/gcash-scan.jpg" alt="Image" style="width:100%;">
				
				<?php
        if (isset($uploadPayment)) {
            echo $uploadPayment;
        }

        ?>    
				<!-- form to upload image -->
				<form method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="file">Upload your proof of payment after scanning here:</label>
						 <input type="hidden" name="paymentMethod" value="Gcash">
						<input type="file" class="form-control" id="file" name="proofOfPayment">
					</div>
					<button type="submit" name = "submit" value ="Save"class="btn btn-primary">Upload</button>
				</form>
			</div>
			<!-- modal footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>


						        </div>
						      </div>
						    </div>
						  </div>
						</div>

					</div>
				</div>

				<div class="col-lg-4">
					<div class="order-details-wrap">
						<table class="order-details">
							
							<thead>
								<tr>
									<th>Your order Details</th>
									<th>Price</th>
									<th>Quantity</th>
								</tr>
							</thead>
							<tbody class="order-details-body">
								<tr>
									<td>Product</td>
									<td>Total</td>
									<td> </td>
								</tr>

								<tr>
									<?php 

										$getPro = $ct->getCartProduct();
										if ($getPro) {
											$i = 0;
											$sum = 0;
											$qty = 0;
											while ($result = $getPro->fetch_assoc()) {
											
											$i++;

										?>
											<td><?php echo $result['productName']; ?></td>
											<td>₱ <?php echo $result['price']; ?></td>
											<td><?php echo $result['quantity']; ?></td>
											
										</tr>
										
										<?php
												$total = $result['price'] * $result['quantity'];
												?>
										<?php 
										$qty = $qty + $result['quantity'];
										$sum = $sum + $total;
										?>


									<?php } } ?>    
								</tr>
							</tbody>
							<tbody class="checkout-details">
								<tr>
									<td>Subtotal</td>
									<td>₱ <?php echo $sum; ?></td>
								</tr>
								<tr>
									<td>VAT: Shipping</td>
									<td>10%(₱<?php echo $vat = $sum * 0.1; ?>)</td>
								</tr>
								<tr>
									<td>Total</td>
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
					
						<a href="?orderid=Order" class="boxed-btn">Place Order</a>
		
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end check out section -->

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

