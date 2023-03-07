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
	$delpro = $pd->delProById($id);
}
?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>



 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
	  <div class="block">               
          <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-5">
              
                    <div class="card-body">
                    
                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        
                                    <label>Role</label>
                                        <select name="product">
  <?php
    $selected = $_GET["product"];
    $options = array("All","stock<50");
    foreach ($options as $option) {
      if ($option == $selected) {
        echo "<option selected='selected' value='$option'>$option</option>";
      } else {
        echo "<option value='$option'>$option</option>";
      }
    }
  ?>
</select>
                                    </div>
                                </div>
                              
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Click to Filter</label> <br>
                                      <button type="submit" class="btn btn-primary">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Product list
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Product list</li>
      </ol>
    </section>

        <div class="block"> 


              <?php 

                	if (isset($delpro)) {
                		echo $delpro;
                	}

                	?> 
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>SL</th>
					<th>Product Name</th>
					<th>Category</th>
					<th>Brand</th>
					<th>Description</th>
					<th>Price</th>
					<th>Stocks</th>
					<th>Image</th>
					<th>Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>

				<?php
				 if(isset($_GET['product']))
				 {
					 $product = $_GET['product'];
					 if($product == "All"){
				$getPd = $pd->getAllProduct();
				if ($getPd) {
					$i = 0;
					while ($result = $getPd->fetch_assoc()) {
						$i++;

				?>
				<tr class="odd gradeX">
					<td><?php echo $i;?></td>
					<td><?php echo $result['productName'] ;?></td>
					<td><?php echo $result['catName'] ;?></td>
					<td><?php echo $result['brandName'] ;?></td>
					<td><?php echo $fm->textShorten($result['body'],50) ;?></td>
					<td>₱<?php echo $result['price'] ;?></td>
					<td><?php echo $result['stocks'] ;?></td>
					<td><img src="<?php echo $result['image'] ;?>" height="40px" width="60px" ></td>
					<td>
						<?php 
						if ($result['type'] == 0) {
							echo "Featured";
						}else
						echo "General";

						?>
							

						</td>
					<td><a href="productedit.php?proid=<?php echo $result['productId'];?>">Edit</a> || <a onclick="return confirm('Are you sure to delete!')" href="?delpro=<?php echo $result['productId'];?>">Delete</a></td>
				</tr>

			<?php }}}
		
			 elseif($product == "stock<50"){
		$getPd = $pd->getProductLessThan50Stocks();
		if ($getPd) {
			$i = 0;
			while ($result = $getPd->fetch_assoc()) {
				$i++;

		?>
		<tr class="odd gradeX">
			<td><?php echo $i;?></td>
			<td><?php echo $result['productName'] ;?></td>
			<td><?php echo $result['catName'] ;?></td>
			<td><?php echo $result['brandName'] ;?></td>
			<td><?php echo $fm->textShorten($result['body'],50) ;?></td>
			<td>₱<?php echo $result['price'] ;?></td>
			<td><?php echo $result['stocks'] ;?></td>
			<td><img src="<?php echo $result['image'] ;?>" height="40px" width="60px" ></td>
			<td>
				<?php 
				if ($result['type'] == 0) {
					echo "Featured";
				}else
				echo "General";

				?>
					

				</td>
			<td><a href="productedit.php?proid=<?php echo $result['productId'];?>">Edit</a> || <a onclick="return confirm('Are you sure to delete!')" href="?delpro=<?php echo $result['productId'];?>">Delete</a></td>
		</tr>

	<?php }}
		} } ?>
				
			</tbody>
		</table>

       </div>
    </div>
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