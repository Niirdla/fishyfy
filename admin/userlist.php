<?php include 'inc/header.php';?>
<?php include 'inc/header_2.php';?>
<?php include 'includes/format.php'; ?>
<?php include '../classess/Customer.php';?>
<?php include_once '../helpers/Formate.php';?>

<?php
$pd = new Customer();
$fm = new Format();

?>

<?php
if (isset($_GET['delUser'])) {
	$id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delUser']);
	$delUser = $pd->delUserById($id);
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
                                        <select name="role">
  <?php
    $selected = $_GET["role"];
    $options = array("All","Admin", "Vendor", "Customer");
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
        Users list
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Users list</li>
      </ol>
    </section>


        <div class="block"> 
		<?php 

if (isset($delUser)) {
	echo $delUser;
}

?> 


            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>Id</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Address</th>
					<th>City</th>
					<th>ZIP Code</th>
					<th>Phone</th>
					<th>Email</th>
					<th>Role</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>

				<?php
				if(isset($_GET['role'])){
					$role = $_GET['role'];
					if($role == "All"){
				$getPd = $pd->getAllCustomer();
				if ($getPd) {
					$i = 0;
					while ($result = $getPd->fetch_assoc()) {
						$i++;

				?>
				<tr class="odd gradeX">
					<td><?php echo $i;?></td>
					<td><?php echo $result['first_name'] ;?></td>
					<td><?php echo $result['last_name'] ;?></td>
					<td><?php echo $result['address'] ;?></td>
					<td><?php echo $result['city'] ;?></td>
					<td><?php echo $result['zip'] ;?></td>
          			<td><?php echo $result['phone'] ;?></td>
          			<td><?php echo $result['email'] ;?></td>
					<td><?php echo $result['role'] ;?></td>
					<td><a href="userEdit.php?userid=<?php echo $result['id'];?>">Edit</a> || <a onclick="return confirm('Are you sure to delete!')" href="?delUser=<?php echo $result['id'];?>">Delete</a></td>
				</tr>


			<?php }} }elseif($role == "Admin"){

$getPd = $pd->getAllSystemAdmin();
if ($getPd) {
	$i = 0;
	while ($result = $getPd->fetch_assoc()) {
		$i++;

?>
<tr class="odd gradeX">
	<td><?php echo $i;?></td>
	<td><?php echo $result['first_name'] ;?></td>
	<td><?php echo $result['last_name'] ;?></td>
	<td><?php echo $result['address'] ;?></td>
	<td><?php echo $result['city'] ;?></td>
	<td><?php echo $result['zip'] ;?></td>
	  <td><?php echo $result['phone'] ;?></td>
	  <td><?php echo $result['email'] ;?></td>
	<td><?php echo $result['role'] ;?></td>
	<td><a href="userEdit.php?userid=<?php echo $result['id'];?>">Edit</a> || <a onclick="return confirm('Are you sure to delete!')" href="?delUser=<?php echo $result['id'];?>">Delete</a></td>
</tr>


<?php }}
			}elseif($role == "Vendor"){

				$getPd = $pd->getAllAdminVendor();
				if ($getPd) {
					$i = 0;
					while ($result = $getPd->fetch_assoc()) {
						$i++;

				?>
				<tr class="odd gradeX">
					<td><?php echo $i;?></td>
					<td><?php echo $result['first_name'] ;?></td>
					<td><?php echo $result['last_name'] ;?></td>
					<td><?php echo $result['address'] ;?></td>
					<td><?php echo $result['city'] ;?></td>
					<td><?php echo $result['zip'] ;?></td>
          			<td><?php echo $result['phone'] ;?></td>
          			<td><?php echo $result['email'] ;?></td>
					<td><?php echo $result['role'] ;?></td>
					<td><a href="userEdit.php?userid=<?php echo $result['id'];?>">Edit</a> || <a onclick="return confirm('Are you sure to delete!')" href="?delUser=<?php echo $result['id'];?>">Delete</a></td>
				</tr>


			<?php }}
			}elseif($role == "Customer"){

				$getPd = $pd->getAllCustomerRole();
				if ($getPd) {
					$i = 0;
					while ($result = $getPd->fetch_assoc()) {
						$i++;

				?>
				<tr class="odd gradeX">
					<td><?php echo $i;?></td>
					<td><?php echo $result['first_name'] ;?></td>
					<td><?php echo $result['last_name'] ;?></td>
					<td><?php echo $result['address'] ;?></td>
					<td><?php echo $result['city'] ;?></td>
					<td><?php echo $result['zip'] ;?></td>
          			<td><?php echo $result['phone'] ;?></td>
          			<td><?php echo $result['email'] ;?></td>
					<td><?php echo $result['role'] ;?></td>
					<td><a href="userEdit.php?userid=<?php echo $result['id'];?>">Edit</a> || <a onclick="return confirm('Are you sure to delete!')" href="?delUser=<?php echo $result['id'];?>">Delete</a></td>
				</tr>


			<?php }}
			}
			}
			
			?>
				
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