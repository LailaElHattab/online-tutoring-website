<?php
session_start();
?>
<html>
<?php
include_once 'database.php';
$sql = "UPDATE course SET status='1' WHERE id='" . $_GET['id'] . "'";
echo $sql;
$result = $conn->query($sql);
?>

</html>