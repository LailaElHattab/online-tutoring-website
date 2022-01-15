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

$query2= "delete from user where id=".$_POST["id"]." and admin_rank=2";
$result2= $conn->query($query2);
if($result2 && isset($_POST['submit']))
	echo "Admins of first rank cannot be deleted.";
?>
</form>
</body>
</html>