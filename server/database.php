<html>
<?php
$user = array("learner", "administrator", "auditor", "tutor");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dummy";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn === false) {
    die("ERROR: could not connect. " . mysqli_connect_error());
}
?>

</html>