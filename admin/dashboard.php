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
  <title>Admin dashboard</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <!-- Bargraph style -->
    <style type="text/css">
	.chart {
		display: flex;
		flex-direction: row;
		align-items: flex-end;
		justify-content: space-between;
		height: 400px;
		padding: 10px;
		box-sizing: border-box;
		background-color: #f1f1f1;
		font-family: sans-serif;
		font-size: 14px;
	}

	.bar {
		flex: 1;
		margin: 0 10px;
		background-color: #0a537a;
		color: white;
		text-align: center;
		position: relative;
		transition: height 0.5s ease;
	}

	.bar:hover {
		background-color: #3e8e41;
	}

	.bar .value {
		position: absolute;
		bottom: 0;
		left: 0;
		width: 100%;
		text-align: center;
		color: #fff;
		font-size: 14px;
		padding: 5px 0;
		box-sizing: border-box;
	}

	.month {
		flex: 1;
		text-align: center;
		margin-top: 10px;
		font-weight: bold;
	}

	.chart-title {
		text-align: center;
		font-size: 24px;
		font-weight: bold;
		margin-bottom: 20px;
	}
  .table-container {
        max-width: 70%;
        width: 50%;
    }
    #stocks-table-container {
        margin-left: 50px;
        width: 40%;
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
                       
                       $sql="SELECT * from tbl_order";
                       $result=$con-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo "<h3>" .$count; "</h3>"
                   ?>
          
              <p>Number of Orders</p>
            </div>
            <div class="icon">
              <i class="fa fa-barcode"></i>
            </div>
            <a href="inbox.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <?php
                        $sql="SELECT * from tbl_customer";
                        $result=$con-> query($sql);
                        $count=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                    
                                $count=$count+1;
                            }
                        }
                        echo "<h3>" .$count; "</h3>"
                    ?>
             
              <p>Number of Users</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="user_reports.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
        <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
            <?php
          $results = mysqli_query($con, "SELECT sum(price) FROM tbl_order WHERE DATE(date) = DATE(NOW())") or die(mysqli_error());
          while($rows = mysqli_fetch_array($results)){?>
          <?php echo "<h3> ₱".number_format_short($rows['sum(price)'],2). "</h3>" ?>
<?php
          }
        
          ?>
              <p>Todays Sales</p>
            </div>
            <div class="icon">
              <i class="fa fa-shopping-cart"></i>
            </div>
            <a href="order_reports.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

       <!-- ./col -->
     <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
            <?php
          $results = mysqli_query($con, "SELECT sum(price) FROM tbl_order") or die(mysqli_error());
          while($rows = mysqli_fetch_array($results)){?>
          <?php echo "<h3> ₱".number_format_short($rows['sum(price)'],2). "</h3>" ?>
<?php
          }
          ?>

              <p>Total Sales</p>
            </div>
            <div class="icon">
              <i class="fa fa-money"></i>
            </div>
            <a href="order_reports.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>

      <div style="display:flex">
    <div class="table-container">
        <h2 style="text-align:center">Number of orders in each product</h2>
        <table id="orders-table">
            <thead >
                <tr>
                    <th style= "	background-color: #607d8b;" >Product Name</th>
                    <th style= "	background-color: #607d8b;">Number of Orders</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Connect to database
                    
                    if (!$con) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    // Query to get number of orders for each product
                    $sql = "SELECT tbl_product.productName, COUNT(tbl_order.id) as num_orders FROM tbl_order, tbl_product WHERE tbl_order.productId = tbl_product.productId GROUP BY productName ORDER BY num_orders DESC";
                    $result = mysqli_query($con, $sql);

                    // Loop through results and display in table
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['productName'] . "</td>";
                        echo "<td>" . $row['num_orders'] . "</td>";
                        echo "</tr>";
                    }

                    // Close database connection
                    
                ?>
            </tbody>
        </table>
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

  <!-- Monthly sales report bar graph -->
  <div class="chart-container">
	<div class="chart-title">Monthly Sales Report</div>
	<div class="chart">
		<?php
			// Check connection
			if (!$con) {
			    die("Connection failed: " . mysqli_connect_error());
			}

			$months = array(
				"January", "February", "March", "April", "May", "June",
				"July", "August", "September", "October", "November", "December"
			);
			$data = array_fill_keys($months, 0);

			// Fetch the sales data from the database
			$sql = "SELECT MONTHNAME(date) as month, sum(price) as sales FROM tbl_order GROUP BY MONTH(date)";
			$result = mysqli_query($con, $sql);

			while ($row = mysqli_fetch_assoc($result)) {
				$data[$row["month"]] = $row["sales"];
			}

			// Loop through the data and output each bar
			$max_value = max($data);
			$year = date("Y");
			foreach ($months as $month) {
				$value = $data[$month];
				$height = ($value / $max_value) * 100;
				echo '<div class="bar" style="height:'.$height.'%;">
					<div class="value">&#8369; '.number_format($value).'</div>
					<div class="label">'.$month.'</div>
				</div>';
				// Reset the data array and year at the end of each year
				if ($month == "December") {
					$data = array_fill_keys($months, 0);
					$year++;
				}
			}

			   // Close database connection
         mysqli_close($con);

		?>
	</div>
</div>



<script>
    // Initialize DataTables for both tables
    $(document).ready(function() {
        $('#orders-table').DataTable();
        $('#stocks-table').DataTable();
    });
</script>

</body>
</html>
<?php include 'includes/scripts.php'; ?>

<?php include 'inc/footer.php';?>