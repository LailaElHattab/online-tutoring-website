<?php
session_start();
?>
<html>
<?php
include_once 'database.php';
include_once 'functions.php';
include 'nav.php';
$sql = "DELETE FROM user WHERE id='" . $_SESSION['id'] . "'";
deleteData($sql);
include_once 'signOut.php';

?>

</html>