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
function customError($errno, $errstr)
{
    echo "<b>Error:</b> [$errno] $errstr<br>";
    echo "Something went wrong";
}
function database($errno, $errstr)
{
    error_log("Error: [$errno] $errstr", 1, "anmiustudent@gmail.com", "From: is3@gmail.com");
}
set_error_handler("database");
?>

</html>