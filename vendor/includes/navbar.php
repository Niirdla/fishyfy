
<header class="main-header">
  <!-- Logo -->
  <a href="#" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>A</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Admin</b></span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
 
      <ul class="nav navbar-nav">
      <ul class="nav main">
               
                <!-- <li class="ic-form-style"><a href=""><span>User Profile</span></a></li> -->
				<!-- <li class="ic-typography"><a href="changepassword.php"><span>Change Password</span></a></li> -->
                <li class="ic-grid-tables"><a href="message.php"><span>Message


       <?php 
       $query = "select * from tbl_contact where status='0' AND to_cmrId = 0 order by id desc";
         $msg = $db->select($query);

         if ($msg) {
            $count = mysqli_num_rows($msg);
            echo "(".$count.")";
         } else{

            echo "(0)";
         }
        ?>


                </span></a></li>
                <li class="ic-charts"><a href="../" target="_blank"><span>Visit Website</span></a></li>
            </ul>
      
            
        <div class="clear">
        </div>
        </ul>

  </nav>
</header>
