<?php include 'inc/header_3.php';?>

<!DOCTYPE php>
<php lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>News</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="assets/img/aacaquaticslogo.png">
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
	<!-- Add icon library -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
								<li><a href="#">Pages</a>
									<ul class="sub-menu">
										<li><a href="about.php">About</a></li>
										<li><a href="cart.php">Cart</a></li>
										<li><a href="payment.php">Check Out</a></li>
										<li><a href="contacts.php">Contact</a></li>
										<li><a href="news.php">News</a></li>
										<li style = "text-align: center;"><a href="shop.php">Shop</a></li>
                    
									</ul>
								</li>
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
						<p>Organic Information</p>
						<h1>News Article</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- latest news -->
	<div class="latest-news mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-6">
					<div class="single-latest-news">
						<a href="single-news.php"><img src = "images/bfar.png"/></a>
						<div class="news-text-box">
							<h3><a href="single-news.php">BFAR exec cites potential of PH ornamental fish trade industry</a></h3>
							<p class="blog-meta">
								<span class="author"><i class="fas fa-user"></i> Admin</span>
								<span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
							</p>
							<p class="excerpt">MANILA – The Department of Agriculture-Bureau of Fisheries and Aquatic Resources (DA-BFAR) on Wednesday said it aims to increase the country’s competency in the global ornamental fish trade.

During the first ornamental fish summit of the National Fisheries Research and Development Institute (NFRDI), DA-BFAR officer-in-charge Demosthenes Escoto said the ornamental fish trade offers a wide opportunity for livelihood of Filipino fishers.</p>
							<a href="single-news.php" class="read-more-btn">read more <i class="fas fa-angle-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="single-latest-news">
						<a href="single-news.php"><img src = "images/ornamental.jpg"/></a>
						<div class="news-text-box">
							<h3><a href="single-news.php">Take the Plunge, Start Your Ornamental Fish Farming Business</a></h3>
							<p class="blog-meta">
								<span class="author"><i class="fas fa-user"></i> Admin</span>
								<span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
							</p>
							<p class="excerpt">Ornamental (aquarium) fish farming business can be a self-rewarding and profitable venture for fishkeeping enthusiasts, hobbyists, and most likely, local fish farmers. An art and science, fishkeeping, accordingly, is the world’s most popular hobby after photography, no wonder many have already been engaged in even a small-scale home-based aquarium fish breeding business. With my new-found fishkeeping hobby, I have been to various local fish stores – Pet Zone, Greenhills, where I had my glass aquarium and HOB filter; Cartimar, Pasay, where I shopped for aquatic plants, rocks, and other accessories; Pet World, SM Megamall, where I purchased a bag of fine sand; and, Bio Research, SM Megamall, where my African cichlids and other fish species came from. Well, I admit it’s a bit costly, but I see people, young and old, coming in and out of these stores. It must be a worthwhile hobby then!</p>
							<a href="single-news.php" class="read-more-btn">read more <i class="fas fa-angle-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="single-latest-news">
						<a href="single-news.php"><img src = "images/farm.jpg"/></a>
						<div class="news-text-box">
							<h3><a href="single-news.php">Ornamental fish farms: Aquaculture’s next big trend?</a></h3>
							<p class="blog-meta">
								<span class="author"><i class="fas fa-user"></i> Admin</span>
								<span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
							</p>
							<p class="excerpt">Fishkeeping—part art, part science—is now the world’s most popular hobby after photography.
Globally valued at $15 billion and growing by 14 percent yearly, the ornamental fish trade is aquaculture’s sunrise industry.
So why isn’t the Philippines farming ornamental fish?
While tilapia retails for P80 per kilo, ornamental fish can be sold for as much as P20,000 per kilo.
Gram for gram, they eat about the same amount of food.
Due to waning stocks, only 10 percent of ornamental freshwater fish are caught in the wild—bold cichlids from the Great African Rift Lakes, striped angelfish from peat-filled Amazonia, and so on.</p>
							<a href="single-news.php" class="read-more-btn">read more <i class="fas fa-angle-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="single-latest-news">
					<a href="single-news.php"><img src = "images/aquarium.jpg"/></a>
						<div class="news-text-box">
							<h3><a href="single-news.php">Franchising Ornamental (Aquarium) fish business</a></h3>
							<p class="blog-meta">
								<span class="author"><i class="fas fa-user"></i> Admin</span>
								<span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
							</p>
							<p class="excerpt">Have you ever come across the names, flowerhorn, koi or betta splendens? Well, these are all aquarium fishes raised by enthusiasts as pets or ornamentals. You could usually find them in pet shops and malls side by side with exotic birds, cats and dogs.
