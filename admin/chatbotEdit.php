<?php include 'inc/header.php';?>
<?php include 'inc/header_2.php';?>
<?php include 'includes/format.php'; ?>
<?php include '../classess/Chatbot.php';?>


<?php

if (!isset($_GET['chatid']) || $_GET['chatid'] == NULL) {
   
   echo "<script>window.location='chatbotList.php';</script>";
   
} else {

    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['chatid']);
}
$pd = new Chatbot();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $updateChatbot = $pd->catalogueUpdate($_POST,$_FILES,$id);
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
        Edit chatbot reply
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit chatbot reply</li>
      </ol>
    </section>

        <div class="block"> 

        <?php
        if (isset($updateChatbot)) {
            echo $updateChatbot;
        }

        ?> 

        <?php 
        $getChat = $pd->getChatById($id);
        if ($getChat) {
           while ($value = $getChat->fetch_assoc()) {
               
    
         ?>             
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
            <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Keywords/ question<span style="color: red;"> *</span></label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="keywords">
                            
                            <?php echo $value['keywords'];?>

                        </textarea>
                    </td>
                </tr>
            
                <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Chatbot reply<span style="color: red;"> *</span></label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="bot_reply">
                            
                            <?php echo $value['bot_reply'];?>

                        </textarea>
                    </td>
                </tr>
				

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>

        <?php } } ?>
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
<?php include 'inc/footer.php';?>
<?php include 'includes/scripts.php'; ?>

