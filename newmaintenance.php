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
				<li><a href="#reports.php">Reports</a></li>
  				<li><a href="personalinformation.php">Personal Info</a></li>
  				<li><a href="leases.php">Leases & Account Info</a></li>
				<li><a href="payments.php">Payments</a></li>
				
  				<li style="float:right"><a class="active" href="logout.php">Signout</a></li>
			</ul>
		
  		
		<div class="center"><h1>New Maintenance Request Information </h1>	
			
			
	
		</body>
		
</html>

<?php


	  $page_roles = array('renter', 'employee');

	  require_once 'dblogin.php';
	  require_once 'checksession.php';

	  $conn = new mysqli($hn, $un, $pw, $db);
	  if ($conn->connect_error) die($conn->connect_error);
	  

echo <<<_END
<form action="newmaintenance.php" method="post"
<pre>
	UNIT_ID <input type="text" name="UNIT_ID" style="width:25%;"  placeholder="100"></br></br>
	EMP_ID <input type="text" name="EMP_ID" style="width:25%;" placeholder="3"></br></br>
	Date <input type="text" name="Date" style="width:35%;" placeholder="2021-04-14"></br></br>
	Issue <input type="text" name="Issue" style="width:40%;" placeholder="Leaking Faucet"></br></br>
	
	<input type="submit" name="ADD RECORD">
	</br></br>
	
</pre></form>
_END;


if(isset($_POST['UNIT_ID']) &&
	isset($_POST['EMP_ID']) &&
	isset($_POST['Date']) &&
	isset($_POST['Issue'])) {
		$UNIT_ID=get_post($conn, 'UNIT_ID');
		$EMP_ID=get_post($conn, 'EMP_ID');
		$Date=get_post($conn, 'Date');
		$Issue=get_post($conn, 'Issue');
		
		$query="INSERT INTO maintenance (UNIT_ID, EMP_ID, Date, Issue) VALUES ".
			"('$UNIT_ID','$EMP_ID','$Date','$Issue')";
		$result=$conn->query($query);
		if(!$result) echo "INSERT failed <br>" .
			$conn->error . "<br><br>";
	 header("Location: maintenance.php");//this will return you to the view all page
	
}


$conn->close();

function get_post($conn, $var) {
	return $conn->real_escape_string($_POST[$var]);
}


	  ?>      