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
// Remember the mail function will not work on a local server.There is phpmailer 
function emailPwd($id)
{
    include 'database.php';
    $pwd = generatePwd();
    $sql1 = "update user set password='" . $pwd . "' where id ='" . $id . "'";

    $conn->query($sql1);
    //The message
    $msg = "Your new password is " . $pwd . "<br> You can change it after you login";

    // send email
    mail($email, "reset password", $msg);
}

?>

</html>