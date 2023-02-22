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
        Order Reports
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
                                        <label>From Date</label>
                                        <input type="date" name="from_date" value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>To Date</label>
                                        <input type="date" name="to_date" value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>" class="form-control">
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
	              <div class="page-header" style="text-align:center;" ><h1>Order Reports</h1>
		            <div class ="from-to">Inclusive Dates: From : <?php  echo isset($_GET['from_date']) ? $_GET['from_date'] :'';?> - To : <?php echo isset($_GET['to_date']) ?$_GET['to_date'] : '';?> </div>
	              </div>

                <div class="card mt-4">
                    <div class="card-body">
                        <table class="data display datatable" style = "text-align:center;" >
                            <thead>
                                <tr>
                                                <th style="text-align: center; color:white;">ID</th>
                                                <th style="text-align: center; color:white;">Order date</th>
							                    <th style="text-align: center; color:white;">Customer ID</th>
                                                <th style="text-align: center; color:white;">Customer first name</th>
                                                <th style="text-align: center; color:white;">Customer last name</th>
							                    <th style="text-align: center; color:white;">Product Name</th>
							                    <th style="text-align: center; color:white;">Quantity</th>
							                    <th style="text-align: center; color:white;">Price</th>
							                    
                                </tr>
                            </thead>
                            <tbody>
                            
                            <?php 
                                

                                if(isset($_GET['from_date']) && isset($_GET['to_date']))
                                {
                                    $from_date = $_GET['from_date'];
                                    $to_date = $_GET['to_date'];

                                    $query = "SELECT tbl_customer.*,tbl_order.* from tbl_customer, tbl_order where tbl_customer.id = tbl_order.cmrId AND date BETWEEN '$from_date' AND '$to_date' ";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                     

                                 
                                        foreach($query_run as $row)
                                        {
                                            $date = $row['date'];
                                            $month = date("F", strtotime($date));
                                            $day = date("d", strtotime($date));
                                            $year = date("Y", strtotime($date));
                                            ?>
                                            
                                            <tr>
                                                <td><?= $row['id']; ?></td>
                                                <td><?= "$month $day, $year"; ?></td>
                                                <td><?= $row['cmrId']; ?></td>
                                                <td><?= $row['first_name'];?></td>
                                                <td><?= $row['last_name'];?></td>
                                                <td><?= $row['productName']; ?></td>
                                                <td><?= $row['quantity']; ?></td>
                                                <td><?= $row['price']; ?></td>
                                                
                                            </tr>
                                            <?php
                                        }
                                    }
                                   
                                    else
                                    {
                                        echo "No Record Found";
                                    }
                                     $results = mysqli_query($con, "SELECT sum(price) FROM tbl_order where id AND date BETWEEN '$from_date' AND '$to_date' ") or die(mysqli_error());
                                    while($rows = mysqli_fetch_array($results)){?>
                                    <?php echo "<h2>Total Sales between this date = ₱".number_format_short($rows['sum(price)'],2). "</h2>" ?>
                          <?php
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