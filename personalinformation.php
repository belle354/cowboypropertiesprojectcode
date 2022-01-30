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
	   $query = "SELECT RENTER_ID, Last, First, Phone, Email FROM Renter where first in (select forename from users)";
	    // $query = "SELECT RENTER_ID, Last, First, Phone, Email FROM Renter";
	   //  $query = "SELECT * FROM Renter";

$result = $conn->query($query); 
if(!$result) die($conn->error);

$rows = $result->num_rows;

for($j=0; $j<$rows; $j++)
{
	//$result->data_seek($j); 
	$row = $result->fetch_array(MYSQLI_ASSOC); 

echo <<<_END
	<pre>
	RENTER_ID: <a href='updateRenter.php?RENTER_ID=$row[RENTER_ID]'>$row[RENTER_ID]</a> 	
	Last: $row[Last]
	First: $row[First]
	Phone: $row[Phone]
	Email: $row[Email]
	</pre>
	
	<form action='updateRenter.php' method='post'>
		<input type='hidden' name='delete' value='yes'>
		<input type='hidden' name='RENTER_ID' value='$row[RENTER_ID]'>
		
		
	</form>
	
_END;

}
	  
// $query = "SELECT `RENTER_ID`, `Last`, `First`, `Phone`, `Email`, `perspective` FROM `Renter` where first in (select forename from users)";	  
// // $query = "Select r.RENTER_ID, r.Last, r.First r.phone, r.email, u.username from renter r inner join users u on r.First=u.forename";
// 
// $result = $conn->query($query); 
// if(!$result) die($conn->error);
// 
// $rows = $result->num_rows;
// 
// for($j=0; $j<$rows; $j++)
// {
// 	//$result->data_seek($j); 
// 	$row = $result->fetch_array(MYSQLI_ASSOC); 
// 
// echo <<<_END
// 	<pre>
// 	Last: $row[RENTER_ID]</a>
// 	First: $row[Last]
// 	Phone: $row[First]
// 	Email: $row[Phone]
// 	RENTER_ID: $row[Email]	
// 	</pre>
// 	
// 	<form action='deleteRecord.php' method='post'>
// 		<input type='hidden' name='delete' value='yes'>
// 		<input type='hidden' name='RENTER_ID' value='$row[RENTER_ID]'>
// 		<input type='submit' value='UPDATE RECORD'>	
// 	</form>
// 	
// _END;
// 
// }
// echo <<<_END
// <div>
// <form action="personalinformation.php" method="post">
// 
// 	RENTER_ID <input type="text" name="RENTER_ID" value= $RENTER_ID  ></br></br>
// 	Last <input type="text" name="Last" placeholder="Simpson"></br></br>
// 	First <input type="text" name="First" placeholder="Marge"></br></br>
// 	Phone <input type="text" name="Phone" placeholder="123-4567"></br></br>
// 	Email<input type="text" name="Email" placeholder="Myemail@gmail.com"></br></br>
// 	Perspective <input type="text" name="Perspective" placeholder="0"></br></br>
// 	
// 	
// 	
// 	<input type="submit" class="button" name="ADD RECORD">
// 	</br></br>
// 	
// 
// </form>
// </div>
// _END;
// 
// 
// if(isset($_POST['RENTER_ID']) &&
// 	isset($_POST['Last']) &&
// 	isset($_POST['First']) &&
// 	isset($_POST['Phone']) &&
// 	isset($_POST['Email']) &&
// 	isset($_POST['perspective']) ) {
// 	
// 		$RENTER_ID=get_post($conn, 'RENTER_ID');
// 		$Last=get_post($conn, 'Last');
// 		$First=get_post($conn, 'First');
// 		$Phone=get_post($conn, 'Phone');
// 		$Email=get_post($conn, 'Email');
// 		$perspective=get_post($conn, 'perspective');
// 	
// 		
// 		$query="INSERT INTO Payment (RENTER_ID, Last, First, Phone, Email, perspective) VALUES ".
// 			"('$RENTER_ID','$Last','$First','$Phone', '$Email', '$perspective')";
// 		$result=$conn->query($query);
// 		if(!$result) echo "INSERT failed <br>" .
// 			$conn->error . "<br><br>";
// 		if($result) echo "Success<br>" .
// 			$conn->error . "<br><br>";	
// 	
// 	
// }


$conn->close();

function get_post($conn, $var) {
	return $conn->real_escape_string($_POST[$var]);
}


	  ?>      