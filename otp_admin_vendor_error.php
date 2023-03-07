<?php include 'inc/header_3.php';?>
<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
if($email == false){
  header('Location: login.php');
}
?>


 
<!DOCTYPE HTML>
<html>
<head>
    <title>Welcome to fishify</title>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
</head>
<div class="cont">      

<div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="user-otp.php" method="POST" autocomplete="off">
                    <h2 class="text-center">Code Verification</h2>
                    
                    <div class="alert alert-danger text-center">
                           <p>You entered incorrect code </p>
                        </div>
                    <div class="form-group">
                        <input class="form-control" type="number" name="otp" placeholder="Enter verification code" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="check_admin_vendor_identity" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>


 <script type="text/javascript" src="script.js"></script>
</body>
</html>
