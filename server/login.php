<?php
session_start();
//The header function didn't redirect - header is stored in buffer and afterwards the buffer is flushed
ob_start();
?>
<html>
<script src="validations.js"></script>
<?php

include_once 'database.php';
include_once($_SERVER['DOCUMENT_ROOT'] . "/online-tutoring-website/client/login.html");



if (isset($_POST['login'])) {
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
        $user_pass = md5($_POST['password']);
        $sql = "Select * from user where email ='".$_POST["email"]."' and password='".$user_pass."'";
        echo $sql;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $status = "Active now";
            $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE id = {$row['id']}");
            $row = $result->fetch_assoc();
            $_SESSION["id"] = $row["id"];
            $_SESSION["name"] = $row["fname"];
            $_SESSION["email"] = $row["email"];
            $_SESSION["password"] = $row["password"];
            $_SESSION["user"] = $row["type"];
            $_SESSION['items'] = array();
            if (isset($_POST['remember'])) {
                $_SESSION['start'] = time();
                $_SESSION['expire'] = $_SESSION['start'] + (3 * 24 * 60 * 60);
            }
            //more if conditions when other pages get added
            if ($_SESSION["user"] == 2 || $_SESSION["user"] == 1 || $_SESSION["user"] == 3) {
                header("Location:home.php");
            } else if ($_SESSION["user"] == 4) {
                header("Location:homeTutor.php");
            }
            ob_end_flush();
        } else {
?>
            <script>
                el1 = document.createElement("div");
                el1.setAttribute("class", "alert alert-danger col-md-4 ");
                el1.setAttribute("style", "width:400px;");
                el1.innerHTML = "Invalid Login, please try again!";
                document.getElementById("emailInput").prepend(el1);
            </script>
        <?php
        }
    } else {
        ?>
        <script>
            el1 = document.createElement("div");
            el1.setAttribute("class", "alert alert-danger col-md-4 ");
            el1.setAttribute("style", "width:400px;");
            el1.innerHTML = "Please enter a valid email";
            document.getElementById("emailInput").prepend(el1);
        </script>
<?php
    }
}


?>


</html>