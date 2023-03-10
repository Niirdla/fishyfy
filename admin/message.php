<?php include 'inc/header.php';?>
<?php include 'inc/header_2.php';?>
<?php include 'includes/format.php'; ?>



<?php 
if (isset($_GET['seenid'])) {
	$seenid = $_GET['seenid'];

	$query = "UPDATE tbl_contact 
        SET
        status = '1'

        WHERE id = '$seenid'";
        $updated_row = $db->update($query);

if ($updated_row) {
    
    echo "<span class='success'>Messege sent in the seen box.</span>";
} else {

      echo "<span class='error'>Something Wrong!</span>";
}
    

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
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Subject</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

			<?php

			$query = "select * from tbl_contact where status='0' AND to_cmrId = 0 order by id desc";
			$msg = $db->select($query);
			if ($msg) {

			$i=0;
			while ($result = $msg->fetch_assoc()) {
			   $i++;

           ?>	


		<tr class="odd gradeX">
			<td><?php echo $i;?></td>
			<td><?php echo $result['first_name'];?></td>
			<td><?php echo $result['last_name'];?></td>
			<td><?php echo $result['email'];?></td>
			<td><?php echo $result['contact'];?></td>
			<td><?php echo $result['subject'];?></td>
			<td><?php echo $fm->formatDate($result['date']);?></td>
			<td>
				
				<a href="replymsg.php?msgid=<?php echo $result['id'];?>">View & Reply</a>||
				<a onclick="return confirm('Are you sure to Move the msg!');" href="?seenid=<?php echo $result['id'];?>">Seen</a> 
			</td>
		</tr>
						
						<?php } } ?>
					</tbody>
				</table>
				</div>
			   <h2>Seen Messages</h2>


<?php  
if (isset($_GET['delid'])) {
  $delid = $_GET['delid'];
  $delquery = "delete from tbl_contact where id = '$delid'";
  $deldata = $db->delete($delquery);
  if ($deldata) {
	 echo "<span class='success'>Message Deleted successfully.</span>";
  } else {

	echo "<span class='error'>Message not Deleted.</span>";
  }

}

?>
			   <div class="block">        
				   <table class="data display seen-datatable" id="seen-example">
				   <thead>
					   <tr>
						   <th>Serial No.</th>
						   <th>First Name</th>
							<th>Last Name</th>
						   <th>Email</th>
						   <th>Phone</th>
						   <th>Message</th>
						   <th>Date</th>
						   <th>Action</th>
					   </tr>
				   </thead>
				   <tbody>

		   <?php

		   $query = "select * from tbl_contact where status='1' order by id desc";
		   $msg = $db->select($query);
		   if ($msg) {

		   $i=0;
		   while ($result = $msg->fetch_assoc()) {
			  $i++;

		  ?>	


	   <tr class="odd gradeX">
		   <td><?php echo $i;?></td>
		   <td><?php echo $result['first_name'];?></td>
			<td><?php echo $result['last_name'];?></td>
		   <td><?php echo $result['email'];?></td>
		   <td><?php echo $result['contact'];?></td>
		   <td><?php echo $fm->textShorten($result['message'],30);?></td>
		   <td><?php echo $fm->formatDate($result['date']);?></td>
		   <td>

			   <a href="viewmsg.php?msgid=<?php echo $result['id'];?>">View</a> || 
			   <a onclick="return confirm('Are you sure to Delete!');" href="?delid=<?php echo $result['id'];?>">Delete</a> 
			   
		   </td>
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

		$('.datatable').dataTable(); // for the first table
$('#seen-example').dataTable(); // for the second table
        setSidebarHeight();


    });
  </script>

  

 <?php include 'inc/footer.php'; ?>
 <?php include 'includes/scripts.php'; ?>
