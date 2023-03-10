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
  <link rel="stylesheet" type="text/css" href="print.css" media="print" />
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
                                  
                                }
                            ?>
                            </tbody>
                        </table>
                        <div class = "total sales">
                        <?php
                        if(isset($from_date)&& isset($to_date)){
                        $results = mysqli_query($con, "SELECT sum(price) FROM tbl_order where id AND date BETWEEN '$from_date' AND '$to_date' ") or die(mysqli_error());
                                    while($rows = mysqli_fetch_array($results)){?>
                                    <?php echo "<h2>Total Sales between this date = ₱".number_format_short($rows['sum(price)'],2). "</h2>" ?>
                          <?php
                                    }}
?>
</div>

<?php 
 if(isset($from_date)&& isset($to_date)){
$results = mysqli_query($con, "SELECT sum(price) FROM tbl_order where id AND date BETWEEN '$from_date' AND '$to_date' ") or die(mysqli_error());
while($rows = mysqli_fetch_array($results)){
    $total_sales = $rows['sum(price)'];
}}
?>
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
function tablePrint() {
    var display_setting = "toolbar=no,location=no,directories=no,menubar=no,";
display_setting += "scrollbars=no,width=1000,height=800,left=100,top=25";
display_setting += ",chrome://flags/#enable-modern-print-preview";
  // create the image element
  var img = document.createElement("img");
  img.src = "assets/img/aacaquaticslogo.png"; // replace image_url with the URL of your image

  // get the h1 element and insert the image at the top
  var h1 = document.querySelector("h1");
  h1.insertBefore(img, h1.firstChild);

  // add a listener to update the position of the admin name and prepared by before printing
  window.addEventListener("beforeprint", function () {
    // set the position of the admin name and prepared by to fixed at the bottom of the page
    var adminNameContainer = document.getElementById("adminNameContainer");
    adminNameContainer.style.position = "fixed";
    adminNameContainer.style.bottom = "0";
    var preparedByContainer = document.getElementById("preparedByContainer");
    preparedByContainer.style.position = "fixed";
    preparedByContainer.style.bottom = "40px";

    // check if the admin name and prepared by are below the current page
    var adminNamePosition = adminNameContainer.offsetTop;
    var preparedByPosition = preparedByContainer.offsetTop;

    if (
      adminNamePosition > window.innerHeight ||
      preparedByPosition > window.innerHeight
    ) {
      // move the admin name and prepared by to the next page
      var nextPageDiv = document.createElement("div");
      nextPageDiv.style.pageBreakBefore = "always";
      nextPageDiv.appendChild(adminNameContainer);
      nextPageDiv.appendChild(preparedByContainer);
      document.body.appendChild(nextPageDiv);
    }
  });

  // remove the about section and create the table HTML content
  var content_innerhtml =
    '<div class="col-md-12">' +
    '<div class="page-header" style="text-align:center;">' +
    "<h1>Order Reports</h1>" +
    "</div>" +
    '<table id="myTable"class="data display datatable print-table" style="text-align:center;">' +
    document.querySelector("#printout table").innerHTML +
    "</table>" +
    '<div id="adminNameContainer">' +
    '<div id="adminName" style="text-align:right; margin-bottom: 100px;">' +
    "</div>" +
    "</div>" +
    
    '<div class="total_sales">Total Sales: ' + <?php echo $total_sales; ?> + '</div>' +
  
    '<div id="preparedByContainer">' +
    '<div id="preparedBy" style="text-align:right; margin-bottom: 20px;">' +
    '<?php echo Session::get("adminName"); ?>' +
    "<br>Prepared By " +
    "</div>" +
    "</div>" +
    "</div>";

  // create the print window and write the content to it
  var document_print = window.open("", "", display_setting);
  document_print.document.open();
  document_print.document.write(
    '<html><head><style>@media print {#about {display:none;}}</style></head><body style="font-family:Calibri(body);font-size:16px;" onLoad="self.print();self.close();" >'
  );
  document_print.document.write(content_innerhtml);
  document_print.document.write("</body></html>");
  document_print.document.close();

  return false;
}
		

		
</script>

</body>
</html>               
<?php include 'inc/footer.php';?>
<?php include 'includes/scripts.php'; ?>