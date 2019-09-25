<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$eFirstName = $_POST['eFirstName'];
	$eLastName = $_POST['eLastName'];
	$eGender = $_POST['eGender'];
	$eDepartment = $_POST['eDepartment'];
	$eDateEmployed = $_POST['eDateEmployed'];
	$eSalary = $_POST['eSalary'];
		
	// checking empty fields
	if(empty($eFirstName) || empty($eLastName) || empty($eGender) || empty($eDepartment) || empty($eDateEmployed) || empty($eSalary)) {
				
		if(empty($eFirstName)) {
			echo "<font color='red'>First Name field is empty.</font><br/>";
		}
		
		if(empty($eLastName)) {
			echo "<font color='red'>Last Name field is empty.</font><br/>";
		}
		
		if(empty($eGender)) {
			echo "<font color='red'>Gender field is empty.</font><br/>";
		}
					
		if(empty($eDepartment)) {
			echo "<font color='red'>Department field is empty.</font><br/>";
		}
		
		if(empty($eDateEmployed)) {
			echo "<font color='red'>Date Employed field is empty.</font><br/>";
		}
		
		if(empty($eSalary)) {
			echo "<font color='red'>Salary field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database		
		$sql = "INSERT INTO tbl_employees(eFirstName, eLastName, eGender, eDepartment, eDateEmployed, eSalary) VALUES(:eFirstName, :eLastName, :eGender, :eDepartment, :eDateEmployed, :eSalary)";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':eFirstName', $eFirstName);
		$query->bindparam(':eLastName', $eLastName);
		$query->bindparam(':eGender', $eGender);
		$query->bindparam(':eDepartment', $eDepartment);
		$query->bindparam(':eDateEmployed', $eDateEmployed);
		$query->bindparam(':eSalary', $eSalary);
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
