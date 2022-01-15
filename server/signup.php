<?php
session_start();
?>
<html>
<script src="validations.js"></script>

<?php
include 'database.php';
if (isset($_POST['signup'])) {
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {

        //Search the tables for a similar email
        $sql1 = "Select email from user where email ='" . $_POST["email"] . "'";
        $result1 = $conn->query($sql1);

        if ($result1->num_rows > 0) {
?>
            <label>This email is already registered</label>

            <?php
        } else {

            if ($_POST['passConf'] == $_POST['password']) {
                $type = $_POST['type'];
                $fname = $_POST['fname'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $security = $_POST['security'];
                $sql2 = "INSERT INTO user(type,fname,email,password,security_ans) VALUES('$type','$fname','$email','$password','$security')";
                $result2 = $conn->query($sql2);


                if ($result2) {
            ?>
                    <label><strong>Success!</strong> Your account is now created and you can login.</label>
                <?php

                }
            } else {

                ?>
                <label>Password doesn't match</label>
<?php

            }
        }
    }
}

include_once($_SERVER['DOCUMENT_ROOT'] . "/online-tutoring-website/client/signup.html");

?>

</html>