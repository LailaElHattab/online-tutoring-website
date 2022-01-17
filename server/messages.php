<?php
session_start();
?>
<html>
<?php
include 'functions.php';
$_SESSION['reciever'] = 5;
$sql = "SELECT * FROM user WHERE id='" . $_SESSION['reciever'] . "'";
$row = printUser($sql);
echo $row['fname'];

?>
<button onclick="location.href='message.php?receiver=<?php echo $_SESSION['reciever']; ?>'">Laila</button>

</html>