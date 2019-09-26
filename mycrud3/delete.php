<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$eid = $_GET['eid'];

//deleting the row from table
$sql = "DELETE FROM tbl_employees WHERE eid=:eid";
$query = $dbConn->prepare($sql);
$query->execute(array(':eid' => $eid));

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>
