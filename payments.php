<html>
	<head>
		<title>Lease and Payments Page</title>
		
		<!-- css-external  -->
		<link rel='stylesheet' href="/GroupProject/css/styles.css">
		
		</head>
		
		<body>
			<h1>Cowboy Property Management</h1>
		
			<!-- Navigation Bar -->
		<ul>
  				<li><a href="homescreen.php">Home</a></li>
  				<li><a href="properties.php">Properties</a></li>
				<li><a href="leasepayments.php">Leases/Payments</a></li>
				<li><a href="maintenance.php">Maintenance</a></li>
				<li><a href="renters.php">Renters</a></li>
				<li><a href="#reports.php">Reports</a></li>
  				<li><a href="personalinformation.php">Personal Info</a></li>
  				<li><a href="leases.php">Leases & Account Info</a></li>
				<li><a href="payments.php">Payments</a></li>
				
  				<li style="float:right"><a class="active" href="logout.php">Signout</a></li>
			</ul>
		
  		<h2>Payments Page</h2>
			
   			<h4><a href="newpayment.php" class="button">Submit a new Payment</a></h4>
	

			
			
		</body>
								
		
</html>

<?php

$page_roles	= array('renter');

require_once  'dblogin.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);
// 
// 
// $result->close();
// $conn->close();






function get_post($conn, $var) {
	return $conn->real_escape_string($_POST[$var]);
}
?>
