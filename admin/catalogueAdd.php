<?php include 'inc/header.php';?>
<?php include 'inc/header_2.php';?>
<?php include 'includes/format.php'; ?>
<?php include '../classess/Product.php';?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php include 'includes/navbar.php'; ?>
<?php include 'includes/menubar.php'; ?>

<?php
$pd = new Product();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $catalogue = $pd->catalogueInsert($_POST,$_FILES);
}

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add catalogue pictures
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add catalogue pictures</li>
      </ol>
    </section>

        <div class="block"> 

        <?php
        if (isset($catalogue)) {
            echo $catalogue;
        }

        ?>              
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
            <tr >
                    <td>
                        <label>Name</label>
                    </td>
                    <td >
                        <input type="text" name="fishName" placeholder="Enter Fish Name..." class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <input type="file" name="images" />
                    </td>
                </tr>

                <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="Description"></textarea>
                    </td>
                </tr>
                <tr >
                    <td>
                        <label>Family</label>
                    </td>
                    <td >
                        <input type="text" name="family" placeholder="Enter Family Name..." class="medium" />
                    </td>
                </tr>

                <tr >
                    <td>
                        <label>Diet</label>
                    </td>
                    <td >
                        <input type="text" name="diet" placeholder="Enter Diet..." class="medium" />
                    </td>
                </tr>

                <tr >
                    <td>
                        <label>Care level</label>
                    </td>
                    <td >
                        <input type="text" name="care" placeholder="Enter Care level..." class="medium" />
                    </td>
                </tr>

                <tr >
                    <td>
                        <label>Breed</label>
                    </td>
                    <td >
                        <input type="text" name="breed" placeholder="Enter Breed..." class="medium" />
                    </td>
                </tr>
                <tr >
                    <td>
                        <label>Lifespan</label>
                    </td>
                    <td >
                        <input type="text" name="life" placeholder="Enter Lifespan..." class="medium" />
                    </td>
                </tr>
                <tr >
                    <td>
                        <label>Tank size</label>
                    </td>
                    <td >
                        <input type="text" name="tank" placeholder="Enter Tank size detail..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Catalogue Type</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Select Type</option>
                            <option value="0">Featured</option>
                            <option value="1">New Arrival</option>
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
    </div>
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

<?php include 'includes/scripts.php'; ?>
