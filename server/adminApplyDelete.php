<?php
session_start();
include 'database.php';
?>
<html>
<body>
<form method="post" action="adminApplyDelete.php">
<?php
$query= "delete from user where id=".$_POST["id"]." and admin_rank=2";
$result= $conn->query($query);

if(!$result)
	die("Fatal error in executing the query");
else 
	echo "Successfully deleted: ".$query;
?>
</form>
</body>
</html>