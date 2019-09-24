<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$FirstName=$_POST['efirstname'];
	$LastName=$_POST['elastname'];
	$Gender=$_POST['egender'];
	$Department=$_POST['edepartment'];
	$Dateemployed=$_POST['edateemployed'];
	$Salary=$_POST['esalary'];


	
	// checking empty fields
	if(empty($id) || empty($FirstName) || empty($LastName) || empty($Gender) || empty($Department) || empty($Dateemployed) || empty($Salary)){
				
		if(empty($FirstName)) {
			echo "<font color='red'>efirstname field is empty.</font><br/>";
		}
		
		if(empty($LastName)) {
			echo "<font color='red'>elastname field is empty.</font><br/>";
		}
		
		if(empty($Gender)) {
			echo "<font color='red'>egender field is empty.</font><br/>";
		}
		
		if(empty($Department)) {
			echo "<font color='red'>edepartment field is empty.</font><br/>";
		}

		if(empty($Dateemployed)) {
			echo "<font color='red'>edateemployed field is empty.</font><br/>";
		}
		if(empty($Salary)) {
			echo "<font color='red'>esalary field is empty.</font><br/>";
		}
	} else {	
		//updating the table
		$sql = "UPDATE tbl_employees SET efirstname=:efirstname, elastname=:elastname, edepartment=:edepartment edateemployed=:edateemployed esalary=:esalary WHERE id=:id";
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
		// $query->execute(array(':id' => $id, ':name' => $name, ':email' => $email, ':age' => $age));
				
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$sql = "SELECT * FROM users WHERE id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' => $id));

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	$FirstName = $row['efirstname'];
	$LastName = $row['elastname'];
	$Gender = $row['egender'];
	$Department = $row['edepartment'];
	$Dateemployed = $row['edateemployed'];
	$Salary = $row['esalary'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>FirstName</td>
				<td><input type="text" name="efirstname" value="<?php echo $FirstName;?>"></td>
			</tr>
			<tr> 
				<td>LastName</td>
				<td><input type="text" name="elastname" value="<?php echo $LastName;?>"></td>
			</tr>
			<tr> 
				<td>Gender</td>
				<td><input type="text" name="egender" value="<?php echo $Gender;?>"></td>
			</tr>
			<tr> 
				<td>Department</td>
				<td><input type="text" name="edepartment" value="<?php echo $Department;?>"></td>
			</tr>
			<tr> 
				<td>Dateemployed</td>
				<td><input type="text" name="edateemployed" value="<?php echo $Dateemployed;?>"></td>
			</tr>
			<tr> 
				<td>Salary</td>
				<td><input type="text" name="esalary" value="<?php echo $Salary;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
