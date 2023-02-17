<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Formate.php');

?>


<?php

class Cart{
	
private $db;
private $fm;

	public function __construct()
	{
		
		$this->db = new Database();
		$this->fm = new Format();
	}
public function addToCart($quantity,$stocks, $id){

	$quantity = $this->fm->validation($quantity);
	$stocks = $this->fm->validation($stocks);
    $quantity = mysqli_real_escape_string($this->db->link, $quantity);
	$stocks = mysqli_real_escape_string($this->db->link, $stocks);
    $productId = mysqli_real_escape_string($this->db->link, $id);

	$con = mysqli_connect('localhost', 'root', '', 'db_shop');	


	
    $sId  = session_id();



    $squery = "SELECT * FROM tbl_product WHERE productId = '$productId'";
    $result = $this->db->select($squery)->fetch_assoc();

    $productName = $result['productName'];
    $price = $result['price'];
    $image = $result['image'];





    $chquery = "SELECT * FROM tbl_cart WHERE productId = '$productId' AND sId='$sId' ";
    $getPro = $this->db->select($chquery);
    if ($getPro) {
		$productAlreadyAddedQuery = "SELECT * FROM tbl_cart WHERE productId = '$productId' AND sId='$sId' ";
    $getProductAdded = $this->db->select($productAlreadyAddedQuery)->fetch_assoc();
   $quantityFromCartDatabase = $getProductAdded['quantity'];
   $cartId = $getProductAdded['cartId'];

		$quantityResult = $quantityFromCartDatabase + $quantity;

		$query = "UPDATE tbl_product SET stocks = '$stocks' WHERE productId = '$productId' ";
		$inserted_row = $this->db->insert($query);
	
		$queryUpdate2 = "UPDATE tbl_cart SET stocks = '$stocks' WHERE productId = '$productId'  ";
				$inserted_row = $this->db->insert($queryUpdate2);
			
    $query = "UPDATE tbl_cart

	SET
	quantity = '$quantityResult' 
	WHERE productId = '$productId'AND sId='$sId' ";

	$updated_row = $this->db->update($query);
	if ($updated_row) {
		header("Location:cart.php");
	} else{
			$msg = "<span class='error'>Quantity Not Updated !</span>";
				return $msg;
	}


	}else{
		$query = "UPDATE tbl_product SET stocks = '$stocks' WHERE productId = '$productId'";
		$inserted_row = $this->db->insert($query);

    $query = "INSERT INTO tbl_cart(sId,cmrId,productId,productName,price,quantity,stocks,image) VALUES('$sId','$cmrId','$productId','$productName','$price','$quantity','$stocks','$image') ";
			$inserted_row = $this->db->insert($query);
			if ($inserted_row) {
				header("Location:cart.php");
			} else{
				header("Location:404.php");
			}
	}
}


public function getCartProduct(){

	$sId  = session_id();
	$query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
	$result = $this->db->select($query);
	return $result;
	

}

	public function updateCartQuantity($cartId,$quantity){

		$cartId = mysqli_real_escape_string($this->db->link, $cartId);
		$quantity = mysqli_real_escape_string($this->db->link, $quantity);

		$query2 ="SELECT * FROM tbl_cart WHERE cartId ='$cartId'";
		$result = $this->db->select($query2)->fetch_assoc();
	
		$stocks = $result['stocks'];
		$productId = $result['productId'];
		$quantityFromDatabase = $result['quantity'];
			if($quantityFromDatabase >$quantity) {
				$quantityResult = intval($quantityFromDatabase) - intval($quantity);
				$stocks = intval($stocks) + intval($quantityResult);
	
				$queryUpdate = "UPDATE tbl_product SET stocks = '$stocks' WHERE productId = '$productId'";
				$inserted_row = $this->db->insert($queryUpdate);

				$queryUpdate2 = "UPDATE tbl_cart SET stocks = '$stocks' WHERE productId = '$productId'";
				$inserted_row = $this->db->insert($queryUpdate2);
			
			}elseif($quantityFromDatabase < $quantity ){
				$quantityResult = intval($quantity) - intval($quantityFromDatabase) ;
				$stocks = intval($stocks) - intval($quantityResult);
	
				$queryUpdate = "UPDATE tbl_product SET stocks = '$stocks' WHERE productId = '$productId'";
				$inserted_row = $this->db->insert($queryUpdate);

				$queryUpdate2 = "UPDATE tbl_cart SET stocks = '$stocks' WHERE productId = '$productId'";
				$inserted_row = $this->db->insert($queryUpdate2);
			}	

	$query = "UPDATE tbl_cart

	SET
	quantity = '$quantity' 
	WHERE cartId = '$cartId'";

	$updated_row = $this->db->update($query);
	if ($updated_row) {
		header("Location:cart.php");
	} else{
			$msg = "<span class='error'>Quantity Not Updated !</span>";
				return $msg;
	}

	

	

		
	}


