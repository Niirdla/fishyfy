
<?php
if (!isset($_GET['msgid']) || $_GET['msgid'] == NULL) {
   
   echo "<script>window.location='inbox.php';</script>";
   
} else {

    $id = $_GET['msgid'];
}


 ?>
<?php include 'inc/header_3.php';?>

<?php 
$login = Session::get("cuslogin");
if ($login == false) {

	echo '<style>.sign-out {visibility: hidden;}</style>';

	
}
 ?>






<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$first_name = $fm->validation($_POST['first_name']);
	$last_name = $fm->validation($_POST['last_name']);
	$email = $fm->validation($_POST['email']);
	$contact = $fm->validation($_POST['contact']);
	$subject = $fm->validation($_POST['subject']);
	$message = $fm->validation($_POST['message']);
	$cmrId = Session::get("cmrId");
	

	$first_name = mysqli_real_escape_string($db->link, $first_name);
	$last_name = mysqli_real_escape_string($db->link, $last_name);
	$email = mysqli_real_escape_string($db->link, $email);
	$contact = mysqli_real_escape_string($db->link, $contact);
	$subject = mysqli_real_escape_string($db->link, $subject);
	$message = mysqli_real_escape_string($db->link, $message);

	$error = "";

	if (empty($first_name)) {
		$error = "Name must not be empty !";
	}elseif (empty($last_name)) {
		$error = "Email must not be empty !";
	} elseif (empty($email)) {
		$error = "Email must not be empty !";
	} elseif (empty($contact)) {
		$error = "Contact field must not be empty !";

	}elseif (empty($subject)) {
		$error = "Subject field must not be empty !";

	} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$error = "Invalid Email Address !";
	} elseif (empty($message)) {
		$error = "Subject field not be empty !";

	} else {
 $query = "INSERT INTO tbl_contact(first_name,last_name,frm_cmrId,email,contact,subject,message) VALUES('$first_name','$last_name','$cmrId','$email','$contact','$subject','$message')";

    $inserted_rows = $db->insert($query);

    if ($inserted_rows) {
     $msg = "Message Sent Successfully.";

    }else {
    $error = "Message not sent!";
    }
	}

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

	<style>
		
	</style>
	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="assets/css/all.min.css">
	<style>
		
		.popup-box {
		   background-color: #ffffff;
		border: 1px solid #b0b0b0;
		bottom: 0;
		display: none;
		height: 415px;
		position: fixed;
		right: 70px;
		width: 300px;
		font-family: 'Open Sans';
		}	
		::-webkit-scrollbar{
		width: 10px;
		border-radius: 25px;
		}
		::-webkit-scrollbar-track{
		background: #f1f1f1;
		}
		::-webkit-scrollbar-thumb{
		background: #ddd;
		}
		::-webkit-scrollbar-thumb:hover{
		background: #ccc;
		}
		
		.chat-wrapper{
		width: 300px;
		background: #fff;
		border-radius: 5px;
		border: 1px solid lightgrey;
		border-top: 0px;
		}
		.chat-wrapper .title{
		background: #8d1141;
		color: #fff;
		font-size: 20px;
		font-weight: 500;
		line-height: 60px;
		text-align: center;
		border-bottom: 1px solid rgb(168, 157, 157);
		border-radius: 8px 8px 0 0;
		}
		.chat-wrapper .chat-box{
		padding: 20px 15px;
		min-height: 250px;
		max-height: 250px;
		overflow-y: auto;
		}
		.chat-wrapper .chat-box .inbox{
		width: 100%;
		display: flex;
		align-items: baseline;
		}
		.chat-wrapper .chat-box .customer-inbox{
		justify-content: flex-end;
		margin: 13px 0;
		}
		.chat-wrapper .chat-box .inbox .icon{
		height: 40px;
		width: 40px;
		color: #fff;
		text-align: center;
		line-height: 40px;
		border-radius: 50%;
		font-size: 18px;
		background: #007bff;
		}
		.chat-wrapper .chat-box .inbox .message-content{
		max-width: 53%;
		margin-left: 10px;
		}
		.chat-box .inbox .message-content p{
		color: #fff;
		background: #F52B53;
		border-radius: 10px;
		padding: 8px 10px;
		font-size: 12px;
		/*font-weight: bold;
		word-break: break-all;*/
		}
		.chat-box .customer-inbox .message-content p{
		color: #333;
		background: #efefef;
		}
		.chat-wrapper .typing-field{
		display: flex;
		height: 60px;
		width: 100%;
		align-items: center;
		justify-content: space-evenly;
		background: #efefef;
		border-top: 1px solid #d9d9d9;
		border-radius: 0 0 5px 5px;
		}
		.chat-wrapper .typing-field .input-data{
		height: 40px;
		width: 335px;
		position: relative;
		}
		.chat-wrapper .typing-field .input-data input{
		height: 100%;
		width: 100%;
		outline: none;
		border: 1px solid transparent;
		padding: 0 80px 0 15px;
		border-radius: 3px;
		font-size: 15px;
		background: #fff;
		transition: all 0.3s ease;
		}
		.typing-field .input-data input:focus{
		border-color: rgba(0,123,255,0.8);
		}
		.input-data input::placeholder{
		color: #999999;
		transition: all 0.3s ease;
		}
		.input-data input:focus::placeholder{
		color: #bfbfbf;
		}
		.chat-wrapper .typing-field .input-data button{
		position: absolute;
		right: 5px;
		top: 50%;
		height: 30px;
		width: 50px;
		color: #fff;
		font-size: 16px;
		cursor: pointer;
		outline: none;
		opacity: 0;
		pointer-events: none;
		border-radius: 3px;
		background: #c7043f;
		border: 1px solid #c7043f;
		transform: translateY(-50%);
		transition: all 0.3s ease;
		}
		.chat-wrapper .typing-field .input-data input:valid ~ button{
		opacity: 1;
		pointer-events: auto;
		}
		
			</style>
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

	<script src = "https://www.paypal.com/sdk/js?client-id=AcTYM_vIcI8ruRN3yyXlp2PO02Ke58qj8xxBP_LGjimI9W9TMeVdtve_LMzRyDb86lLDY11tpbTUNXRE"></script>

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
							<li class="current-list-item"><a href="index.php">Home</a>
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

	<div class="hero-area hero-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 offset-lg-2 text-center">
					<div class="hero-text">
						<div class="hero-text-tablecell">
						<div class="support_desc">
                        <h3>Live Support</h3>
                        <p><span>24 hours | 7 days a week | 365 days a year &nbsp;&nbsp; Live Technical Support</span></p>
						<button id="chat" class="btn btn-danger">Click to Chat <i class="fas fa-headset"></i></button>
                    </div>
                        <img src="images/contact.png" alt="" />
                    <div class="clear"></div>
					<div class="popup-box chat-wrapper">
								<div class="title bg-light text-dark px-2" style="display:flex;align-items:center;justify-content:space-between;">
									<img src="https://i.ibb.co/CbRdz54/favicon.png" width="50" alt="">
									 FishyBOT
									<a class="text-danger" id="closechat"><span class="fas fa-times px-3"></span></a>
								</div>
								<div class="chat-box">
									<div class="bot-inbox inbox">
										<div id="wlcm" class="message-content">
											<p>Welcome to Fishyfy!</p>
										</div>
									</div>
								</div>
								<div id="botresponse">
									<small><i><i class="fas fa-robot text-danger"></i> FishyBOT <span class="spinner-grow spinner-grow-sm text-danger"></span><span class="spinner-grow spinner-grow-sm text-danger"></span><span class="spinner-grow spinner-grow-sm text-danger"></span></small>
								</div>
								<div class="typing-field">
									<div class="input-data m-1">
										<input id="customer_message" maxlength="32" type="text" placeholder="Type a message.." required>
										<button id="send"><i class="fas fa-paper-plane"></i></button>
									
									</div>
								</div>
							</div>
					
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    
<!-- check out section -->
<div class="checkout-section mt-150 mb-150">
		<div class="container">
        <h2 style ="text-align:left;"><a href = "contacts.php"> Back </a> </h2>
			<div class="row">
				<div class="col-lg-8">
				
                    <div class="col span_2_of_3">
                    <div class="contact-form">
                    <h1> Admin message </h1>
                    <?php

