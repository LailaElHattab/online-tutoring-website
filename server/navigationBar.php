<?php
session_start();
?>
<html>
<?php
if (!empty($_SESSION['id'])) {
    //if logged in
    include_once($_SERVER['DOCUMENT_ROOT'] . "/online-tutoring-website/client/navbarAdmin.html");

} else {
    //if not logged in
    include_once($_SERVER['DOCUMENT_ROOT'] . "/online-tutoring-website/client/navigationBar.html");
}
?>


</html>