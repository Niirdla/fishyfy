<?php
// Get the order ID from the POST data
$orderId = $_POST['orderId'];

$con = mysqli_connect("localhost", "root", "", "db_shop");

// Check for errors in the connection
if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

$query = "SELECT tbl_order.*,tbl_order.id as orderId, payment.*,payment.id as paymentId, tbl_customer.id as cmrId,tbl_customer.*  FROM tbl_order, payment, tbl_customer WHERE payment.id = '$orderId' AND tbl_order.cmrId = payment.cmrId AND payment.orderId = tbl_order.id  AND tbl_customer.id = tbl_order.cmrId";
$query_run = mysqli_query($con, $query);

// Check for errors in the query
if (!$query_run) {
    die("Error in query: " . mysqli_error($con));
}

if (mysqli_num_rows($query_run) > 0) {
    $output = "";
    foreach ($query_run as $row) {     
        if($row['paymentMethod'] == "Cash on Delivery"){
            echo '<style>.Payment {display: none;}</style>';
            echo '<style>.ProofP {display: none;}</style>';
        }
       
        // Customer information
        $output .= "<h2><strong> Customer details</strong></h2>";
        $output .= "<p><strong>Customer ID:</strong> " . $row['cmrId'] . "</p>";
        $output .= "<p><strong> Customer Name:</strong> " . $row['first_name'] ." " . $row['last_name'] . "</p>";
        $output .= "<p><strong> Email:</strong> " . $row['email'] . "</p>";
        $output .= "<p><strong> Phone #:</strong> " . $row['phone'] . "</p>";
        $output .= "<p><strong> Address:</strong> " . $row['address'] . "</p>";
        $output .= "<p><strong> City:</strong> " . $row['city'] . "</p>";
        $output .= "<p><strong> ZIP:</strong> " . $row['zip'] . "</p>";
        // Order information
        $output .= "<h2><strong> Order details</strong></h2>";
        $output .=  "<img src='" . $row['image'] . "' alt='Proof of payment' height='500px' width='565px'>";
        $output .= "<p><strong>Order ID:</strong> " . $row['orderId'] . "</p>";
        $output .= "<p><strong>Product Name:</strong> " . $row['productName'] . "</p>";
        $output .= "<p><strong>Quantity:</strong> " . $row['quantity'] . "</p>";
        $output .= "<p><strong>Total Price:</strong> " . $row['price'] . "</p>";
        // Payment information
        $output .= "<h2><strong> Payment details</strong></h2>";
        $output .= "<p><strong>Payment ID:</strong> " . $row['paymentId'] . "</p>";
        $output .= "<p><strong>Price to pay:</strong> " . $row['price'] . "</p>";
        $output .= "<p><strong> Payment Method:</strong> " . $row['paymentMethod'] . "</p>";
        $output .= "<p class = ProofP ><strong> Proof of Payment:</strong></p>";
        $output .=  "<img class=Payment src='../" . $row['proofOfPayment'] . "' alt='Cash on Delivery' height='500px' width='565px'>";
        // Add additional fields here as needed
    }

    echo $output;
}

// Close the database connection
mysqli_close($con);
?>