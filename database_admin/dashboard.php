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
          
              <p>Number of Products</p>
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
            <a href="userlist.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
      <?php 
  $query = mysqli_query($con, "SELECT MONTHNAME(date) as monthname, sum(price) as amount FROM tbl_order GROUP BY monthname") or die(mysqli_error());
  
  foreach($query as $data)
  {
    $month[] = $data['monthname'];
    $amount[] = $data['amount'];
  }

?>
<div style="width: 1200px;">
  <canvas id="myChart"></canvas>
</div>
      </section>
      <!-- right col -->
      </div>      


        <script>
  // === include 'setup' then 'config' above ===
  const labels = <?php echo json_encode($month) ?>;
  const data = {
    labels: labels,
    datasets: [{
      label: 'Monthly Sales Report',
      data: <?php echo json_encode($amount) ?>,
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(201, 203, 207, 0.2)'
      ],
      borderColor: [
        'rgb(255, 99, 132)',
        'rgb(255, 159, 64)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(54, 162, 235)',
        'rgb(153, 102, 255)',
        'rgb(201, 203, 207)'
      ],
      borderWidth: 1
    }]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    },
  };

  var myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>
</body>
</html>
<?php include 'inc/footer.php';?>
<?php include 'includes/scripts.php'; ?>