<?php include 'inc/header.php';?>
<?php include 'inc/header_2.php';?>
<?php include 'includes/format.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

<?php 
$con = mysqli_connect("localhost","root","","db_shop");
?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Payment Reports
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Reports</li>
      </ol>
    </section>

<html>
  <head>

</head>
<body>
                <div class="block">               
          <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-5">
              
                    <div class="card-body">
                    
                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        
                                    <label>Role</label>
                                        <select name="payment">
  <?php
    $selected = $_GET["payment"];
    $options = array("All", "Cash on Delivery", "Gcash");
    foreach ($options as $option) {
      if ($option == $selected) {
        echo "<option selected='selected' value='$option'>$option</option>";
      } else {
        echo "<option value='$option'>$option</option>";
      }
    }
  ?>
</select>
                                    </div>
                                </div>
                              
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Click to Filter</label> <br>
                                      <button type="submit" class="btn btn-primary">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <span id="printout">

                <div class="col-md-12" >
	              <div class="page-header" style="text-align:center;" ><h1>Payment Reports</h1>
                 
	              </div>

                <div class="card mt-4">
                    <div class="card-body">
                        <table class="data display datatable" style = "text-align:center;" >
                            <thead>
                                <tr>
                                <th style = "text-align: center; color: white;">Order no.</th>
                                
								<th style = "text-align: center; color: white;">Product Name</th>
                                <th style = "text-align: center; color: white;">Quantity</th>
                                <th style = "text-align: center; color: white;">Price</th>
                                <th style = "text-align: center; color: white;">Date</th>
								<th style = "text-align: center; color: white;">Payment Method</th>
                                <th style = "text-align: center; color: white;">Status</th>
                                <th style = "text-align: center; color: white;">Action</th>
							                 
							                    
                                </tr>
                            </thead>
                            <tbody>
                            
                            <?php 
                                

                                if(isset($_GET['payment']))
                                {
                                    $payment = $_GET['payment'];

                                    $query = "SELECT tbl_order.*, payment.paymentMethod FROM tbl_order, payment WHERE tbl_order.cmrId = payment.cmrId and tbl_order.id = payment.orderId ORDER BY date DESC";
                                    $query_run = mysqli_query($con, $query);

                                    $query_COD = "SELECT tbl_order.*, payment.paymentMethod FROM tbl_order, payment WHERE tbl_order.cmrId = payment.cmrId and tbl_order.id = payment.orderId AND payment.paymentMethod = 'Cash on Delivery' ORDER BY date DESC";
                                    $query_run_COD = mysqli_query($con, $query_COD);
                                
                                    $query_Gcash = "SELECT tbl_order.*, payment.paymentMethod FROM tbl_order, payment WHERE tbl_order.cmrId = payment.cmrId and tbl_order.id = payment.orderId AND payment.paymentMethod = 'Gcash' ORDER BY date DESC";
                                    $query_run_Gcash = mysqli_query($con, $query_Gcash);

                                   
                                    if($payment == "All" && mysqli_num_rows($query_run) > 0)
                                    {
                                     

                                 
                                        foreach($query_run as $row)
                                        {
                                         
                                            ?>
                                            
                                            <tr>
                                                <td><?= $row['id']; ?></td>
                                                <td><?= $row['productName']; ?></td>
                                                <td><?= $row['quantity'];?></td>
                                                <td><?= $row['price']; ?></td>
                                                <td><?= $row['date']; ?></td>
                                                <td><?= $row['paymentMethod']; ?></td>
                                                <td><?php

if ($row['status'] == '0') {
    echo "Pending";
}elseif($row['status'] == '1'){
   echo "Shifted";
} else{ 
   echo "Order received";
}


?></td>
                                            </tr>
                                            <?php
                                        }
                                    }elseif($payment == "Gcash" && mysqli_num_rows($query_run_Gcash) > 0){
                                        foreach($query_run_Gcash as $row)
                                        {
                                         
                                            ?>
                                            
                                            <tr>
                                                <td><?= $row['id']; ?></td>
                                                <td><?= $row['productName']; ?></td>
                                                <td><?= $row['quantity'];?></td>
                                                <td><?= $row['price']; ?></td>
                                                <td><?= $row['date']; ?></td>
                                                <td><?= $row['paymentMethod']; ?></td>
                                                <td><?php

if ($row['status'] == '0') {
    echo "Pending";
}elseif($row['status'] == '1'){
   echo "Shifted";
} else{ 
   echo "Order received";
}


?></td>
                                            </tr>
                                            <?php
                                        }

                                    }elseif($payment == "Cash on Delivery" && mysqli_num_rows($query_run_COD) > 0){
                                        foreach($query_run_COD as $row)
                                        {
                                         
                                            ?>
                                            
                                            <tr>
                                                <td><?= $row['id']; ?></td>
                                                <td><?= $row['productName']; ?></td>
                                                <td><?= $row['quantity'];?></td>
                                                <td><?= $row['price']; ?></td>
                                                <td><?= $row['date']; ?></td>
                                                <td><?= $row['paymentMethod']; ?></td>
                                                <td><?php

if ($row['status'] == '0') {
    echo "Pending";
}elseif($row['status'] == '1'){
   echo "Shifted";
} else{ 
   echo "Order received";
}


?></td>
                                            </tr>
                                            <?php
                                        }

                                    }
                                   
                                    else
                                    {
                                        echo "No Record Found";
                                    }
                                    
                                }
                                
                            ?>
                            </tbody>
                        </table>
                       <div id = "container" style = "     float: left;

    position: absolute;
    width: 30%;
    right: 5px;
    margin-top: 60px;">
                       <p style = "text-align: center;"> <?php echo Session::get('adminName'); ?> </p>
                       <p style = "text-align: center;"> Prepared by </p>
                            </div>

                        </span>
                      <div class="text-center">
                <button onclick="tablePrint();" class="btn btn-primary">Print</button>
            </div>
        </div>
    </div>
        </div>
        </div>
               </div>
   
        <script>
function tablePrint(){  
    var display_setting="toolbar=no,location=no,directories=no,menubar=no,";  
    display_setting+="scrollbars=no,width=1000, height=800, left=100, top=25";  
    var content_innerhtml = document.getElementById("printout").innerHTML;  
    var document_print=window.open("","",display_setting);  
    document_print.document.open();  
    document_print.document.write('<body style="font-family:Calibri(body);  font-size:16px;" onLoad="self.print();self.close();" >');  
    document_print.document.write(content_innerhtml);  
    document_print.document.write('</body></html>');  
    document_print.print();  
    document_print.document.close();  
    return false;  
    } 
	$(document).ready(function() {
		oTable = jQuery('#list').dataTable({
		"bJQueryUI": true,
		"sPaginationType": "full_numbers"
		} );
	});	

		
</script>

</body>
</html>               
<?php include 'inc/footer.php';?>
<?php include 'includes/scripts.php'; ?>