<html>
<?php
function database($errno, $errstr)
{
    error_log("Error: [$errno] $errstr", 1, "anmiustudent@gmail.com", "From: is3@gmail.com");
}
set_error_handler("database");
?>

</html>