<?php include 'inc/header.php';?>
<?php include 'inc/header_2.php';?>
<?php include 'includes/format.php'; ?>
<?php include '../classess/Customer.php';?>


<?php
$pd = new Customer();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $insertUser = $pd->AdmincustomerRegistration($_POST,$_FILES);
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
        Add users & roles
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add users</li>
      </ol>
    </section>
        <div class="block"> 

        <?php
        if (isset($insertUser)) {
            echo $insertUser;
        }

        ?>              
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>First Name <span style="color: red;"> *</span></label>
                    </td>
                    <td>
                        <input type="text" name="first_name" placeholder="Enter First Name..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Last Name <span style="color: red;"> *</span></label>
                    </td>
                    <td>
                        <input type="text" name="last_name" placeholder="Enter Last Name..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Address<span style="color: red;"> *</span></label>
                    </td>
                    <td>
                        <input type="text" name="address" placeholder="Enter Address..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>City<span style="color: red;"> *</span></label>
                    </td>
                    <td>
                        <input type="text" name="city" placeholder="Enter City..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Country</label>
                    </td>
                    <td>
                        <input type="text" name="country" placeholder="Enter Country..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>ZIP<span style="color: red;"> *</span></label>
                    </td>
                    <td>
                        <input type="text" name="zip" placeholder="Enter ZIP..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Phone<span style="color: red;"> *</span></label>
                    </td>
                    <td>
                        <input type="tel" id= "phoneNumber" maxlength ="13" name="phone" placeholder="Enter Phone number..." class="medium" />
                      
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Email<span style="color: red;"> *</span></label>
                    </td>
                    <td>
                        <input type="text" name="email" placeholder="Enter Email..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Password<span style="color: red;"> *</span></label>
                    </td>
                    <td>
                        <input type="text" name="pass" placeholder="Enter Password..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Role<span style="color: red;"> *</span></label>
                    </td>
                    <td>
                        <select id="select" name="role">
                            <option>Select role</option>
                            <option value="Admin">Admin</option>
                            <option value="Vendor">Vendor</option>
                            <option value="Customer">Customer</option>
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

