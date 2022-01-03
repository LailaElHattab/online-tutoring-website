<?php
session_start();
?>
<html>
<head>
    <meta name="viewport" content="width=device-width , initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/editpwd.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

</head>
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

                    /*emailPwd($row['id'],$_POST['email']);*/
    ?>
    <div class="alert alert-success" id="sucessa">
  <strong>Success!</strong> your new password has been sent to you via mail.
</div>
                   

                <?php
                    return;
                } else {
                ?>
                <div class="alert alert-danger" id="warning">
  <strong>Warning!</strong> Your security answer is incorrect.
  
</div>
                    
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