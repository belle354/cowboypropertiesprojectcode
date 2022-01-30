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
		<div class="center"><h1>Payment Information </h1>
  			
			
	
		</body>
		
</html>

<?php


	  $page_roles = array('renter');

	  require_once 'dblogin.php';
	  require_once 'checksession.php';

	  $conn = new mysqli($hn, $un, $pw, $db);
	  if ($conn->connect_error) die($conn->connect_error);
	  

echo <<<_END
<div>
<form action="newpayment.php" method="post">

	LEASE_ID <input type="text" name="LEASE_ID" placeholder="2"></br></br>
	EMP_ID <input type="text" name="EMP_ID" placeholder="3"></br></br>
	RENTER_ID <input type="text" name="RENTER_ID" placeholder="100"></br></br>
	Date <input type="text" name="Date" placeholder="2021-01-03"></br></br>
	Period in Months <input type="text" name="Period_In_Months" placeholder="1"></br></br>
	Amount <input type="text" name="Amount" placeholder="700.00"></br></br>
	Overdue? <input type="text" name="Overdue" placeholder="Yes or No"></br></br>
	Overdue Amount <input type="text" name="Overdue_Amount" placeholder="200.00"></br></br>
	
	
	<input type="submit" class="button" name="ADD RECORD">
	</br></br>
	

</form>
</div>
_END;


if(isset($_POST['LEASE_ID']) &&
	isset($_POST['EMP_ID']) &&
	isset($_POST['RENTER_ID']) &&
	isset($_POST['Date']) &&
	isset($_POST['Period_In_Months']) &&
	isset($_POST['Overdue']) &&
	isset($_POST['Overdue_Amount']) &&
	isset($_POST['Amount'])) {
		$LEASE_ID=get_post($conn, 'LEASE_ID');
		$EMP_ID=get_post($conn, 'EMP_ID');
		$RENTER_ID=get_post($conn, 'RENTER_ID');
		$Date=get_post($conn, 'Date');
		$Period_In_Months=get_post($conn, 'Period_In_Months');
		$Amount=get_post($conn, 'Amount');
		$Overdue=get_post($conn, 'Overdue');
		$Overdue_Amount=get_post($conn, 'Overdue_Amount');
		
		$query="INSERT INTO Payment (LEASE_ID, EMP_ID, RENTER_ID, Date, Period_In_Months, Amount, Overdue, Overdue_Amount) VALUES ".
			"('$LEASE_ID','$EMP_ID','$RENTER_ID','$Date', '$Period_In_Months', '$Amount', '$Overdue', '$Overdue_Amount')";
		$result=$conn->query($query);
		if(!$result) echo "INSERT failed <br>" .
			$conn->error . "<br><br>";
		if($result) echo "Success<br>" .
			$conn->error . "<br><br>";	
	//  header("Location: payments.php");//this will return you to the view all page
	
}


$conn->close();

function get_post($conn, $var) {
	return $conn->real_escape_string($_POST[$var]);
}


	  ?>      