	public function delProductByCart($delId){

	$delId = mysqli_real_escape_string($this->db->link, $delId);
	
	$query2 ="SELECT * FROM tbl_cart WHERE cartId ='$delId'";
	$result = $this->db->select($query2)->fetch_assoc();

	$stocks = $result['stocks'];
	$productId = $result['productId'];
	$quantityFromDatabase = $result['quantity'];
		
			$stocks = intval($stocks) + intval($quantityFromDatabase);

			$queryUpdate = "UPDATE tbl_product SET stocks = '$stocks' WHERE productId = '$productId'";
			$inserted_row = $this->db->insert($queryUpdate);

			$queryUpdate2 = "UPDATE tbl_cart SET stocks = '$stocks' WHERE productId = '$productId'";
			$inserted_row = $this->db->insert($queryUpdate2);
	

	$query = "DELETE FROM tbl_cart WHERE cartId = '$delId' ";
	$deldata = $this->db->delete($query);
	if ($deldata) {
		echo "<script>window.location = 'cart.php';</script>";
	}else{
$msg = "<span class='error'>Product Not Deleted !</span>";
				return $msg;

	}
	}

	public function checkCartTable(){
	$sId  = session_id();
	$query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
		$result = $this->db->select($query);
		return $result;
	}

	public function delCustomerCart(){
		$sId  = session_id();
		$query = "DELETE FROM tbl_cart WHERE sId = '$sId'";
		$this->db->delete($query);
	}

	public function orderProduct($data,$file,$paymentMethod, $cmrId){
		$sId  = session_id();
	    $query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
		$getPro = $this->db->select($query);
		if ($getPro) {
			while ($result = $getPro->fetch_assoc()) {
				$productId = $result['productId'];
				$productName = $result['productName'];
				$quantity = $result['quantity'];
				$price = $result['price'] * $quantity;
				$image = $result['image'];

				$query = "INSERT INTO tbl_order(cmrId,productId,productName,quantity,price,image) VALUES('$cmrId','$productId','$productName','$quantity','$price','$image') ";
			$inserted_row = $this->db->insert($query);

			$last_insert_id = mysqli_insert_id($this->db->link);
			}
		}

		$orderId = $last_insert_id;

		$paymentMethod = $this->fm->validation($data['paymentMethod']);

		$paymentMethod = mysqli_real_escape_string($this->db->link, $data['paymentMethod']);

		

    $permited  = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $file['proofOfPayment']['name'];
    $file_size = $file['proofOfPayment']['size'];
    $file_temp = $file['proofOfPayment']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "images/".$unique_image;

if ( $file_name == "") {
	
	$msg = "<span class='error'>Fields must not be empty !</span>";
	return $msg;
}elseif ($file_size > 8388608) {
     echo "<span class='error'>Image Size should be less then 8MB!
     </span>";
    } elseif (in_array($file_ext, $permited) === false) {
     echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";


}else{

	 move_uploaded_file($file_temp, $uploaded_image);
	 $query = "INSERT INTO payment(orderId,cmrId,paymentMethod,proofOfPayment) VALUES('$orderId','$cmrId','$paymentMethod','$uploaded_image') ";

	 $inserted_row = $this->db->insert($query);
			if ($inserted_row) {
				$msg = "<span class='success'>Product inserted Successfully.</span>";
				return $msg;
			} else{
				$msg = "<span class='error'>Product Not inserted.</span>";
				return $msg;
		}
	
		
		}
		
	}

