<?php
session_start();
?>
<html>
<script src="validations.js"></script>
<?php
include_once 'database.php';
if (isset($_POST['login'])) {
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
        for ($i = 0; $i < 4; $i++) {
            $sql = "Select * from " . $user[$i] . " where email ='" . $_POST["email"] . "' and password='" . $_POST["password"] . "'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $_SESSION["id"] = $row["id"];
                $_SESSION["name"] = $row["fname"];
                $_SESSION["email"] = $row["email"];
                $_SESSION["password"] = $row["password"];
                if (isset($_POST['remember'])) {
                    $_SESSION['start'] = time();
                    $_SESSION['expire'] = $_SESSION['start'] + (3 * 24 * 60 * 60);
                }
                header("Location:home.php");
                break;
            }
            if ($i == 3) {
?>
                <label>Invalid Login, please try again</label><br><br>
        <?php
            }
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