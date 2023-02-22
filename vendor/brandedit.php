<?php include 'inc/header.php';?>
<?php include 'inc/header_2.php';?>
<?php include 'includes/format.php'; ?>
<?php include '../classess/Brand.php';?>
<?php
if (!isset($_GET['brandid']) || $_GET['brandid'] == NULL) {
   
   echo "<script>window.location='brandlist.php';</script>";
   
} else {

    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['brandid']);
}

$brand = new Brand();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $brandName = $_POST['brandName'];
    $updateBrand = $brand->brandUpdate($brandName,$id);
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
        Edit brand
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Brand</li>
      </ol>
    </section>

     
               <div class="block copyblock"> 

<?php
if (isset($updateBrand)){
echo $updateBrand;

}

        ?>


     <?php
     $getBrand = $brand->getBrandById($id);
     if ($getBrand) {
        while ($result = $getBrand->fetch_assoc()) {
    
     ?>   
                 <form action="" method="post">
                    <table class="form">                    
                        <tr>
                            <td>
                                <input type="text" name="brandName" value="<?php echo $result['brandName'];?>" class="medium" />
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