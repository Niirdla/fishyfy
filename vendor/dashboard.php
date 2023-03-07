<?php include 'inc/header.php';?>
<?php include 'inc/header_2.php';?>
<?php include 'includes/format.php'; ?>

<?php 
$con = mysqli_connect('localhost', 'root', '', 'db_shop');
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
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <title>Document</title>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

  <style> 
  
  #stocks-table-container {
  width: 80%;
  margin: auto;
}

#stocks-table {
  width: 100%;
  border-collapse: collapse;
}

#stocks-table th, #stocks-table td {
  padding: 10px;
  text-align: left;
  border: 1px solid #ddd;
}

#stocks-table th {
  background-color: #607d8b;
  color: #fff;
}

#stocks-table tbody tr:hover {
  background-color: #f5f5f5;
}

#stocks-table tbody td {
  font-size: 16px;
}
  </style>
</head>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<body>

   
                <div class="block"> 
                    
                <section class="content">
         <!-- ./col -->
         <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
            <?php
                       
                       $sql="SELECT * from tbl_product";
                       $result=$con-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo "<h3>" .$count; "</h3>"
                   ?>
          
              <p>Number of Items/Products</p>
            </div>
            <div class="icon">
              <i class="fa fa-barcode"></i>
            </div>
            <a href="productlist.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <?php
                        $sql="SELECT * from tbl_product where productId";
                        $result=$con-> query($sql);
                        $count=0;
                        if ($result-> num_rows > 0){
                      
                            while ($row=$result-> fetch_assoc()) {
                              if($row['stocks'] <= 50){
                                $count=$count+1;
                            }
                          }
                        }
                        echo "<h3>" .$count; "</h3>"
                    ?>
             
              <p>Items with 50 stocks below</p>
            </div>
            <div class="icon">
              <i class="fa fa-barcode"></i>
            </div>
            <a href="item_reports.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
        <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
            <?php
                       
                       $sql="SELECT * from tbl_category";
                       $result=$con-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo "<h3>" .$count; "</h3>"
                   ?>
              <p>Number of Categories</p>
            </div>
            <div class="icon">
              <i class="fa fa-barcode"></i>
            </div>
            <a href="catlist.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

       <!-- ./col -->
     <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
            <?php
                       
                       $sql="SELECT * from tbl_brand";
                       $result=$con-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo "<h3>" .$count; "</h3>"
                   ?>

              <p>Number of Brands</p>
            </div>
            <div class="icon">
            <i class="fa fa-barcode"></i>
            </div>
            <a href="brandlist.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div id="stocks-table-container">
        <h2 style="text-align:center">Products with stocks less than 50</h2>
        <table id="stocks-table">
            <thead>
                <tr>
                    <th style= "	background-color: #607d8b;">Product Name</th>
                    <th style= "	background-color: #607d8b;">Stocks</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    
                    if (!$con) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    // Query to get products with stocks less than 50
                    $sql = "SELECT productName, stocks FROM tbl_product WHERE stocks < 50";
                    $result = mysqli_query($con, $sql);

                    // Loop through results and display in table
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['productName'] . "</td>";
                        echo "<td>" . $row['stocks'] . "</td>";
                        echo "</tr>";
                    }

                 
                ?>
            </tbody>
        </table>
    </div>
      </div>

      <script>
    // Initialize DataTables for both tables
    $(document).ready(function() {
      
        $('#stocks-table').DataTable();
    });
</script>
   
</body>
</html>
<?php include 'inc/footer.php';?>
<?php include 'includes/scripts.php'; ?>