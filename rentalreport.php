<html>
	<head>
		<title>My Group web page</title>
		
		<!-- css-external  -->
		<link rel='stylesheet' href="/GroupProject/css/styles.css">
		
		</head>
		
		<body>
			<h1>Cowboy Property Management</h1>
		
		
			<!-- Navigation Bar -->
			<ul>
  				<li><a href="reports.php">Back</a></li>
  				<!-- <li><a href="#reports">Reports</a></li> -->
  				
			</ul>

			
			<h2>Generated Report</h2>
			<h2><button onclick="window.print()">Print This 			Page</button></h2>
		
				 
		</body>
		

</html>

<?php

$page_roles	= array('employee');

require_once  'dblogin.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$query="SELECT * FROM Payment WHERE `Period_In_Months`='1'";
$result=$conn->query($query);
if(!$result) die ($conn->error);

echo "<h3>Collections Every Month</h3>";
echo "<table>";
echo "<col style='width:20%'>";
echo "<col style='width:20%'>";
echo "<col style='width:20%'>";
echo "<col style='width:20%'>";
echo "<col style='width:20%'>";

echo "<tr>
<th>PAYMENT_ID</th>
<th>LEASE_ID</th>
<th>EMP_ID</th>
<th>RENTER_ID</th>
<th>Amount</th>


</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['PAYMENT_ID'] . "</td>";
echo "<td>" . $row['LEASE_ID'] . "</td>";
echo "<td>" . $row['EMP_ID'] . "</td>";
echo "<td>" . $row['RENTER_ID'] . "</td>";
echo "<td>" . $row['Amount'] . "</td>";
echo "</tr>";

}

echo "</table>";
echo "<br>";

$query="SELECT * FROM Payment WHERE `Period_In_Months`='2'";
$result=$conn->query($query);
if(!$result) die ($conn->error);

echo "<h3>Collections Every 2 Months</h3>";
echo "<table>";
echo "<col style='width:20%'>";
echo "<col style='width:20%'>";
echo "<col style='width:20%'>";
echo "<col style='width:20%'>";
echo "<col style='width:20%'>";

echo "<tr>
<th>PAYMENT_ID</th>
<th>LEASE_ID</th>
<th>EMP_ID</th>
<th>RENTER_ID</th>
<th>Amount</th>


</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['PAYMENT_ID'] . "</td>";
echo "<td>" . $row['LEASE_ID'] . "</td>";
echo "<td>" . $row['EMP_ID'] . "</td>";
echo "<td>" . $row['RENTER_ID'] . "</td>";
echo "<td>" . $row['Amount'] . "</td>";
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
