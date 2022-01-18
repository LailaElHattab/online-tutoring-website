<?php
session_start();
?>
<html>

<?php
include 'nav.php';
//admin
if (!empty($_SESSION['user'])) {
    if ($_SESSION["user"] == 1) {
        //if logged in
        // include_once 'navbarAdmin.php';
        include_once 'homeAdmin.php';

        //include_once($_SERVER['DOCUMENT_ROOT'] . "/online-tutoring-website/server/navbarAdmin.php");
        //include_once($_SERVER['DOCUMENT_ROOT'] . "/online-tutoring-website/server/homeAdmin.php");
        //learner
    } else if ($_SESSION["user"] == 2) {
        //include_once($_SERVER['DOCUMENT_ROOT'] . "/online-tutoring-website/client/.html");
        // include_once($_SERVER['DOCUMENT_ROOT'] . "/online-tutoring-website/client/navbarLearner.html");
        include_once 'slideshow.php';
        //include_once($_SERVER['DOCUMENT_ROOT'] . "/online-tutoring-website/client/home.html");
        //auditor
    } else if ($_SESSION["user"] == 3) {
        // include_once 'navbarAdmin.php';
        include_once($_SERVER['DOCUMENT_ROOT'] . "/online-tutoring-website/server/homeAuditor.php");

        //include_once($_SERVER['DOCUMENT_ROOT'] . "/online-tutoring-website/client/home.html");
        //tutor
    } else if ($_SESSION["user"] == 4) {
        // include_once 'navbarAdmin.php';
        include_once($_SERVER['DOCUMENT_ROOT'] . "/online-tutoring-website/server/hometutor.php");
    }
} else {
    //if not logged in
    // include_once 'navbar.php';
    include_once 'slideshow.php';
    // include_once($_SERVER['DOCUMENT_ROOT'] . "/online-tutoring-website/client/home.html");
}
?>

</html>