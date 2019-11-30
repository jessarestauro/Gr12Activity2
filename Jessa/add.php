<html>
<head>
	<title>Add Data</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>

<body>
	<center>
<?php
//including the database connection file
include_once("config.php");


if(isset($_POST['Submit'])) {	
	$Fname = $_POST['name'];
	$Username = $_POST['user'];
	$Password = $_POST['pass'];



		
	// checking empty fields
	if(empty($Fname) || empty($Username) || empty($Password)) {
				
		if(empty($Fname)) {
			echo "<font color='red'>Full Name field is empty.</font><br/>";
		}
		
		if(empty($Username)) {
			echo "<font color='red'>Username field is empty.</font><br/>";
		}
		
		if(empty($Password)) {
			echo "<font color='red'>Password field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database		
		$sql = "INSERT INTO users(name, user, pass) VALUES(:name, :user, :pass)";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':name', $Fname);
		$query->bindparam(':user', $Username);
		$query->bindparam(':pass', $Password);
		$query->execute();

		
		// Alternative to above bindparam and execute
		// $query->execute(array(':name' => $name, ':email' => $email, ':age' => $age));
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php' class='btn btn-success'>View Result</a>";
	}
}


?>
</center>
</body>
</html>
