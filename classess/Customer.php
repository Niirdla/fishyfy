<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Formate.php');

?>


<?php

class Customer{
	
private $db;
private $fm;


	public function __construct()
	{
		
		$this->db = new Database();
		$this->fm = new Format();
	}
public function customerRegistration($data){
	
$con = mysqli_connect('localhost', 'root', '', 'db_shop');	
$errors = array();	

$first_name = mysqli_real_escape_string($this->db->link, $data['first_name']);
$last_name = mysqli_real_escape_string($this->db->link, $data['last_name']);
$address = mysqli_real_escape_string($this->db->link, $data['address']);
$city = mysqli_real_escape_string($this->db->link, $data['city']);
$zip = mysqli_real_escape_string($this->db->link, $data['zip']);
$phone = mysqli_real_escape_string($this->db->link, $data['phone']);
$email = mysqli_real_escape_string($this->db->link, $data['email']);
$pass = mysqli_real_escape_string($this->db->link, md5($data['pass']));
$cpass = mysqli_real_escape_string($this->db->link, md5($data['cpass']));

if ($first_name == "" || $last_name == "" ||$address == "" || $city == "" || $zip == "" || $phone == "" || $email == "" || $pass == ""|| $cpass == "") {
	
	$msg = "<span class='error'style = 'color:red;'>Fields must not be empty !</span>";
	return $msg;
}

  $mailquery = "SELECT * FROM tbl_customer WHERE email = '$email' LIMIT 1";
  $mailchk = $this->db->select($mailquery);
  if ($mailchk != false) {
  	$msg = "<span class='error'style = 'color:red;'>Email already exist !</span>";
	return $msg;
  }
  elseif($pass !== $cpass){

	echo "<p style = 'color:red;'>Confirm password not match </p>";
  }else{
	$code = rand(999999, 111111);
    $status = "notverified";
	$role = "Customer";

	$query = "INSERT INTO tbl_customer(first_name,last_name,address,city,zip,phone,email,pass,code,status,role) VALUES('$first_name','$last_name','$address','$city','$zip','$phone','$email','$pass','$code','$status','$role')";
	$data_check = mysqli_query($con, $query);
	if($data_check){
		$subject = "Email Verification Code";
        $message = "Your verification code is $code";
        $sender = "From: amberspirit16@gmail.com";
		if(mail($email, $subject, $message, $sender)){
			$info = "We've sent a verification code to your email - $email";
			$_SESSION['info'] = $info;
			$_SESSION['email'] = $email;
			$_SESSION['pass'] = $pass;
			header('location: user-otp.php');
			exit();
		}else{
			$errors['otp-error'] = "Failed while sending code!";
		}
	}else{
		$errors['db-error'] = "Failed while inserting data into database!";
	}
	$inserted_row = $this->db->insert($query);
	if ($inserted_row) {
		
	$msg = "<span class='success'style = 'color:red;'>Customer Data inserted Successfully.</span>";
		return $msg;
	
		
	} else{
		$msg = "<span class='error'style = 'color:red;'>Customer Data Not inserted.</span>";
		return $msg;
}
  }
  
  
}


public function AdmincustomerRegistration($data){

	$first_name = mysqli_real_escape_string($this->db->link, $data['first_name']);
	$last_name = mysqli_real_escape_string($this->db->link, $data['last_name']);
	$address = mysqli_real_escape_string($this->db->link, $data['address']);
	$city = mysqli_real_escape_string($this->db->link, $data['city']);

	$zip = mysqli_real_escape_string($this->db->link, $data['zip']);
	$phone = mysqli_real_escape_string($this->db->link, $data['phone']);
	$email = mysqli_real_escape_string($this->db->link, $data['email']);
	$pass = mysqli_real_escape_string($this->db->link, md5($data['pass']));
	$role = mysqli_real_escape_string($this->db->link, $data['role']);
	
	if ($first_name == "" ||$last_name == "" || $address == "" || $city == "" || $zip == "" || $phone == "" || $email == "" || $pass == ""|| $role == "") {
		
		$msg = "<span class='error'style = 'color:red;'>Fields must not be empty !</span>";
		return $msg;
	}
	
	  $mailquery = "SELECT * FROM tbl_customer WHERE email = '$email' LIMIT 1";
	  $mailchk = $this->db->select($mailquery);
	  if ($mailchk != false) {
		  $msg = "<span class='error' style = 'color:red;'>Email already exist !</span>";
		return $msg;
	  }else{
	
	
		   $query = "INSERT INTO tbl_customer(first_name,last_name,address,city,zip,phone,email,pass,role) VALUES('$first_name','$last_name','$address','$city','$zip','$phone','$email','$pass','$role')";
	
		 $inserted_row = $this->db->insert($query);
				if ($inserted_row) {
					$msg = "<span class='success'style = 'color:red;'>Customer Data inserted Successfully.</span>";
					return $msg;
				} else{
					$msg = "<span class='error'style = 'color:red;'>Customer Data Not inserted.</span>";
					return $msg;
			}
	  }
	}

public function resetPassword($data){
	$con = mysqli_connect('localhost', 'root', '', 'db_shop');	
	$errors = array();	
	//if user click change password button

    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $pass = mysqli_real_escape_string($this->db->link, md5($data['pass']));
		$cpass = mysqli_real_escape_string($this->db->link, md5($data['cpass']));

		if($pass !== $cpass){

			echo "<p style = 'color:red;'>Confirm password not match</p>";
		  }else{

       
            $code = 0;
            $email = $_SESSION['email']; //getting this email using session
            $update_pass = "UPDATE tbl_customer SET code = $code, pass = '$pass' WHERE email = '$email'";
            $run_query = mysqli_query($con, $update_pass);
            if($run_query){
                $info = "Your password changed. Now you can login with your new password.";
                $_SESSION['info'] = $info;
                header('Location: password-changed.php');
            }else{
                $errors['db-error'] = "Failed to change your password!";
            }
        }
	}
	
}
public function getAllCustomer(){

	$query = "SELECT u.*
	FROM tbl_customer as u
	ORDER BY u.id DESC";
	
	/*
	$query = "SELECT tbl_product.*, tbl_category.catName,tbl_brand.brandName
	FROM tbl_product
	
	INNER JOIN tbl_category
	ON tbl_product.catId = tbl_category.catId
	
	INNER JOIN tbl_brand
	ON tbl_product.brandId = tbl_brand.brandId
	ORDER BY tbl_product.productId DESC";
	*/
	$result = $this->db->select($query);
	return $result;
	}

