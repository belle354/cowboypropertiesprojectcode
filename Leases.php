
<html>
	<head>
		<title>Lease and Account Info page</title>
		
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
			
			

			<h2>Lease and Account Info Page</h2>
			
			
			
		</body>
								
		
</html>

<?php

$page_roles	= array('renter');

require_once  'dblogin.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$query="SELECT *  FROM lease where renter_ID =106";
$result=$conn->query($query);
if(!$result) die ($conn->error);

echo "<h3>Lease Information</h3>";
echo "<table>
<tr>
<th>LEASE_ID</th>
<th>UNIT_ID</th>
<th>EMP_ID</th>
<th>Price</th>
<th>Period</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['LEASE_ID'] . "</td>";
echo "<td>" . $row['UNIT_ID'] . "</td>";
echo "<td>" . $row['EMP_ID'] . "</td>";
echo "<td>" . $row['Price'] . "</td>";
echo "<td>" . $row['Period'] . "</td>";

echo "</tr>";
}
echo "</table>";

$query="SELECT * from users where username ='pjones'";
$result=$conn->query($query);
if(!$result) die ($conn->error);

echo "<h3>User Account Info</h3>";
echo "<table>
<tr>
<th>forename</th>
<th>surname</th>
<th>username</th>
<th>password</th>



</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['forename'] . "</td>";
echo "<td>" . $row['surname'] . "</td>";
echo "<td>" . $row['username'] . "</td>";
echo "<td>" . $row['password'] . "</td>";

echo "</tr>";
}
echo "</table>";


$result->close();
$conn->close();

function get_post($conn, $var) {
	return $conn->real_escape_string($_POST[$var]);
}


?>