Like the expensive arowanas, flowerhorns command one of the highest price and a nice one with beautiful Chinese markings and good colors could easily fetch P20,000.
Despite the country’s advantages, the Philippines has only around 3.8 percent of the total export market supplied by Asian countries and most of these ornamental fishes are marine species that are caught in the wild, Sarmiento said. The growing of ornamental fishes in the country’s lakes and other bodies of inland waters will be a big boost to the industry as 90 percent of the fish traded in the world market are freshwater species, he said.
Another advantage in raising ornamental fish is that it commands much higher prices than food fishes—typically at $1.8 million a ton. In contrast, the average freight on board value of food fishes exported by the country amounted to $2,700 a metric ton in 2004.</p>
							<a href="single-news.php" class="read-more-btn">read more <i class="fas fa-angle-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="single-latest-news">
					<a href="single-news.php"><img src = "images/breed.jpg"/></a>
						<div class="news-text-box">
							<h3><a href="single-news.php">Breeding Marine Aquarium Fish: A Billion Peso Opportunity</a></h3>
							<p class="blog-meta">
								<span class="author"><i class="fas fa-user"></i> Admin</span>
								<span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
							</p>
							<p class="excerpt">The billion-dollar marine aquarium trade has a mixed reputation because most fish and invertebrates are still plucked wild from the world’s coral reefs, particularly in the Philippines and Indonesia. Several big pioneers are now farming marine aquarium fish on a commercial scale – proving how fish farmers can delve into the colorful world of aquarium fish. Since the 1960s, the Philippines and Indonesia have exported the vast majority of marine aquarium fish – including colorful clownfish, curious-looking seahorses and graceful angelfish. However, overfishing and coastal degradation have caused local fish populations to plummet. After the movie Finding Nemo premiered in 2003 for instance, soaring demand caused clownfish population sizes to plunge by as much as 75% in some coral reefs. The culture of marine ornamentals – including fish, crustaceans and corals – for the aquarium hobbyist segment is a $5 billion industry. It is a relatively new sector and is often ignored by mainstream aquaculture producers, yet it pushes the boundaries of aquaculture by exploring the culture of new species and improved culture methods. As well as providing considerable profit margins, it also provides huge opportunities for coastal communities in developing countries.</p>
							<a href="single-news.php" class="read-more-btn">read more <i class="fas fa-angle-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="single-latest-news">
					<a href="single-news.php"><img src = "images/goldfish.jpg"/></a>
						<div class="news-text-box">
							<h3><a href="single-news.php">Breeding and Culture of Goldfish</a></h3>
							<p class="blog-meta">
								<span class="author"><i class="fas fa-user"></i> Admin</span>
								<span class="date"><i class="fas fa-calendar"></i> 27 December, 2018</span>
							</p>
							<p class="excerpt">Goldfish is a small member of the carp family (Cyprinidae). It is called goldfish because it started from a gold variety of silver carp. They lack barbell which distinguishes it from common carp with two barbells. Goldfish is one of the earliest fish to be domesticated and still one of the most commonly kept aquarium fish. It originated from China and introduced into Europe in the late 17th century. There are more than 100 beautiful varieties of goldfish at present which were developed by Korea, Japan, and China. The average lifespan of goldfish in optimal conditions is 5-6 years but it may live for more than 20 years (the world record is 49 years).</p>
							<a href="single-news.php" class="read-more-btn">read more <i class="fas fa-angle-right"></i></a>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 text-center">
							<div class="pagination-wrap">
								<ul>
									<li><a href="#">Prev</a></li>
									<li><a href="#">1</a></li>
									<li><a class="active" href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">Next</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end latest news -->

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