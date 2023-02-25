<?php include 'inc/header.php';?>
<?php include 'inc/header_2.php';?>
<?php include 'includes/format.php'; ?>
<?php 
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../classess/Cart.php');
$ct = new Cart();
$fm = new Format();
?>
<?php 
if (isset($_GET['shiftid'])) {
	$id = $_GET['shiftid'];
	$shift = $ct->productShifted($id);

}
if (isset($_GET['deliverid'])) {
	$id = $_GET['deliverid'];
	$shift = $ct->productDeliver($id);

}


if (isset($_GET['delproid'])) {
	$id = $_GET['delproid'];
	$delOrder = $ct->delProductShifted($id);

}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- include Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<!-- include jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- include Bootstrap JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
.modal-open{
        overflow: auto;
        padding-right:0 !important;
    }
    </style>
</style>	
</head>	
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Orders
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><strong>Orders</strong></li>
      </ol>
    </section>
                <?php 
                if (isset($shift)) {
                	echo $shift;
                }

                if (isset($delOrder)) {
                	echo $delOrder;
                }


                 ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>ID</th>
							<th>Order Time</th>
							<th>Cust. ID</th>
							<th>Payment Method</th>
							<th>Proof of Payment</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

						<?php

						$getOrder = $ct->getAllOrderProduct();
						if ($getOrder) {
							while ($result = $getOrder->fetch_assoc()) {
						
						  ?>
						<tr class="odd gradeX">
							<td><?php echo $result['orderId']; ?></td>
							<td><?php echo $fm->formatDate($result['date']); ?></td>
							<td><?php echo $result['cmrId']; ?></td>
						
							<td><?php echo $result['paymentMethod']; ?></td>
							<!-- Update the view-proof link to pass the orderId as a data attribute -->
							<td><a href="#" class="view-order-details" data-order-id="<?php echo $result['paymentId']; ?>" data-toggle="modal" data-target="#orderModal" data-backdrop="static">View Proof of payment</a></td>
							<?php 

							if ($result['status'] == '0') { ?>
							<td><a href="?shiftid=<?php echo $result['orderId']; ?>">Shift Product</a></td>	
							<?php }elseif($result['status'] == '1'){?>
								<td><a href="?deliverid=<?php echo $result['orderId']; ?>">Deliver</td>
							<?php }elseif($result['status'] == '2'){?>
								<td>Pending</td>
							<?php } elseif($result['status'] == '3'){ ?>
								<td style= "Color: green;">Order Complete</td>
						<?php } ?>
						</tr>
					<?php }} ?>

			
					</tbody>
				</table>
				<div id="orderModal" class="modal fade" role="dialog" style = "">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Order Details</h4>
      </div>
      <div class="modal-body">
        <!-- Order details will be displayed here -->
      </div>
    </div>
  </div>
</div>
               </div>

							</body>



<?php include 'inc/footer.php';?>

<?php include 'includes/scripts.php'; ?>

<script>
$(document).ready(function() {
    // When the user clicks on the "View Proof of payment" link
    $(".view-order-details").click(function() {
        // Get the orderId from the data attribute
        var orderId = $(this).data("order-id");

        // Send an AJAX request to the server to retrieve the order details
        $.ajax({
            url: "get_order_details.php",
            type: "POST",
            data: {orderId: orderId},
            success: function(response) {

				console.log(orderId);
                // Display the order details in the modal body
                $("#orderModal .modal-body").html(response);
            }
        });
    });
});

$(document).on('show.bs.modal', '.modal', function () {
     $("body").css("padding-right","0");
});

$(document).on('hide.bs.modal', '.modal', function () {
     $("body").css("padding-right","0");
});
</script>