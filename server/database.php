<html>
<?php
$user = array("learner", "admin", "auditor", "tutor");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "IS3";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn === false) {
    die("ERROR: could not connect. " . mysqli_connect_error());
}
?>

</html>