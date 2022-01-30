
<html>
	<head>
		<title>Properties page</title>
		
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
			
			

			<h2>Renters Page</h2>
			
   			<h4><a href="newrenter.php" class="button">Enter a new Renter</a></h4>
	

			
			
		</body>
								
		
</html>


<?php

$page_roles	= array('employee');

require_once  'dblogin.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$query="SELECT * FROM renter WHERE `perspective`='0'";
$result=$conn->query($query);
if(!$result) die ($conn->error);

echo "<h3>Current Renters</h3>";
echo "<table>";
echo "<col style='width:20%'>";
echo "<col style='width:20%'>";
echo "<col style='width:20%'>";
echo "<col style='width:20%'>";
echo "<col style='width:20%'>";

echo "<tr>
<th>RENTER_ID</th>
<th>First</th>
<th>Last</th>
<th>Phone</th>
<th>Email</th>


</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['RENTER_ID'] . "</td>";
echo "<td>" . $row['First'] . "</td>";
echo "<td>" . $row['Last'] . "</td>";
echo "<td>" . $row['Phone'] . "</td>";
echo "<td>" . $row['Email'] . "</td>";
echo "</tr>";

}

echo "</table>";
echo "<br>";

$query="SELECT * FROM renter WHERE `perspective`='1'";
$result=$conn->query($query);
if(!$result) die ($conn->error);

echo "<h3>Perspective Renters</h3>";
echo "<table>";
echo "<col style='width:20%'>";
echo "<col style='width:20%'>";
echo "<col style='width:20%'>";
echo "<col style='width:20%'>";
echo "<col style='width:20%'>";

echo "<tr>
<th>RENTER_ID</th>
<th>First</th>
<th>Last</th>
<th>Phone</th>
<th>Email</th>


</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['RENTER_ID'] . "</td>";
echo "<td>" . $row['First'] . "</td>";
echo "<td>" . $row['Last'] . "</td>";
echo "<td>" . $row['Phone'] . "</td>";
echo "<td>" . $row['Email'] . "</td>";
echo "</tr>";

}

echo "</table>";
echo "<br>";

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);




$result->close();
$conn->close();




function get_post($conn, $var) {
	return $conn->real_escape_string($_POST[$var]);
	

}

?>
