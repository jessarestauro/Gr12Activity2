<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$id = $_POST['id'];
	$FirstName = $_POST['efirstname'];
	$LastName= $_POST['elastname'];
	$Gender= $_POST['egender'];
	$Department = $_POST['edepartment'];
	$Dateemployed= $_POST['edateemployed'];
	$Salary= $_POST['esalary'];
		
	// checking empty fields
	if(empty($id) || empty($FirstName) || empty($LastName) || empty($Gender) || empty($Department ) || empty($Dateemployed) || empty($Salary)){
				
		if(empty($FirstName)) {
			echo "<font color='red'>FirstName field is empty.</font><br/>";
		}
		
		if(empty($LastName)) {
			echo "<font color='red'>LastName field is empty.</font><br/>";
		}
		
		if(empty($Gender)) {
			echo "<font color='red'>Gender field is empty.</font><br/>";
		}
		
		if(empty($Department)) {
			echo "<font color='red'>Department field is empty.</font><br/>";
		}

		if(empty($Dateemployed)) {
			echo "<font color='red'>Dateemployed field is empty.</font><br/>";
		}
		if(empty($Salary)) {
			echo "<font color='red'>Salary field is empty.</font><br/>";
		}
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database		
		$sql = "INSERT INTO tbl_employees(efirstname, elastname, egender, edepartment, edateemployed, esalary,) VALUES(:efirstname, :elastname, :elastname, :edepartment, :edateemployed, :esalary)";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':id', $id);
		$query->bindparam(':efirstname', $FirstName);
		$query->bindparam(':elastname', $LastName);
		$query->bindparam(':egender', $Gender);
		$query->bindparam(':edepartment', $Department);
		$query->bindparam(':edateemployed', $Dateemployed);
		$query->bindparam(':esalary', $Salary);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':name' => $name, ':email' => $email, ':age' => $age));
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
