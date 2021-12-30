<?php
session_start();
?>
<html>
<?php
include_once 'database.php';

$sql = "DELETE FROM " . $_SESSION["user"] . " WHERE id='" . $_SESSION['id'] . "'";
$conn->query($sql);
include_once 'signOut.php';

?>

</html>