<?php include 'inc/header.php';?>
<?php include 'inc/header_2.php';?>
<?php include 'includes/format.php'; ?>
<?php include '../classess/Product.php';?>
<?php include_once '../helpers/Formate.php';?>

<?php
$pd = new Product();
$fm = new Format();

?>

<?php
if (isset($_GET['delpro'])) {
	$id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delpro']);
	$delCat = $pd->delCatalogueById($id);
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
        Catalogue pictures list
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Catalogue pictures list</li>
      </ol>
    </section>

        <div class="block"> 


              <?php 

                	if (isset($delCat)) {
                		echo $delCat;
                	}

                	?> 
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>SL</th>
					<th>Fish Name</th>
					<th>Image</th>
					<th>Description</th>
					<th>Family</th>
					<th>Diet</th>
					<th>Care</th>
					<th>Breed</th>
					<th>Life</th>
					<th>Tank</th>
					<th>Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>

				<?php
				$getPd = $pd->getAllCatalogue();
				if ($getPd) {
					$i = 0;
					while ($result = $getPd->fetch_assoc()) {
						$i++;

				?>
				<tr class="odd gradeX">
					<td><?php echo $i;?></td>
					<td><?php echo $result['fishName'] ;?></td>
					
					<td><?php echo $fm->textShorten($result['Description'],50) ;?></td>

					<td><?php echo $result['family'] ;?></td>
					<td><?php echo $result['diet'] ;?></td>
					<td><?php echo $result['care'] ;?></td>
					<td><?php echo $result['breed'] ;?></td>
					<td><?php echo $result['life'] ;?></td>
					<td><?php echo $result['tank'] ;?></td>
					<td><img src="<?php echo $result['images'] ;?>" height="40px" width="60px" ></td>
					<td>
						<?php 
						if ($result['type'] == 0) {
							echo "Featured";
						}else
						echo "General";

						?>
							

						</td>
					<td><a href="catalogueEdit.php?proid=<?php echo $result['id'];?>">Edit</a> || <a onclick="return confirm('Are you sure to delete!')" href="?delpro=<?php echo $result['id'];?>">Delete</a></td>
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