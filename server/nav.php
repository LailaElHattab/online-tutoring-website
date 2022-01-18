<html>

<?php

//admin
$nav;
if (!empty($_SESSION['user'])) {
    if ($_SESSION["user"] == 1) {
        //if logged in
        include_once 'navbarAdmin.php';
    } else if ($_SESSION["user"] == 2) {

        include_once 'navbarLearner.php';
    } else if ($_SESSION["user"] == 3) {
        include_once 'navbarAdmin.php';
    } else if ($_SESSION["user"] == 4) {
        include_once 'navbarAdmin.php';
    }
} else {
    //if not logged in
    include_once 'navbar.php';
}
?>

</html>