<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classess/Customer.php';?>
<?php include_once '../helpers/Formate.php';?>

<?php
$pd = new Customer();
$fm = new Format();

?>

<?php
if (isset($_GET['getCustomer'])) {
	$id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['getCustomer']);
	$getCustomer = $pd->getCustomerData($id);
}
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Users List</h2>
        <div class="block"> 


              <?php 

                	if (isset($getCustomer)) {
                		echo $getCustomer;
                	}

                	?> 
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>Id</th>
					<th>Name</th>
					<th>Address</th>
					<th>City</th>
					<th>Country</th>
					<th>ZIP Code</th>
					<th>Phone</th>
					<th>Email</th>
				</tr>
			</thead>
			<tbody>

				<?php
				$getPd = $pd->getAllCustomer();
				if ($getPd) {
					$i = 0;
					while ($result = $getPd->fetch_assoc()) {
						$i++;

				?>
				<tr class="odd gradeX">
					<td><?php echo $i;?></td>
					<td><?php echo $result['name'] ;?></td>
					<td><?php echo $result['address'] ;?></td>
					<td><?php echo $result['city'] ;?></td>
					<td><?php echo $result['country'] ;?></td>
					<td><?php echo $result['zip'] ;?></td>
          			<td><?php echo $result['phone'] ;?></td>
          			<td><?php echo $result['email'] ;?></td>
					
				</tr>


			<?php } } ?>
				
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
<?php include 'inc/footer.php';?>