public function customerLogin($data){

$email = mysqli_real_escape_string($this->db->link, $data['email']);
$pass = mysqli_real_escape_string($this->db->link, md5($data['pass']));
if (empty($email) || empty($pass)) {
$msg = "<span class='error'>Fields must not be empty !</span>";
	return $msg;
}
$query = "SELECT * FROM tbl_customer WHERE email = '$email' AND pass = '$pass'";
$result = $this->db->select($query);

if ($result) {
    $value = $result->fetch_assoc();
   
    $role = $value['role'];

    if ($role === 'Admin') {
        Session::set("adminlogin", true);
        Session::set("adminId", $value['id']);
        Session::set("adminUser", $value['email']);
        Session::set("adminName", $value['first_name']);
        header("Location: admin/dashboard.php");
        exit;
    } elseif ($role === 'Customer') {
        Session::set("cuslogin", true);
        Session::set("cmrId", $value['id']);
        Session::set("cmrName", $value['first_name']);
        header("Location:cart.php");
        exit;
    } elseif ($role === 'Database Admin') {
        Session::set("databaseAdminLogin", true);
        Session::set("databaseAdminId", $value['id']);
        Session::set("databaseAdminUser", $value['email']);
        Session::set("databaseAdminName", $value['first_name']);
        header("Location: vendor/dashboard.php");
        exit;
    }
}

$msg = "<span class='error'>Email or Password not matched !</span>";
return $msg;
}

public function getCustomerData($id){
	$query = "SELECT * FROM tbl_customer WHERE id = '$id'";
		$result = $this->db->select($query);
		return $result;
}

public function customerUpdate($data,$cmrId){

$first_name = mysqli_real_escape_string($this->db->link, $data['first_name']);
$last_name = mysqli_real_escape_string($this->db->link, $data['last_name']);
$address = mysqli_real_escape_string($this->db->link, $data['address']);
$city = mysqli_real_escape_string($this->db->link, $data['city']);

$zip = mysqli_real_escape_string($this->db->link, $data['zip']);
$phone = mysqli_real_escape_string($this->db->link, $data['phone']);
$email = mysqli_real_escape_string($this->db->link, $data['email']);
$role = mysqli_real_escape_string($this->db->link, $data['role']);

if ($first_name == "" || $last_name == "" || $address == "" || $city == "" || $zip == "" || $phone == "" || $email == ""|| $role == "") {
	
	$msg = "<span class='error'>Fields must not be empty !</span>";
	return $msg;
}else{


  	 $query = "INSERT INTO tbl_customer(first_name,last_name,address,city,zip,phone,email,role) VALUES('$first_name','$last_name','$address','$city','$zip','$phone','$email',$role')";

	$query = "UPDATE tbl_customer

	SET
	first_name = '$first_name',
	last_name = '$last_name',
	address = '$address', 
	city = '$city', 
	
	zip = '$zip', 
	phone = '$phone', 
	email = '$email' 
	role = '$role'

	WHERE id = '$cmrId'";

	$updated_row = $this->db->update($query);
	if ($updated_row) {
		$msg = "<span class='success'>Customer Data Updated Successfully.</span>";
				return $msg;
	} else{
			$msg = "<span class='error'>Customer Data Not Updated !</span>";
				return $msg;
	}
  }
}

public function delUserById($id){

	$delquery = "DELETE FROM tbl_customer where id = '$id'";
	$deldata = $this->db->delete($delquery);
		if ($deldata) {
			$msg = "<span class='success'>Product Deleted Successfully.</span>";
					return $msg;
		}else{
	$msg = "<span class='error'>Product Not Deleted !</span>";
					return $msg;
	
		}
	
	}
}


?>