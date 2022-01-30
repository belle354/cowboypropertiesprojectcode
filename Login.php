
<?php


require_once 'dblogin.php';
require_once 'User.php';
$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if (isset($_POST['username']) && isset($_POST['password'])) {
	
	//Get values from login screen
	$tmp_username = mysql_entities_fix_string($conn, $_POST['username']);
	$tmp_password = mysql_entities_fix_string($conn, $_POST['password']);
	
	//get password from DB w/ SQL
	$query = "SELECT password FROM users WHERE username = '$tmp_username'";
	
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	$rows = $result->num_rows;
	$passwordFromDB="";
	for($j=0; $j<$rows; $j++)
	{
		$result->data_seek($j); 
		$row = $result->fetch_array(MYSQLI_ASSOC);
		$passwordFromDB = $row['password'];
	
	}
	
	//Compare passwords
	if(password_verify($tmp_password,$passwordFromDB))
	{
		// echo "successful login<br>";
		
		$user = new User($tmp_username);

		session_start();
		$_SESSION['user'] = $user;
		
		 header('Location: Homescreen.php');
	}
	else
	{
		echo "login error, try again.<br>";
	}	
	
}

$conn->close();


//sanitization functions
function mysql_entities_fix_string($conn, $string){
	return htmlentities(mysql_fix_string($conn, $string));	
}

function mysql_fix_string($conn, $string){
	$string = stripslashes($string);
	return $conn->real_escape_string($string);
}



?>

<html>
	<head>
		<title>Login Page</title>
		
		<!-- css-external  -->
		<link rel='stylesheet' href="/GroupProject/css/login.css">
		
		</head>
		
		<body>
			
	<h2>Login Form</h2>

			<form action="/Groupproject/Login.php" method="post">
			  <div class="imgcontainer">
				<img src="/GroupProject/images/building.png" alt="Avatar" class="avatar">
			  </div>

			  <div class="container">
				<label for="uname"><b>Username</b></label>
				<input type="text" placeholder="Enter Username" name='username' required>

				<label for="psw"><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name='password' required>
		
				<button type="submit">Login</button>
				
			  </div>

			  

			</form>
			
			
		</body>
								
		
</html>


















