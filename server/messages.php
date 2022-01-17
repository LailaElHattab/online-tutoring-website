<?php
session_start();
?>
<html>
<?php
include 'functions.php';
$sql = "SELECT * FROM user WHERE id='2'";
$row = printUser($sql);
echo $row['fname'];
$_SESSION['reciever'] = 5;
?>
<button onclick="location.href='message.php?receiver=5'">Basma</button>

</html>