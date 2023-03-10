<?php include 'inc/header.php';?>
<?php include 'inc/header_2.php';?>
<?php include 'includes/format.php'; ?>
<?php include '../classess/Category.php';?>
<?php


$cat = new Category();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $deliveryFee = $_POST['delivery_fee'];
    $updateDelivery = $cat->deliveryFeeUpdate($deliveryFee);
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
        Edit delivery fee
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit delivery fee</li>
      </ol>
    </section>
    
               <div class="block copyblock"> 

<?php
if (isset($updateDelivery)){
echo $updateDelivery;

}

        ?>


     <?php
     $getDeliveryFee = $cat->getDeliveryFeeById();
     if ($getDeliveryFee) {
        while ($result = $getDeliveryFee->fetch_assoc()) {
    
     ?>   
                 <form action="" method="post">
                    <table class="form">                    
                        <tr>
                            <td>
                                <input type="text" name="delivery_fee" value="<?php echo $result['delivery_fee'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>

                    <?php } } ?>
                </div>
      
<?php include 'inc/footer.php';?>
<?php include 'includes/scripts.php'; ?>