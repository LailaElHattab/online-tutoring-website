<?php
session_start();
?>
<html>

<body>
    <?php
    include_once 'database.php';
    include_once 'mail.php';


    if (isset($_POST['reset'])) {
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
            $sql = "Select id,security_ans from user where email ='" . $_POST["email"] . "'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            if ($result->num_rows > 0) {
                if ($_POST['security'] == $row['security_ans']) {

                    emailPwd($row['id']);
    ?>
                    <label>Your new password has been sent to you via mail</label>

                <?php
                    return;
                } else {
                ?>
                    <label>Your security answer is incorrect</label><br>
                <?php

                }
            } else {
                ?>
                <label>Invalid Email, please try again</label><br>
    <?php

            }
        }
    }
    include_once $_SERVER['DOCUMENT_ROOT'] . "/online-tutoring-website/client/editpwd.html";
    ?>
</body>

</html>