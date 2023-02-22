<?php include 'inc/header.php';?>
<?php include 'inc/header_2.php';?>
<?php include 'includes/format.php'; ?>
<?php include '../classess/Category.php';?>
<?php
if (!isset($_GET['catid']) || $_GET['catid'] == NULL) {
   
   echo "<script>window.location='catlist.php';</script>";
   
} else {

    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['catid']);
}

$cat = new Category();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $catName = $_POST['catName'];
    $updateCat = $cat->catUpdate($catName,$id);
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
        Edit category
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit category</li>
      </ol>
    </section>
    
               <div class="block copyblock"> 

<?php
if (isset($updateCat)){
echo $updateCat;

}

        ?>


     <?php
     $getCat = $cat->getCatById($id);
     if ($getCat) {
        while ($result = $getCat->fetch_assoc()) {
    
     ?>   
                 <form action="" method="post">
                    <table class="form">                    
                        <tr>
                            <td>
                                <input type="text" name="catName" value="<?php echo $result['catName'];?>" class="medium" />
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