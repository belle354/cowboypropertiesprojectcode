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
			
			<h3>Payments that are Overdue</h3>
			
		</body>		
		
</html>

<?php

$page_roles	= array('employee');

require_once  'dblogin.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$query="SELECT * FROM Payment WHERE `Overdue`='Yes'";
$result=$conn->query($query);
if(!$result) die ($conn->error);

echo "<table>
<tr>
<th>PAYMENT_ID</th>
<th>LEASE_ID</th>
<th>EMP_ID</th>
<th>RENTER_ID</th>
<th>Date</th>
<th>Overdue_Amount</th>

</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['PAYMENT_ID'] . "</td>";
echo "<td>" . $row['LEASE_ID'] . "</td>";
echo "<td>" . $row['EMP_ID'] . "</td>";
echo "<td>" . $row['RENTER_ID'] . "</td>";
echo "<td>" . $row['Date'] . "</td>";
echo "<td>" . $row['Overdue_Amount'] . "</td>";
echo "</tr>";

}

echo "<br>";


$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);




$result->close();
$conn->close();






function get_post($conn, $var) {
	return $conn->real_escape_string($_POST[$var]);
}


?>
