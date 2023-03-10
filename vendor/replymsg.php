<?php include 'inc/header.php';?>
<?php include 'inc/header_2.php';?>
<?php include 'includes/format.php'; ?>

<?php
if (!isset($_GET['msgid']) || $_GET['msgid'] == NULL) {
   
   echo "<script>window.location='inbox.php';</script>";
   
} else {

    $id = $_GET['msgid'];
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
        Messages
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Messages</li>
      </ol>
    </section>




      
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

$adminId = Session::get("adminId");
 $to = $fm->validation($_POST['toEmail']);
 $from = $fm->validation($_POST['fromEmail']);
 $Subject = $fm->validation($_POST['subject']);
 $message = $fm->validation($_POST['message']);
 $toCmrId = $fm->validation($_POST['frm_cmrId']);


	
	$to = mysqli_real_escape_string($db->link, $to);
	$from = mysqli_real_escape_string($db->link, $from);
	$Subject = mysqli_real_escape_string($db->link, $Subject);
	$message = mysqli_real_escape_string($db->link, $message);
    $toCmrId = mysqli_real_escape_string($db->link, $toCmrId);

    $query = "INSERT INTO tbl_contact(frm_cmrId,to_cmrId,email,subject,message) VALUES('$adminId','$toCmrId','$from','$Subject','$message')";

    $inserted_rows = $db->insert($query);


 if ($inserted_rows) {
     echo "<span class='success'>Message inserted successfully</span>";
   
 }else{
    echo "<span class='error'>Something went wrong!</span>";
 }


}

?>


                <div class="block">               
                 <form action="" method="post" >

             <?php

            $query = "select * from tbl_contact where id='$id'";
            $msg = $db->select($query);
            if ($msg) {
            
            while ($result = $msg->fetch_assoc()) {

           ?>
                    <table class="form">
                       
              

                        <tr>
                            <td>
                                <label>To</label>
                            </td>
                            <td>
                                <input type="text" readonly name="toEmail" value="<?php echo $result['email'];?>" class="medium" required/>
                            </td>
                        </tr>
                        <input type="hidden" readonly name="frm_cmrId" value="<?php echo $result['frm_cmrId'];?>" class="medium" required/>
                         <tr>
                            <td>
                                <label>From</label>
                            </td>
                            <td>
                                <input type="text" name="fromEmail" placeholder="Please Enter Your Email Address" class="medium" value = "<?php echo Session::get('adminUser'); ?>"required/>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Subject</label>
                            </td>
                            <td>
                                <input type="text" name="subject" placeholder="Please Enter Your Subject" class="medium" required/>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Customer message</label>
                            </td>
                            <td>
                            <textarea style="width: 857px; height: 215px;" disabled>
                            <?php echo $result['message'];?>
                            </textarea>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Your message</label>
                            </td>
                            <td>
                            
                            <textarea name="message" style="width: 857px; height: 215px;"></textarea>
                            </td>
                        </tr>

                       
                        

                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Send" />
                            </td>
                        </tr>
                    </table>

                    <?php } } ?>

                    </form>
                </div>
       


 <!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>


 <!-- Load TinyMCE -->

 <?php include 'inc/footer.php'; ?>
 <?php include 'includes/scripts.php'; ?>


