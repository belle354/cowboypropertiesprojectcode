
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
			
			

			<h2>Maintenance Page</h2>
			
   			<h4><a href="newmaintenance.php" class="button">Submit a new Request</a></h4>
	

			
			
		</body>
								
		
</html>

<?php

$page_roles	= array('employee', 'renter');

require_once  'dblogin.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$query="SELECT * from Maintenance";
$result=$conn->query($query);
if(!$result) die ($conn->error);

echo "<h3>Active Maintenance Request</h3>";
echo "<table>
<tr>
<th>ID</th>
<th>UNIT_ID</th>
<th>EMP_ID</th>
<th>Date</th>
<th>Issue</th>
<th>Status</th>

</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['ID'] . "</td>";
// echo "<td><a href='updateMaintenance.php?ID=$row[ID]'>$row[ID]</a> </td>";
echo "<td>" . $row['UNIT_ID'] . "</td>";
echo "<td>" . $row['EMP_ID'] . "</td>";
echo "<td>" . $row['Date'] . "</td>";
echo "<td>" . $row['Issue'] . "</td>";
echo "<td>" . $row['Status'] . "</td>";
echo "</tr>";

}


$result->close();
$conn->close();






function get_post($conn, $var) {
	return $conn->real_escape_string($_POST[$var]);
}


?>
