<html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "IS3";

try {
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_errno) {
        throw new Exception("Oops something went wrong! Please try again later");
    }
} catch (Exception $e) {
    echo "<div style='width:1500px; text-align: center' class='alert alert-danger' role='alert'>" . $e->getMessage() . "</div>";
    $log_file = "error.txt";
    error_log(get_class($e), 3, $log_file);
}

?>

</html>