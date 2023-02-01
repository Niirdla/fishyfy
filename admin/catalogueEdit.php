<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
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
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Category</h2>
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
    </div>
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


