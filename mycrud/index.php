<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
$result = $dbConn->query("SELECT * FROM tbl_employees ORDER BY eid DESC");
?>

<html>
<head>	
	<title>Homepage</title>
</head>

<body>
<a href="add.html">Add New Data</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>First Name</td>
		<td>Last Name</td>
		<td>Gender</td>
		<td>Department</td>
		<td>Date Employed</td>
		<td>Salary</td>
		<td>Update</td>
		
	</tr>
	<?php 	
	while($row = $result->fetch(PDO::FETCH_ASSOC)) { 		
		echo "<tr>";
		echo "<td>".$row['eFirstName']."</td>";
		echo "<td>".$row['eLastName']."</td>";
		echo "<td>".$row['eGender']."</td>";	
		echo "<td>".$row['eDepartment']."</td>";
		echo "<td>".$row['eDateEmployed']."</td>";
		echo "<td>".$row['eSalary']."</td>";	
		echo "<td><a href=\"edit.php?eid=$row[eid]\">Edit</a> | <a href=\"delete.php?eid=$row[eid]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>
