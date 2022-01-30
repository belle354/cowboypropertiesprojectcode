
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
				<li><a href="#reports.php">Reports</a></li>
  				<li><a href="personalinformation.php">Personal Info</a></li>
  				<li><a href="leases.php">Leases & Account Info</a></li>
				<li><a href="payments.php">Payments</a></li>
				
  				<li style="float:right"><a class="active" href="logout.php">Signout</a></li>
			</ul>
			
			

			<h2>Properties Page</h2>
			
			
			
		</body>
								
		
</html>

<?php

$page_roles	= array('employee');

require_once  'dblogin.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$query="SELECT p.PROPERTY_ID, u.UNIT_ID, u.UNIT_NUMBER, u.Bed, u.Bath, u.Price, p.Address, p.Manager  FROM Property p inner join Unit u on p.PROPERTY_ID = u.PROPERTY_ID where u.available =1";
$result=$conn->query($query);
if(!$result) die ($conn->error);

echo "<h3>Available Properties</h3>";
echo "<table>
<tr>
<th>Property_id</th>
<th>UNIT_ID</th>
<th>UNIT_NUMBER</th>
<th>Bed</th>
<th>Bath</th>
<th>Price</th>
<th>Address</th>
<th>Manager</th>


</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['PROPERTY_ID'] . "</td>";
echo "<td>" . $row['UNIT_ID'] . "</td>";
echo "<td>" . $row['UNIT_NUMBER'] . "</td>";
echo "<td>" . $row['Bed'] . "</td>";
echo "<td>" . $row['Bath'] . "</td>";
echo "<td>" . $row['Price'] . "</td>";
echo "<td>" . $row['Address'] . "</td>";
echo "<td>" . $row['Manager'] . "</td>";
echo "</tr>";
}
echo "</table>";

$query="SELECT p.PROPERTY_ID, u.UNIT_ID, u.UNIT_NUMBER, u.Bed, u.Bath, u.Price, p.Address, p.Manager  FROM Property p inner join Unit u on p.PROPERTY_ID = u.PROPERTY_ID where u.available =0";
$result=$conn->query($query);
if(!$result) die ($conn->error);

echo "<h3>Rented Properties</h3>";
echo "<table>
<tr>
<th>Property_id</th>
<th>UNIT_ID</th>
<th>UNIT_NUMBER</th>
<th>Bed</th>
<th>Bath</th>
<th>Price</th>
<th>Address</th>
<th>Manager</th>


</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['PROPERTY_ID'] . "</td>";
echo "<td>" . $row['UNIT_ID'] . "</td>";
echo "<td>" . $row['UNIT_NUMBER'] . "</td>";
echo "<td>" . $row['Bed'] . "</td>";
echo "<td>" . $row['Bath'] . "</td>";
echo "<td>" . $row['Price'] . "</td>";
echo "<td>" . $row['Address'] . "</td>";
echo "<td>" . $row['Manager'] . "</td>";
echo "</tr>";
}
echo "</table>";


$result->close();
$conn->close();

function get_post($conn, $var) {
	return $conn->real_escape_string($_POST[$var]);
}


?>
