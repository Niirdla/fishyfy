
<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Session.php');

Session::checkLogin2();
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Formate.php');

?>



<?php


class Adminlogin2
{
	
private $db;
private $fm;

	public function __construct()
	{
		
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function adminlogin($adminUser,$adminPassword){

$adminUser = $this->fm->validation($adminUser);
$adminPassword = $this->fm->validation($adminPassword);

$adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
$adminPassword = mysqli_real_escape_string($this->db->link, $adminPassword);

if (empty($adminUser) ||empty($adminPassword) ) {
	
	$loginmsg = "Username or Password must not be empty !";
	return $loginmsg;
		} else{


			$query = "SELECT * FROM tbl_admin WHERE adminUser = '$adminUser'
			AND adminPassword = '$adminPassword'";

			$result = $this->db->select($query);

			if ($result != false) {
				$value = $result->fetch_assoc();

				Session::set("databaseAdminLogin",true);
				Session::set("databaseAdminId",$value['adminId']);
				Session::set("databaseAdminnUser",$value['adminUser']);
				Session::set("databaseAdminName",$value['adminName']);

				header("Location:dashboard.php");
			} else{
				$loginmsg = "Username or Password not match !";
				return $loginmsg;
			}


		}

	}
}


?>