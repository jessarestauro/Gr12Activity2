<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
$result = $dbConn->query("SELECT * FROM users ORDER BY id DESC");
?>

<html>
<head>	
	<title>Homepage</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">

</head>

<body style="background-color: #95a5a6">
<a href="register.html" class="btn btn-primary">Add New Data</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td><h3>Full Name</h3></td>
		<td><h3>Username</h3></td>
		<td><h3>Password</h3></td>
		<td><h3>Update Data</h3></td>
	</tr>
	<?php 	
	while($row = $result->fetch(PDO::FETCH_ASSOC)) { 		
		echo "<tr>";
		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['user']."</td>";
		echo "<td>".$row['pass']."</td>";	
		echo "<td><a href=\"edit.php?id=$row[id]\" class='btn btn-info' >Edit</a> | <a href=\"delete.php?id=$row[id]\" class='btn btn-danger' onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>
d
