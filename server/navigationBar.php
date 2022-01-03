<?php
session_start();
?>
<html>
<?php
if (!empty($_SESSION['id'])) {
    //if logged in

} else {
    //if not logged in
    include_once($_SERVER['DOCUMENT_ROOT'] . "/online-tutoring-website/client/navigationBar.html");
}
?>


</html>