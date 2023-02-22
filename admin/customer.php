<?php include 'inc/header.php';?>
<?php include 'inc/header_2.php';?>
<?php include 'includes/format.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
 <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>
<?php 
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../classess/Customer.php');
?>
<?php
if (!isset($_GET['custId']) || $_GET['custId'] == NULL) {
   
   echo "<script>window.location='inbox.php';</script>";
   
} else {

    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['custId']);
}



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "<script>window.location='inbox.php';</script>";
}

?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Order Reports
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Reports</li>
      </ol>
    </section>




     <?php
     $cus = new Customer();
     $getCust = $cus->getCustomerData($id);
     if ($getCust) {
        while ($result = $getCust->fetch_assoc()) {
    
     ?>   
                 <form action="" method="post">
                    <table class="form">                    
                        <tr>
                            <td>First Name</td>
                            <td>
                                <input type="text"readonly="readonly" value="<?php echo $result['first_name'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Last Name</td>
                            <td>
                                <input type="text"readonly="readonly" value="<?php echo $result['last_name'];?>" class="medium" />
                            </td>
                        </tr>
                          <tr>
                            <td>Address</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['address'];?>" class="medium" />
                            </td>
                        </tr>
                          <tr>
                            <td>City</td>
                            <td>
                                <input type="text" readonly="readonly"value="<?php echo $result['city'];?>" class="medium" />
                            </td>
                        </tr>
                          <tr>
                            <td>Zipcode</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['zip'];?>" class="medium" />
                            </td>
                        </tr>
                          <tr>
                            <td>Phone</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['phone'];?>" class="medium" />
                            </td>
                        </tr>
                          <tr>
                            <td>Email</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['email'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Ok" />
                            </td>
                        </tr>
                    </table>
                    </form>

                    <?php } } ?>
                </div>
     
<?php include 'inc/footer.php';?>
<?php include 'includes/scripts.php'; ?>