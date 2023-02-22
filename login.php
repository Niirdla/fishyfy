<?php include 'inc/header_3.php';?>
<?php require_once "controllerUserData.php"; ?>
<?php 
$login = Session::get("cuslogin");

 ?>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $custLogin = $cmr->customerLogin($_POST);
}

?> 

<style>

input[type="text"]::placeholder{
	color:black;
}
input[type="password"]::placeholder{
	color:black;
}
input[type="tel"]::placeholder{
	color:black;
}
</style>




<!DOCTYPE HTML>
<html>
<head>
    <title>Welcome to fishify</title>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
</head>
<div class="cont">
    <div class="form sign-in">
      <h2>FISHYFY</h2>
    

    	 	<?php 

    		if (isset($custLogin)) {
    			echo $custLogin;
    		}
    		 ?>
        	
        	<form action="" method="post">
					<label>
						<span>Email<span style="color: red;">*</span></span>
						<input name="email" placeholder ="Enter your email" type="text"/>
					</label>
                    <label>
						<span>Password<span style="color: red;">*</span></span>
						<input name="pass" placeholder = "Enter your password" type="password"/>
					</label>
                    <div><button class="submit" name="login">Sign In</button></div>
					<div class="link forget-pass text-left"><a href="forgot-password.php">Forgot password?</a></div>
                      </div>
					  
                 </form>
                 
				 <div class="sub-cont">
				<div class="img">
					<div class="img-text m-up">
					<h2>Welcome Buddy!</h2>
					<p>Sign up and discover new aquatic experiences and opportunities!</p>
					</div>
					<div class="img-text m-in">
					<h2>Be one of us now!</h2>
					<p>If you already have an account, just log in. We've missed you!</p>
					</div>
					<div class="img-btn">
					<span class="m-up">Sign Up</span>
					<span class="m-in">Log in</span>
					</div>
				</div>        
                  


<?php
function passwordHasNumber($password) {
    if (preg_match('/[0-9]+/', $password)) {
        return true;
    } else {
        return false;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
	$phoneNumber = $_POST['phone'];
	$password = $_POST['pass'];
	if(strlen ($password) < 8){
		echo "Error: Password must be at least 8 characters long.";
	}elseif(strlen ($phoneNumber) < 11 && strlen ($phoneNumber) >11){
		echo "Error: Phone number must atleast 11 characters long.";
	}elseif(passwordHasNumber($password) == false){
		echo "Password must contain atleast one number.";
	}else{
    $customerReg = $cmr->customerRegistration($_POST);
	}
}

?>          
    	<div class="form sign-up" style="overflow-y:scroll;">
    		<?php 

    		if (isset($customerReg)) {
    			echo $customerReg;
    		}
    		 ?>
			
    		<h2>Sign Up</h2>
    		<form method="post">
			<label for= first_name>
			<span>First name<span style="color: red;">*</span></span>
			<input type="text" placeholder= "Enter your first name"name="first_name">
			</label>

			<label for= last_name>
			<span>Last name<span style="color: red;">*</span></span>
			<input type="text" placeholder= "Enter your last name"name="last_name">
			</label>
			
			<label for= address>
			<span>Address<span style="color: red;">*</span></span>
			<input type="text" placeholder ="House #, Street, Baranggay"name="address">
			</label>

			<label for= email>
			<span>Email<span style="color: red;">*</span></span>
			<input type="text" placeholder= "e.g. juandelacruz@gmail.com" name="email">
			</label>

							<label for= city>
			<span>City<span style="color: red;">*</span></span>
			<input type="text" placeholder ="e.g. Manila" name="city">
			</label>
							
	
			<label for= zip>
			<span>ZIP<span style="color: red;">*</span></span>
			<input type="text" placeholder = "Enter your zip code"name="zip">
			</label>
			
			<label for= phone>
			<span>Phone number<span style="color: red;">*</span></span>
			<input type="tel" id= "phoneNumber" maxlength ="13" placeholder="0910-249-4012" name="phone">
			</label>
			
			<label for= pass>
			<span>Password<span style="color: red;">*</span></span>
			<input type="password" placeholder = "Enter your password" name="pass">
			</label>

			<p><strong style = "color:red;">Note: Password should have atleast 8 characters and number.</strong></p>
			
			<label for= pass>
			<span>Confirm Password<span style="color: red;">*</span></span>
			<input type="password" placeholder = "Reenter password" name="cpass">
			</label>
			<button class="submit" name="register">Create Account</button>
			</form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

 <script type="text/javascript" src="script.js"></script>
</body>
</html>


<script>
  const phoneNumber = document.getElementById("phoneNumber");
  phoneNumber.addEventListener("input", function () {
    this.value = this.value.replace(/[^0-9]/g, "");
    this.value = this.value.replace(/(\d{4})(\d{3})(\d{4})/, "$1-$2-$3");
  });
</script>