	public function orderProductCOD($paymentMethod, $cmrId){
		$sId  = session_id();
	    $query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
		$getPro = $this->db->select($query);
		if ($getPro) {
			while ($result = $getPro->fetch_assoc()) {
				$productId = $result['productId'];
				$productName = $result['productName'];
				$quantity = $result['quantity'];
				$price = $result['price'] * $quantity;
				$image = $result['image'];

				$query = "INSERT INTO tbl_order(cmrId,productId,productName,quantity,price,image) VALUES('$cmrId','$productId','$productName','$quantity','$price','$image') ";
			$inserted_row = $this->db->insert($query);

			$last_insert_id = mysqli_insert_id($this->db->link);
			}
		}

		$orderId = $last_insert_id;

		$paymentMethod = $this->fm->validation($data['paymentMethod']);

		$paymentMethod = mysqli_real_escape_string($this->db->link, $data['paymentMethod']);

		

   

if ( $file_name == "" || $paymentMethod == "") {
	
	$msg = "<span class='error'>Fields must not be empty !</span>";
	return $msg;
}else{

	
			$query = "INSERT INTO payment(orderId,cmrId,paymentMethod) VALUES('$orderId','$cmrId','$paymentMethod') ";

			$inserted_row = $this->db->insert($query);
				   if ($inserted_row) {
					   $msg = "<span class='success'>Product inserted Successfully.</span>";
					   return $msg;
				   } else{
					   $msg = "<span class='error'>Product Not inserted.</span>";
					   return $msg;
			   }
		}
		
	}
	public function payableAmount($cmrId){
	$query = "SELECT price FROM tbl_order WHERE cmrId = '$cmrId' AND date = now()";
	$result = $this->db->select($query);
	return $result;
	}

	public function getOrderedProduct($cmrId){
    $query = "SELECT * FROM tbl_order WHERE cmrId = '$cmrId' ORDER BY date DESC";
	$result = $this->db->select($query);
	return $result;

	}
	public function checkOrder($cmrId){
	    $query = "SELECT * FROM tbl_order WHERE cmrId = '$cmrId'";
		$result = $this->db->select($query);
		return $result;
	}
	public function getAllOrderProduct(){
		$query = "SELECT * FROM tbl_order ORDER BY date DESC";
		$result = $this->db->select($query);
		return $result;
	}

	public function productShifted($id){
		$id = mysqli_real_escape_string($this->db->link, $id);

	$query = "UPDATE tbl_order
	SET status ='1'
	WHERE id = '$id' ";

	$updated_row = $this->db->update($query);
	if ($updated_row) {
		$msg = "<span class='success'>Updated Successfully.</span>";
				return $msg;
	} else{
			$msg = "<span class='error'>Not Updated !</span>";
				return $msg;
	}

	}

	public function delProductShifted($id){
		$id = mysqli_real_escape_string($this->db->link, $id);

		$query = "DELETE FROM tbl_order WHERE id = '$id' ";
	    $deldata = $this->db->delete($query);
	    if ($deldata) {
		$msg = "<span class='success'>Data Deleted Successfully.</span>";
				return $msg;
	}else{
$msg = "<span class='error'>Data Not Deleted !</span>";
				return $msg;

	}
	}

	public function productShiftConfirm($id){
	$id = mysqli_real_escape_string($this->db->link, $id);

	$query = "UPDATE tbl_order
	SET status ='2'
	WHERE id = '$id' ";

	$updated_row = $this->db->update($query);
	if ($updated_row) {
		$msg = "<span class='success'>Updated Successfully.</span>";
				return $msg;
	} else{
			$msg = "<span class='error'>Not Updated !</span>";
				return $msg;
	}
	}
}

?>