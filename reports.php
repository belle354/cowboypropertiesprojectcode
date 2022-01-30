
<html>
	<head>
		<title>Reports Page</title>
		
		<!-- css-external  -->
		<link rel='stylesheet' href="/GroupProject/css/styles.css">
		
		</head>
		
		<body>
			<h1>Cowboy Property Management</h1>
		
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
			
			

			<h2>Generate a Report</h2>
			
			<h3>Select the Desired Report</h3>
			
   			<h4><a href="rentalreport.php" class="button">Monthly Rental Collection</a></h4>
			<h4><a href="overduereport.php" class="button">Overdue Renters & Amounts</a></h4>			
			<h4><a href="maintenancereport.php" class="button">Maintenance Completed & Pending</a></h4>
			

		</body>
								
		
</html>

<?php

$page_roles	= array('employee');

require_once  'dblogin.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$query="SELECT * from Maintenance";
$result=$conn->query($query);
if(!$result) die ($conn->error);


?>