$query = "select * from tbl_contact where id='$id'";
$Adminmessage = $db->select($query);
if ($Adminmessage) {
    
while ($result = $Adminmessage->fetch_assoc()) {

?>
       <?php $date =$result['date'];
       echo date("F d, Y - h:i A", strtotime($date));
       
       ?>
  
       <div>
                                    <span><label>From:</label></span>
                                    <span><input style= "text-align:center;" type="text" name="subject" value = " <?php echo $result['email'];?>" disabled></span>
                                </div>
               
            <div>
                <span><label>Admin Message</label></span>
                <span><textarea disabled> <?php echo $result['message'];?></textarea></span>
                
                </div>
            

            
            <?php } } ?>
<h1> Your reply </h1>
					<?php 
        $cmrId = Session::get("cmrId");
		$getdata = $cmr->getCustomerData($cmrId);
		if ($getdata) {
			while ($result = $getdata->fetch_assoc()) {
		

		?>
                        

                    <?php 
                    if (isset($error)) {
                        echo "<span style = 'color:red'>$error</span>";
                    }

                    if (isset($msg)) {
                        echo "<span style = 'color:green'>$msg</span>";
                    }


                    ?>
                            <form action="" method="post">
                                
                                    <input type="hidden" name="first_name" value="<?php echo $result['first_name'];?>">
                    
                                    <input type="hidden" name="last_name" value="<?php echo $result['last_name'];?>">
                                
                                    <input type="hidden"  name="email" value="<?php echo $result['email'];?>">
                                
                                    <input type="hidden" name="contact" value="<?php echo $result['phone'];?>">
                                
								<div>
                                    <span><label>Subject.</label><span style="color: red;">*</span></span>
                                    <span><input style= "text-align:center;" type="text" name="subject"></span>
                                </div>
                                <div>
                                    <span><label>Message</label><span style="color: red;">*</span></span>
                                    <span><textarea name="message"> </textarea></span>
                                </div>
								
                            <div>
                                    <span><input type="submit" name="submit" value="SUBMIT"></span>
                            </div>
                            </form>     
							<?php } } ?>
                    </div> 
                    </div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- end check out section -->

    
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

	<script>
		$(document).ready(function(){
			$('#wlcm').hide();
			$('#botresponse').hide();
			$('#chat').click(function()
    			{
    			    $('#wlcm').fadeIn(2500);
    			    $('.popup-box').slideDown();
    			    $('#customer_message').focus();
    			});

    		$("#closechat").click(function ()
    		{
    		    $('.popup-box').slideUp();
    		});
		

			$("#send").click(message)

			$(document).keypress(function(e) {
  				if(e.which == 13) {
				message();
  			}
			});

			function message(){
				let user_message = $("#customer_message").val();
				$(".chat-box").append("<div class='customer-inbox inbox'><div class='message-content'><p>"+user_message+"</p></div></div>");
				$("#customer_message").val("");
				$(".chat-box").scrollTop($(".chat-box")[0].scrollHeight);
				send_chat(user_message);
			}

			function send_chat(msg){
					$.ajax({
					url:'chatresponse.php',
					type:'post',
					data:{'user_message' : msg},
					success:function(response){
						$('#botresponse').fadeIn();
						setTimeout(function(){
							$(".chat-box").append("<div id='new' class='bot-inbox inbox'><div class='message-content'><p>"+response+"</p></div></div>");
							$("#new").fadeIn(1000);
							$('#botresponse').hide();
							$(".chat-box").scrollTop($(".chat-box")[0].scrollHeight);
						},1000);
					}
				});
				}
		});
	</script>

</body>
</php>


