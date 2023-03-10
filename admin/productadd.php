<?php include 'inc/header.php';?>
<?php include 'inc/header_2.php';?>
<?php include 'includes/format.php'; ?>
<?php include '../classess/Product.php';?>
<?php include '../classess/Category.php';?>
<?php include '../classess/Brand.php';?>

<?php
$pd = new Product();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $insertProduct = $pd->productInsert($_POST,$_FILES);
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
        Add product 
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add product</li>
      </ol>
    </section>


        <div class="block"> 

        <?php
        if (isset($insertProduct)) {
            echo $insertProduct;
        }

        ?>              
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name<span style="color: red;"> *</span></label>
                    </td>
                    <td>
                        <input type="text" name="productName" placeholder="Enter Product Name..." class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category<span style="color: red;"> *</span></label>
                    </td>
                    <td>
                        <select id="select" name="catId">
                            <option>Select Category</option>
                            <?php 
                            $cat = new Category();
                            $getCat = $cat->getAllCat();
                            if ($getCat) {
                                while ($result = $getCat->fetch_assoc()) {
                                   ?>
                             
                            <option value="<?php echo $result['catId'];?>"><?php echo $result['catName'];?></option>
                        <?php } } ?>
                            
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Brand<span style="color: red;"> *</span></label>
                    </td>
                    <td>
                        <select id="select" name="brandId">
                            <option>Select Brand</option>
                             <?php 
                            $brand = new Brand();
                            $getBrand = $brand->getAllBrand();
                            if ($getBrand) {
                                while ($result = $getBrand->fetch_assoc()) {
                                   ?>
                             
                            <option value="<?php echo $result['brandId'];?>"><?php echo $result['brandName'];?></option>
                        <?php } } ?>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description<span style="color: red;"> *</span></label>
                    </td>
                    <td>
                        
                        <textarea name="body" style="width: 857px; height: 215px;"></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price<span style="color: red;"> *</span></label>
                    </td>
                    <td>
                        <input type="text" name="price" placeholder="Enter Price..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Stocks<span style="color: red;"> *</span></label>
                    </td>
                    <td>
                        <input type="text" name="stocks" placeholder="Enter stocks..." class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image<span style="color: red;"> *</span></label>
                    </td>
                    <td>
                        <input type="file" name="image" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type<span style="color: red;"> *</span></label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Select Type</option>
                            <option value="0">Featured</option>
                            <option value="1">General</option>
                        </select>
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


