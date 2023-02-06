<?php include 'inc/header.php';?>
<?php include 'inc/header_2.php';?>
<?php include 'includes/format.php'; ?>
<?php include '../classess/Customer.php';?>


<?php

if (!isset($_GET['userid']) || $_GET['userid'] == NULL) {
   
   echo "<script>window.location='catalogueList.php';</script>";
   
} else {

    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['userid']);
}
$pd = new Customer();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $updateUser = $pd->customerUpdate($_POST,$_FILES,$id);
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
        Edit User list
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit User list</li>
      </ol>
    </section>

        <div class="block"> 

        <?php
        if (isset($updateUser)) {
            echo $updateUser;
        }

        ?> 

        <?php 
        $getUser = $pd->getCustomerData($id);
        if ($getUser) {
           while ($value = $getUser->fetch_assoc()) {
               
    
         ?>             
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
            <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="name" placeholder="Enter User Name..." value="<?php echo $value['name'];?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Address</label>
                    </td>
                    <td>
                        <input type="text" name="address" placeholder="Enter Address..." value="<?php echo $value['address'];?>"class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>City</label>
                    </td>
                    <td>
                        <input type="text" name="city" placeholder="Enter City..." value="<?php echo $value['city'];?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Country</label>
                    </td>
                    <td>
                        <input type="text" name="country" placeholder="Enter Country..." value="<?php echo $value['country'];?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>ZIP</label>
                    </td>
                    <td>
                        <input type="text" name="zip" placeholder="Enter ZIP..." value="<?php echo $value['zip'];?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Phone</label>
                    </td>
                    <td>
                        <input type="text" name="phone" placeholder="Enter Phone..." value="<?php echo $value['phone'];?>"  class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Email</label>
                    </td>
                    <td>
                        <input type="text" name="email" placeholder="Enter Email..." value="<?php echo $value['email'];?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Password</label>
                    </td>
                    <td>
                        <input type="text" name="pass" placeholder="Enter Password..." value="<?php echo $value['pass'];?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Role</label>
                    </td>
                    <td>
                        <select id="select" name="role">
                            <option>Select Type</option>
                            <?php 
                            if ($value['role'] == 'Admin') { ?>
                            <option selected = "selected" value="Admin">Admin</option>
                            <option value="Admin">General</option>
                         <?php } elseif ($value['role'] == 'Database Admin') { ?>

                            <option selected = "selected" value="Database Admin">Database Admin</option>
                            <option value="Database Admin">Featured</option>
                      <?php  } else { ?>

                        <option selected = "selected" value="Customer">Customer</option>
                        <option value="0">Customer</option>
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

