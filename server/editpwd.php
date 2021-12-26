<?php
session_start();
?>
<html>
<h3>Forgot Password</h3>
<?php
include_once 'database.php';
include_once 'mail.php';


if (isset($_POST['reset'])) {
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
        for ($i = 0; $i < 4; $i++) {
            $sql = "Select email,security_ans from " . $user[$i] . " where email ='" . $_POST["email"] . "'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            if ($result->num_rows > 0) {
                if ($_POST['security'] == $row['security_ans']) {
                    emailPwd($_POST["email"], $user[$i]);
                    header("Location:login.php");
                    break;
                } else {
?>
                    <label>Your security answer is incorrect</label><br>
                <?php
                    break;
                }
            } else {
                ?>
                <label>Invalid Email, please try again</label><br>
        <?php
                break;
            }
        }
    } else {
        ?>
        <label>Invalid Email, please try again</label><br>
<?php
    }
}
include_once $_SERVER['DOCUMENT_ROOT'] . "/online-tutoring-website/client/editpwd.html";
?>

</html>