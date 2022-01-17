<?php
session_start();
?>
<html>
<?php
include_once 'database.php';
include 'nav.php';
$sql = "DELETE FROM user WHERE id='" . $_SESSION['id'] . "'";
$conn->query($sql);
include_once 'signOut.php';

?>

</html>