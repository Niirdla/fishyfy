<?php include 'inc/header.php';?>
<?php include 'inc/header_2.php';?>
<?php include 'includes/format.php'; ?>
<?php include '../classess/Chatbot.php';?>
<?php include_once '../helpers/Formate.php';?>

<?php
$pd = new Chatbot();
$fm = new Format();

?>

<?php
if (isset($_GET['delchat'])) {
	$id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delchat']);
	$delChat = $pd->delChatById($id);
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
        Chatbot keywords & reply list
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Chatbot keywords & reply list</li>
      </ol>
    </section>

        <div class="block"> 


              <?php 

                	if (isset($delChat)) {
                		echo $delChat;
                	}

                	?> 
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>ID</th>
					<th>Keywords/ questions</th>
					<th>Chatbot reply</th>
					<th>Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>

				<?php
				$getPd = $pd->getAllChat();
				if ($getPd) {
					$i = 0;
					while ($result = $getPd->fetch_assoc()) {
						$i++;

				?>
				<tr class="odd gradeX">
					<td><?php echo $i;?></td>
					<td><?php echo $fm->textShorten($result['keywords'],50) ;?></td>
					<td><?php echo $fm->textShorten($result['bot_reply'],50) ;?></td>
					<td><a href="chatbotEdit.php?chatid=<?php echo $result['chat_id'];?>">Edit</a> || <a onclick="return confirm('Are you sure to delete!')" href="?delchat=<?php echo $result['chat_id'];?>">Delete</a></td>
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