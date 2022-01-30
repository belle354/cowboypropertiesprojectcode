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
		
  		
		<div class="center"><h1>New Renter Information</h1>	
			
			
	
		</body>
		
</html>

<?php


	  $page_roles = array('employee');

	  require_once 'dblogin.php';
	  require_once 'checksession.php';

	  $conn = new mysqli($hn, $un, $pw, $db);
	  if ($conn->connect_error) die($conn->connect_error);
	  

echo <<<_END
<form action="newrenter.php" method="post"
<pre>
	RENTER_ID <input type="text" name="RENTER_ID" style="width:25%;"  placeholder="100"></br></br>
	Last <input type="text" name="Last" style="width:25%;" placeholder="Doe"></br></br>
	First <input type="text" name="First" style="width:35%;" placeholder="John"></br></br>
	Phone <input type="text" name="Phone" style="width:40%;" placeholder="123-4567"></br></br>
	Email <input type="text" name="Email" style="width:35%;" placeholder="john@gmail.com"></br></br>
	Perspective <input type="text" name="Perspective" style="width:35%;" placeholder="1 or 0"></br></br>
	
	<input type="submit" name="ADD RECORD">
	</br></br>
	
</pre></form>
_END;


if(isset($_POST['RENTER_ID']) &&
	isset($_POST['Last']) &&
	isset($_POST['First']) &&
	isset($_POST['Phone']) &&
	isset($_POST['Email']) &&
	isset($_POST['Perspective'])) {
		$RENTER_ID=get_post($conn, 'RENTER_ID');
		$Last=get_post($conn, 'Last');
		$First=get_post($conn, 'First');
		$Phone=get_post($conn, 'Phone');
		$Email=get_post($conn, 'Email');
		$Perspective=get_post($conn, 'Perspective');
		
		$query="INSERT INTO renter (RENTER_ID, Last, First, Phone, Email, Perspective) VALUES ".
			"('$RENTER_ID','$Last','$First','$Phone','$Email','$Perspective')";
		$result=$conn->query($query);
		if(!$result) echo "INSERT failed <br>" .
			$conn->error . "<br><br>";
	 header("Location: renters.php");//this will return you to the view all page
	
}


$conn->close();

function get_post($conn, $var) {
	return $conn->real_escape_string($_POST[$var]);
}


	  ?>      