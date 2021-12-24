<html>
<?php

function generatePwd()
{
    $comb = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array();
    $combLen = strlen($comb) - 1;
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $combLen);
        $pass[] = $comb[$n];
    }
    return implode($pass);
}
function emailPwd($email, $type)
{
    //update the password
    include 'database.php';
    $pwd = generatePwd();
    $sql = "update " . $type . " set password='" . $pwd . "' where email ='" . $email . "'";
    $conn->query($sql);

    //The message
    $msg = "Your new password is " . $pwd . "<br> You can change it after you login";

    // send email
    mail($email, "reset password", $msg);
}

?>

</html>