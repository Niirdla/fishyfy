<?php include 'inc/header.php';?>
<?php include 'inc/header_2.php';?>
<?php include 'includes/format.php'; ?>
<?php include '../classess/Category.php';?>
<?php
$cat = new Category();

if (isset($_GET['delcat'])) {
	$id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delcat']);
	$delcat = $cat->delcatById($id);
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
        Category list
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Category list</li>
      </ol>
    </section>

                <div class="block">   

                	<?php 

                	if (isset($delcat)) {
                		echo $delcat;
                	}

                	?>

                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

				<?php
				$getCat = $cat->getAllCat();
				if ($getCat) {
					$i = 0;
					while ($result = $getCat->fetch_assoc()) {
						$i++;
				

				?>		
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['catName'];?></td>
							<td><a href="catedit.php?catid=<?php echo $result['catId'];?>">Edit</a> || <a onclick="return confirm('Are you sure to delete!')" href="?delcat=<?php echo $result['catId'];?>">Delete</a></td>
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
