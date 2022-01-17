<?php
//Function to delete data e.g delete user, delete account
function deleteData($conn, $sql)
{
    include_once 'database.php';
    $conn->query($sql);
?>
    <div style='width:400px; text-align: center' class="alert alert-success" role="alert">
        Deleted successfully
    </div>
<?php
}
//Function to add data e.g user, course
function addData($conn, $sql)
{

    $conn->query($sql);
?>

    <div style='width:400px; text-align: center' class="alert alert-success" role="alert">
        Added successfully
    </div>
<?php
}
function printUser($sql)
{
    include 'database.php';
    $result = $conn->query($sql);
    return $result->fetch_assoc();
}
function printCourse($sql)
{
    include 'database.php';
    $result = $conn->query($sql);
    return $result;
}
//Function to generate a new password
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
function emailPwd($id, $email)
{
    include 'database.php';
    $pwd = md5(generatePwd());
    $sql1 = "update user set password='" . $pwd . "' where id ='" . $id . "'";

    $conn->query($sql1);
    //The message
    $msg = "Your new password is " . $pwd . "<br> You can change it after you login";

    // send email
    mail($email, "reset password", $msg);
}
function searchCourse($id)
{
    include 'database.php';
    $sql2 = "SELECT * FROM course WHERE id='" . $id . "'";
    $result = $conn->query($sql2);
    $row = $result->fetch_assoc();
    return $row;
}
function readReviews($id)
{
    include 'database.php';
    $sql2 = "SELECT * FROM feedback WHERE course_id='" . $id . "'";
    $result = $conn->query($sql2);
    $row = $result->fetch_assoc();
    return $row;
}
function searchUser($id)
{
    include 'database.php';
    $sql2 = "SELECT * FROM user WHERE id='" . $id . "'";
    $result = $conn->query($sql2);
    $row = $result->fetch_assoc();
    return $row;
}
function addReview()
{

?>
<?php
}
?>