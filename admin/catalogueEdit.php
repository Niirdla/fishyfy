<?php include 'inc/header.php';?>
<?php include 'inc/header_2.php';?>
<?php include 'includes/format.php'; ?>
<?php include '../classess/Product.php';?>


<?php

if (!isset($_GET['proid']) || $_GET['proid'] == NULL) {
   
   echo "<script>window.location='catalogueList.php';</script>";
   
} else {

    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['proid']);
}
$pd = new Product();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $updateCatalogue = $pd->catalogueUpdate($_POST,$_FILES,$id);
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
        Edit catalogue pictures list
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit catalogue pictures list</li>
      </ol>
    </section>

        <div class="block"> 

        <?php
        if (isset($updateCatalogue)) {
            echo $updateCatalogue;
        }

        ?> 

        <?php 
        $getPro = $pd->getCatalogueById($id);
        if ($getPro) {
           while ($value = $getPro->fetch_assoc()) {
               
    
         ?>             
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Fish Name</label>
                    </td>
                    <td>
                        <input type="text" name="fishName" value="<?php echo $value['fishName'];?>" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <img src="<?php echo $value['images'] ;?>" height="80px" width="200px" > <br/>
                        <input type="file" name="images" />
                    </td>
                </tr>

                <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="bot_reply">
                            
                            <?php echo $value['Description'];?>

                        </textarea>
                    </td>
                </tr>
				
                <tr>
                    <td>
                        <label>Family</label>
                    </td>
                    <td>
                        <input type="text" name="Family" value="<?php echo $value['Family'];?>" class="medium" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Diet</label>
                    </td>
                    <td>
                        <input type="text" name="diet" value="<?php echo $value['diet'];?>" class="medium" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Care</label>
                    </td>
                    <td>
                        <input type="text" name="care" value="<?php echo $value['care'];?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Breed</label>
                    </td>
                    <td>
                        <input type="text" name="breed" value="<?php echo $value['breed'];?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Life</label>
                    </td>
                    <td>
                        <input type="text" name="life" value="<?php echo $value['life'];?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Tank</label>
                    </td>
                    <td>
                        <input type="text" name="tank" value="<?php echo $value['tank'];?>" class="medium" />
                    </td>
                </tr>

				<tr>
                    <td>
                        <label>Catalogue Type</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Select Type</option>
                            <?php 
                            if ($value['type'] == 0) { ?>
                            <option selected = "selected" value="0">Featured</option>
                            <option value="1">General</option>
                         <?php } else { ?>

                            <option selected = "selected" value="1">General</option>
                            <option value="0">Featured</option>
                      <?php  } ?>
                            
                        </select>
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

