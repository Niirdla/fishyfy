<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
	$paymentMethod = $_POST['paymentMethod'];
	$cmrId = Session::get("cmrId");
    if($paymentMethod === "Gcash"){
	$insertOrder = $ct->orderProduct($_POST,$_FILES,$paymentMethod, $cmrId);
    }elseif($paymentMethod === "Cash on Delivery"){
        $insertOrder2 = $ct->orderProductCOD($paymentMethod, $cmrId);
    }

	$delData = $ct->delCustomerCart();
 header("Location:orderdetails.php");
}

?>
