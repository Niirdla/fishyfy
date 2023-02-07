<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Formate.php');

?>

<?php

class Chatbot{
	
private $db;
private $fm;

	public function __construct()
	{
		
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function chatInsert($data,$file){

$keywords = $this->fm->validation($data['keywords']);
$bot_reply = $this->fm->validation($data['bot_reply']);

$keywords = mysqli_real_escape_string($this->db->link, $data['keywords']);
$bot_reply = mysqli_real_escape_string($this->db->link, $data['bot_reply']);



if ($keywords == "" || $bot_reply == "") {
	
	$msg = "<span class='error'>Fields must not be empty !</span>";
	return $msg;

}else{

	 $query = "INSERT INTO tbl_bot(keywords,bot_reply) VALUES('$keywords','$bot_reply') ";

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

public function getAllChat(){

$query = "SELECT b.*
FROM tbl_bot as b
ORDER BY b.chat_id DESC";

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

public function getChatById($id){

	$query = "SELECT * FROM tbl_bot WHERE chat_id = '$id'";
	$result = $this->db->select($query);
	return $result;

}

public function chatUpdate($data,$file,$id){

$keywords = $this->fm->validation($data['keywords']);
$bot_reply = $this->fm->validation($data['bot_reply']);

$keywords = mysqli_real_escape_string($this->db->link, $data['keywords']);
$bot_reply       = mysqli_real_escape_string($this->db->link, $data['bot_reply']);

    

if ($keywords == "" || $bot_reply == "") {
	
	$msg = "<span class='error'>Fields must not be empty !</span>";
	return $msg;


}else{

	 $query = "UPDATE tbl_bot 
	 SET
	 keywords = '$keywords',
	 bot_reply       = '$bot_reply',
	 WHERE chat_id = '$id'";

	 $updatedted_row = $this->db->update($query);
			if ($updatedted_row) {
				$msg = "<span class='success'>Product Updated Successfully.</span>";
				return $msg;
			} else{
				$msg = "<span class='error'>Product Not Updated.</span>";
				return $msg;
		}
		}
}



public function delChatById($id){

$delquery = "DELETE FROM tbl_bot where chat_id = '$id'";
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