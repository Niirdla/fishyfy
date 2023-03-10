<?php include 'inc/header.php';?>
<?php include 'inc/header_2.php';?>
<?php include 'includes/format.php'; ?>
<?php include '../classess/Chatbot.php';?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php include 'includes/navbar.php'; ?>
<?php include 'includes/menubar.php'; ?>

<?php
$pd = new Chatbot();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $chatBot = $pd->chatInsert($_POST,$_FILES);
}

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add chatbot reply
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add chatbot reply</li>
      </ol>
    </section>

        <div class="block"> 

        <?php
        if (isset($chatBot)) {
            echo $chatBot;
        }

        ?>              
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
            <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Keywords/ questions<span style="color: red;"> *</span></label>
                    </td>
                    <td>
                    <textarea name="keywords" style="width: 857px; height: 215px;"></textarea>
                    </td>
                </tr>
              
            
                <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Chatbot reply<span style="color: red;"> *</span></label>
                    </td>
                    <td>
            
                        <textarea name="bot_reply" style="width: 857px; height: 215px;"></textarea>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
    </div>
    </div>

<?php include 'inc/footer.php';?>

<?php include 'includes/scripts.php'; ?>
