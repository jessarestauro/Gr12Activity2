<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$Fname = $_POST['name'];
	$Username = $_POST['user'];
	$Password = $_POST['pass'];	
	
	// checking empty fields
	if(empty($Fname) || empty($Username) || empty($Password)) {	
			
		if(empty($Fname)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($Username)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		if(empty($Password)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}		
	} else {	
		//updating the table
		$sql = "UPDATE users SET name=:name, user=:user, pass=:pass WHERE id=:id";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':id', $id);
		$query->bindparam(':name', $Fname);
		$query->bindparam(':user', $Username);
		$query->bindparam(':pass', $Password);
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
	$Fname = $row['name'];
	$Username = $row['user'];
	$Password = $row['pass'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>

<body>
	<a href="index.php" class="btn btn-primary">Home</a>
	<br/><br/>
	<center>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Name</td>
				<td><input type="text" name="name" class="form-control" value="<?php echo $Fname;?>"></td>
			</tr>
			<tr> 
				<td>Username</td>
				<td><input type="text" name="user" class="form-control" value="<?php echo $Username;?>"></td>
			</tr>
			<tr> 
				<td>Password</td>
				<td><input type="password" name="pass" class="form-control" value="<?php echo $Password;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" class="btn btn-info" value="Update"></td>
			</tr>
		</table>
		</center>
	</form>
</body>
</html>
