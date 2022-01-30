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

$query="SELECT * FROM Maintenance WHERE `status`='pending'";
$result=$conn->query($query);
if(!$result) die ($conn->error);

echo "<h3>Pending Maintenance Requests</h3>";
echo "<table>";
echo "<col style='width:20%'>";
echo "<col style='width:20%'>";
echo "<col style='width:20%'>";
echo "<col style='width:20%'>";
echo "<col style='width:20%'>";

echo "<tr>
<th>ID</th>
<th>UNIT_ID</th>
<th>EMP_ID</th>
<th>Date</th>
<th>Issue</th>

</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['ID'] . "</td>";
echo "<td>" . $row['UNIT_ID'] . "</td>";
echo "<td>" . $row['EMP_ID'] . "</td>";
echo "<td>" . $row['Date'] . "</td>";
echo "<td>" . $row['Issue'] . "</td>";
echo "</tr>";

}
echo "</table>";

echo "<br>";

$query="SELECT * FROM Maintenance WHERE `status`='new'";
$result=$conn->query($query);
if(!$result) die ($conn->error);

echo "<h3>New Maintenance Requests</h3>";
echo "<table>";
echo "<col style='width:20%'>";
echo "<col style='width:20%'>";
echo "<col style='width:20%'>";
echo "<col style='width:20%'>";
echo "<col style='width:20%'>";

echo "<tr>
<th>ID</th>
<th>UNIT_ID</th>
<th>EMP_ID</th>
<th>Date</th>
<th>Issue</th>


</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['ID'] . "</td>";
echo "<td>" . $row['UNIT_ID'] . "</td>";
echo "<td>" . $row['EMP_ID'] . "</td>";
echo "<td>" . $row['Date'] . "</td>";
echo "<td>" . $row['Issue'] . "</td>";

echo "</tr>";

}

echo "</table>";
echo "<br>";

$query="SELECT * FROM Maintenance WHERE `status`='Complete'";
$result=$conn->query($query);
if(!$result) die ($conn->error);

echo "<h3>Completed Maintenance Requests</h3>";
echo "<table>";
echo "<col style='width:20%'>";
echo "<col style='width:20%'>";
echo "<col style='width:20%'>";
echo "<col style='width:20%'>";
echo "<col style='width:20%'>";

echo "<tr>
<th>ID</th>
<th>UNIT_ID</th>
<th>EMP_ID</th>
<th>Date</th>
<th>Issue</th>


</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['ID'] . "</td>";
echo "<td>" . $row['UNIT_ID'] . "</td>";
echo "<td>" . $row['EMP_ID'] . "</td>";
echo "<td>" . $row['Date'] . "</td>";
echo "<td>" . $row['Issue'] . "</td>";
echo "</tr>";

}
echo "</table>";



$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);




$result->close();
$conn->close();






function get_post($conn, $var) {
	return $conn->real_escape_string($_POST[$var]);
}


?>
