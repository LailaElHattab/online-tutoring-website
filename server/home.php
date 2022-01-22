<?php
session_start();
?>
<html>
<meta name="viewport" content="width=device-width , initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/styles.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<?php
include 'functions.php';
include 'nav.php';
?>

<?php
//admin
if (!empty($_SESSION['user'])) {
    if ($_SESSION["user"] == 1) {
        //if logged in
        include_once 'homeAdmin.php';

        //learner
    } else if ($_SESSION["user"] == 2) {
        include_once 'slideshow.php';

        //auditor
    } else if ($_SESSION["user"] == 3) {
        include_once($_SERVER['DOCUMENT_ROOT'] . "/online-tutoring-website/server/homeAuditor.php");

        //tutor
    } else if ($_SESSION["user"] == 4) {
        include_once($_SERVER['DOCUMENT_ROOT'] . "/online-tutoring-website/server/hometutor.php");
    }
} else {
    //if not logged in
    include_once 'slideshow.php';
}
?>




</html>