<html>
	<head>
		<Title>My Group web page</Title>
		
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
				<li><a href="reports.php">Reports</a></li>
  				<li><a href="personalinformation.php">Personal Info</a></li>
  				<li><a href="leases.php">Leases & Account Info</a></li>
				<li><a href="payments.php">Payments</a></li>
				
  				<li style="float:right"><a class="active" href="logout.php">Signout</a></li>
			</ul>
		<div class="center"><h1>Personal Info </h1>
  			
			
	
		</body>
		
</html>



<?php


	  $page_roles = array('renter');

	  require_once 'dblogin.php';
	  require_once 'checksession.php';

	  $conn = new mysqli($hn, $un, $pw, $db);
	  if ($conn->connect_error) die($conn->connect_error);
	  
	  if(isset($_GET['RENTER_ID'])){

		$RENTER_ID = $_GET['RENTER_ID'];
	  
	   $query = "SELECT RENTER_ID, Last, First, Phone, Email FROM Renter where  RENTER_ID =$RENTER_ID ";
	  //  $query = "SELECT * FROM Renter where RENTER_ID =$RENTER_ID ";

$result = $conn->query($query); 
if(!$result) die($conn->error);

$rows = $result->num_rows;

for($j=0; $j<$rows; $j++)
{
	//$result->data_seek($j); 
	$row = $result->fetch_array(MYSQLI_ASSOC); 

echo <<<_END

	<form action='updateRenter.php' method='post'>
	<pre>
	RENTER_ID: $row[RENTER_ID] 	
	Last: <input type='text' name='Last' value='$row[Last]'>
	First: <input type='text' name='First' value='$row[First]'>
	Phone: <input type='text' name='Phone' value='$row[Phone]'>
	Email: <input type='text' name='Email' value='$row[Email]'>
	</pre>
	
	
		<input type='hidden' name='update' value='yes'>
		<input type='hidden' name='RENTER_ID' value='$row[RENTER_ID]'>
		<input type='submit' class="button"  value='UPDATE INFORMATION'>	
	</form>
	
_END;

}

}

if(isset($_POST['update'])){
	
	$RENTER_ID = $_POST['RENTER_ID'];
	$Last = $_POST['Last'];
	$First = $_POST['First'];
	$Phone = $_POST['Phone'];
	$Email = $_POST['Email'];
	
	
	
	$query = "UPDATE renter set Last='$Last', First='$First', Phone='$Phone', Email='$Email' where RENTER_ID = $RENTER_ID ";
	
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	header("Location: personalinformation.php");
	
}
$conn->close();

function get_post($conn, $var) {
	return $conn->real_escape_string($_POST[$var]);
}

?>   