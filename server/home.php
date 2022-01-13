<?php
session_start();
?>
<html>

<?php

//admin
if (!empty($_SESSION['id']) && $_SESSION["user"] == 1) {
    //if logged in
    include_once($_SERVER['DOCUMENT_ROOT'] . "/online-tutoring-website/client/navbarAdmin.html");
    include_once($_SERVER['DOCUMENT_ROOT'] . "/online-tutoring-website/server/homeAdmin.php");
    //learner
} else if (!empty($_SESSION['id']) && $_SESSION["user"] == 2) {
    //include_once($_SERVER['DOCUMENT_ROOT'] . "/online-tutoring-website/client/.html");
    include_once($_SERVER['DOCUMENT_ROOT'] . "/online-tutoring-website/client/navbarLearner.html");
    include_once($_SERVER['DOCUMENT_ROOT'] . "/online-tutoring-website/client/home.html");
    //auditor
} else if (!empty($_SESSION['id']) && $_SESSION["user"] == 3) {
    include_once($_SERVER['DOCUMENT_ROOT'] . "/online-tutoring-website/client/navbarLearner.html");
    include_once($_SERVER['DOCUMENT_ROOT'] . "/online-tutoring-website/client/home.html");
    //tutor
} else if (!empty($_SESSION['id']) && $_SESSION["user"] == 4) {
    include_once($_SERVER['DOCUMENT_ROOT'] . "/online-tutoring-website/client/navbarLearner.html");
    include_once($_SERVER['DOCUMENT_ROOT'] . "/online-tutoring-website/client/hometutor.html");
} else {
    //if not logged in
    include_once 'navbar.php';
    include_once 'slideshow.php';
  // include_once($_SERVER['DOCUMENT_ROOT'] . "/online-tutoring-website/client/home.html");
}
?>

</html>