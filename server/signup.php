<?php
session_start();
?>
<html>
<script src="validations.js"></script>

<?php
include 'database.php';


if (isset($_POST['signup'])) {
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
        for ($i = 0; $i < 4; $i++) {
            $sql1 = "Select * from " . $user[$i] . " where email ='" . $_POST["email"] . "'";

            $result1 = $conn->query($sql1);
            if ($result1->num_rows > 0) {
?>
                <label>This email is already registered</label>

                <?php
                break;
            } else {

                $dir = '/database/images/';
                $filename = $dir . $_FILES['fileToUpload']['name'];
                $allowed = array('image/gif', 'image/png', 'image/jpg');
                if (!in_array($_FILES["fileToUpload"]["type"], $allowed)) {
                ?>
                    <label>please upload a file of image type e.g jpeg,png </label>
                    <?php
                    break;
                } else {

                    move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $filename);
                }
                if ($_POST['passConf'] == $_POST['password']) {

                    $sql2 = "INSERT INTO learner(email,password,fname,picture,security_ans) VALUES('" . $_POST["email"] . "','" . $_POST["password"] . "','" . $_POST['fname'] . "','" . $filename . "','" . $_POST["security"] . "')";
                    $result2 = $conn->query($sql2);
                    if ($result2) {
                    ?>
                        <label><strong>Success!</strong> Your account is now created and you can login.";</label>
                    <?php
                        break;
                    }
                } else {

                    ?>
                    <label>Password doesn't match</label>
<?php
                    break;
                }
            }
        }
    }
}

include_once($_SERVER['DOCUMENT_ROOT'] . "/online-tutoring-website/client/signup.html");
?>

</html>