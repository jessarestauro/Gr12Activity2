<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
$result = $dbConn->query("SELECT * FROM tbl_employees ORDER BY id DESC");
?>

<html>
<head>	
	<title>tbl_employees</title>
</head>

<body>
<a href="add.html">Add New Data</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>FirstName</td>
		<td>LastName</td>
		<td>Gender</td>
		<td>Department</td>
		<td>Dateemployed</td>
		<td>Salary</td>
		<td>Update</td>
	</tr>
	<?php 	
	while($row = $result->fetch(PDO::FETCH_ASSOC)) { 		
		echo "<tr>";
		echo "<td>".$row['efirstname']."</td>";
		echo "<td>".$row['elastname']."</td>";
		echo "<td>".$row['egender']."</td>";
		echo "<td>".$row['edepartment']."</td>";
		echo "<td>".$row['edateemployed']."</td>";	
		echo "<td>".$row['esalary']."</td>";	
		echo "<td><a href=\"edit.php?id=$row[id]\">Edit</a> | <a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>
