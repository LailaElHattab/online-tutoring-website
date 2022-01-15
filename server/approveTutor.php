<?php
session_start();
ob_start();
?>
<html>
<?php
include_once 'database.php';
$sql = "UPDATE user SET tutor_status='1' WHERE id='" . $_GET['id'] . "'";
$result = $conn->query($sql);
header("Location:home.php");
ob_end_flush();
?>

</html>