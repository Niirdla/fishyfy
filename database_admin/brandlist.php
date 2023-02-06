<?php include 'inc/header.php';?>
<?php include 'inc/header_2.php';?>
<?php include 'includes/format.php'; ?>
<?php include '../classess/Brand.php';?>
<?php
$brand = new Brand();


if (isset($_GET['delbrand'])) {
	$id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delbrand']);
	$delbrand= $brand->delbrandById($id);

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
        Brand list
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Brand list</li>
      </ol>
    </section>


                <div class="block">   

                	<?php 

                
                	if (isset($delbrand)) {
                		echo $delbrand;
                	}

					
                	?>

                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Brand Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

				<?php
				$getBrand = $brand->getAllBrand();
				if ($getBrand) {
					$i = 0;
					while ($result = $getBrand->fetch_assoc()) {
						$i++;
				

				?>		
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['brandName'];?></td>
							<td><a href="brandedit.php?brandid=<?php echo $result['brandId'];?>">Edit</a> || <a onclick="return confirm('Are you sure to delete!')" href="?delbrand=<?php echo $result['brandId'];?>">Delete</a></td>
						</tr>
					<?php } } ?>	
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

