<html>
<?php
// include_once 'errorHandling.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "IS3";

try {
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        throw new Exception("Oops something went wrong");
    }
} catch (Exception $e) {
    echo "<div style='width:1500px; text-align: center' class='alert alert-danger' role='alert'>" . $e->getMessage() . "</div>";
}

?>

</html>