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

if (isset($_GET['delproid'])) {
	$id = $_GET['delproid'];
	$delOrder = $ct->delProductShifted($id);

}
 ?>

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
        <li class="active">Orders</li>
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
							<th>Product</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Cust. ID</th>
							<th>Address</th>
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
							<td><?php echo $result['id']; ?></td>
							<td><?php echo $fm->formatDate($result['date']); ?></td>
							<td><?php echo $result['productName']; ?></td>
							<td><?php echo $result['quantity']; ?></td>
							<td>₱ <?php echo $result['price']; ?></td>
							<td><?php echo $result['cmrId']; ?></td>
							<td><a href="customer.php?custId=<?php echo $result['cmrId']; ?>">View Details</a></td>

							<?php 

							if ($result['status'] == '0') { ?>
							<td><a href="?shiftid=<?php echo $result['id']; ?>">Shifted</a></td>	
							<?php }elseif($result['status'] == '1'){?>
								<td>Pending</td>
							<?php } else{ ?>
								<td><a href="?delproid=<?php echo $result['id']; ?>">Remove</a></td>
						<?php } ?>
						</tr>
					<?php }} ?>
					</tbody>
				</table>
               </div>
           
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>

<?php include 'includes/scripts.php'; ?>