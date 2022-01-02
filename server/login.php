<?php
session_start();
?>
<html>
<script src="validations.js"></script>
<?php
include_once 'database.php';
if (isset($_POST['login'])) {
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
        $sql = "Select * from user where email ='" . $_POST["email"] . "' and password='" . $_POST["password"] . "'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION["id"] = $row["id"];
            $_SESSION["name"] = $row["fname"];
            $_SESSION["email"] = $row["email"];
            $_SESSION["user"] = $row["type"];
            if (isset($_POST['remember'])) {
                $_SESSION['start'] = time();
                $_SESSION['expire'] = $_SESSION['start'] + (3 * 24 * 60 * 60);
            }
            header("Location:home.php");
        }
        if ($i == 3) {
?>
            <label>Invalid Login, please try again</label><br><br>
        <?php
        }
    } else {
        ?>
        <label>Please enter a valid email</label><br><br>
<?php
    }
}

include_once($_SERVER['DOCUMENT_ROOT'] . "/online-tutoring-website/client/login.html");



?>


</html>