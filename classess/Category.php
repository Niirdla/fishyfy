<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Formate.php');

?>

<?php

class Category
{
	
private $db;
private $fm;

	public function __construct()
	{
		
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function catInsert($catName){
		$catName = $this->fm->validation($catName);
        $catName = mysqli_real_escape_string($this->db->link, $catName);


if (empty($catName) ) {
	
	$msg = "<span class='error'>Category field must not be empty !</span>";
	return $msg;
		} else{
			$query = "INSERT INTO tbl_category(catName) VALUES('$catName') ";
			$catinsert = $this->db->insert($query);
			if ($catinsert) {
				$msg = "<span class='success' style = 'color:green;'>Category inserted Successfully.</span>";
				return $msg;
			} else{
				$msg = "<span class='error'>Category Not inserted.</span>";
				return $msg;
			}

		}
	}
public function getAllCat(){

	$query = "SELECT * FROM tbl_category ORDER BY catId DESC";
	$result = $this->db->select($query);
	return $result;

}

public function getCatById($id){
$query = "SELECT * FROM tbl_category WHERE catId = '$id'";
	$result = $this->db->select($query);
	return $result;

}
public function getDeliveryFeeById(){
	$query = "SELECT * FROM tbl_delivery WHERE id = '1'";
		$result = $this->db->select($query);
		return $result;
	
	}
public function deliveryFeeUpdate ($deliveryFee){

	$deliveryFee = $this->fm->validation($deliveryFee);
    $deliveryFee = mysqli_real_escape_string($this->db->link, $deliveryFee);
    


if (empty($deliveryFee) ) {
	
	$msg = "<span class='error'>Delivery fee field must not be empty !</span>";
	return $msg;
} else{

	$query = "UPDATE tbl_delivery

	SET
	delivery_fee = '$deliveryFee' 
	WHERE id = '1'";

	$updated_row = $this->db->update($query);
	if ($updated_row) {
		$msg = "<span class='success' style = 'color:green;'>Delivery fee Updated Successfully.</span>";
				return $msg;
	} else{
			$msg = "<span class='error'>Delivery fee not updated !</span>";
				return $msg;
	}
}

}
public function catUpdate($catName,$id){

	$catName = $this->fm->validation($catName);
    $catName = mysqli_real_escape_string($this->db->link, $catName);
    $id = mysqli_real_escape_string($this->db->link, $id);


if (empty($catName) ) {
	
	$msg = "<span class='error'>Category field must not be empty !</span>";
	return $msg;
} else{

	$query = "UPDATE tbl_category

	SET
	catName = '$catName' 
	WHERE catId = '$id'";

	$updated_row = $this->db->update($query);
	if ($updated_row) {
		$msg = "<span class='success' style = 'color:green;'>Category Updated Successfully.</span>";
				return $msg;
	} else{
			$msg = "<span class='error'>Category Not Updated !</span>";
				return $msg;
	}
}
}
public function delcatById($id){

	$query = "DELETE FROM tbl_category WHERE catId = '$id'";
	$deldata = $this->db->delete($query);
	if ($deldata) {
		$msg = "<span class='success' style = 'color:green;'>Category Deleted Successfully.</span>";
				return $msg;
	}else{
$msg = "<span class='error'>Category Not Deleted !</span>";
				return $msg;

	}
}

}

?>