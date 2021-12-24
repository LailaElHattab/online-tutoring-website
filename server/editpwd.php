<?php
session_start();
?>

<?php
include 'database.php';
include 'mail.php';
$user = array("learner", "administrator", "auditor", "tutor");

if (isset($_POST['reset'])) {
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
        for ($i = 0; $i < 4; $i++) {
            $sql = "Select email from " . $user[$i] . " where email ='" . $_POST["email"] . "'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                emailPwd($_POST["email"], $user[$i]);
                header("Location:login.php");
                break;
            }
            if ($i == 3) {
?>
                <label>Invalid Email, please try again</label><br><br>

        <?php
            }
        }
    } else {
        ?>
        <label>Invalid Email, please try again</label><br><br>
<?php
    }
}
?>
<html>
<script src="validations.js"></script>
<h3>Forgot Password</h3>
<form method="POST" action="editpwd.php" onsubmit="return validateEdit(this)">
    <p>Please enter your email address</p>
    <input type="text" name="email" placeholder="Email address"></input><br><br>
    <input type="submit" name="reset" value="Reset Password">
</form>

</html>