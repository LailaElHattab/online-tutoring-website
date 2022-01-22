<html>
<?php

function result($conn, $sql)
{
    try {
        $result = $conn->query($sql);
        if (!$result) {
            throw new Exception("Oops something went wrong");
        }
    } catch (Exception $e) {
        echo "<div style='width:1500px; text-align: center' class='alert alert-danger' role='alert'>" . $e->getMessage() . "</div>";
        die();
    }
    return $result;
}
function customError($errno, $errstr, $error_file, $error_line)
{
    echo "<div  class='alert alert-danger'><b>Error:</b> [$errno] $errstr<br></div>";
    $error_message = "[$errno] $errstr $error_file $error_line\n";
    $log_file = "error.txt";
    error_log($error_message, 3, $log_file);
}

?>

</html>