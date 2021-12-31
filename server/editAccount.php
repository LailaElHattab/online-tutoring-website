<?php
session_start();
?>
<html>

<?php
// if (isset($_POST['email'])) {
//     $sql = "UPDATE " . $_SESSION['user'] . " SET email='" . $_POST['email'] . "' WHERE id='" . $_SESSION['id'] . "'";
//     $conn->query($sql);
// } else if (isset($_POST['pwd'])) {
//     $sql = "UPDATE " . $_SESSION['user'] . " SET password='" . $_POST['pass'] . "' WHERE id='" . $_SESSION['id'] . "'";
//     $conn->query($sql);
// }
include_once($_SERVER['DOCUMENT_ROOT'] . "/online-tutoring-website/client/editAccount.html");
?>


</html>