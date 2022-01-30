<html>
	<head>
		<title>My Group web page</title>
		
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
				<li><a href="reports.php">Reports</a></li>
  				<li><a href="personalinformation.php">Personal Info</a></li>
  				<li><a href="leases.php">Leases & Account Info</a></li>
				<li><a href="payments.php">Payments</a></li>
				
  				<li style="float:right"><a class="active" href="logout.php">Signout</a></li>
			</ul>
	
<div class="center">				
	<p> Welcome to the your Cowboy Property Management Dashboard! 
	</p>
			<!-- 
<style>
				.center {
				  font-size: 18;
				  text-align: center;
				  margin:0;
				  width: 60%;
				  border: 3px solid #9c8cca;
				  padding: 10px;
				  position: absolute;
				  top: 30%;
				  -ms-transform: translateY(-30%);
				  transform: translateY(-30%);
				  -ms-transform: translateX(30%);
				  transform: translateX(30%);
				  color: black;
				  background-color: #f6f6f6;
				}
				</style>		
 -->
			
		</body>
								
</html>

<?php

$page_roles = array('employee','renter');

require_once 'dblogin.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);
	
?>