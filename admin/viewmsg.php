<?php include 'inc/header.php';?>
<?php include 'inc/header_2.php';?>
<?php include 'includes/format.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>



 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View messages
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View messages</li>
      </ol>
    </section>

<?php
if (!isset($_GET['msgid']) || $_GET['msgid'] == NULL) {
   
   echo "<script>window.location='inbox.php';</script>";
   
} else {

    $id = $_GET['msgid'];
}


 ?>


<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  echo "<script>window.location='inbox.php';</script>"; 

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
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" readonly value="<?php echo $result['name'];?>" class="medium" />
                    </td>
                </tr>

                        <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $result['email'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Phone</label>
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $result['contact'];?>" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Date</label>
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $fm->formatDate($result['date']);?>" class="medium" />
                            </td>
                        </tr>
                     
                    
                   
                    
                       
                    
                        <tr>
                            <td>
                                <label>Message</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="message">
                                    <?php echo $result['message'];?>

                                </textarea>
                            </td>
                        </tr>

                       
                        

                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Ok" />
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



