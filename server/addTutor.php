<html>

<head>
    <title>Add Tutor</title>
</head>
<form method='post' action=''>
    <h1>Tutor</h1>
    <label>Enter tutor's name</label><br>
    <input type='text' name='name' placeholder='tutor name'><br><br>
    <label>Enter tutor's email</label><br>
    <input type='text' name='email' placeholder='tutor email'><br><br>
    <label>Enter tutor's password</label><br>
    <input type='password' name='password' placeholder='tutor password'><br><br>
    <label>Enter tutor's security answer</label><br>
    <input type='text' name='security' placeholder='security answer'><br><br>
    <input type='submit' name='submit' value='add Tutor'>
</form>
<?php
include_once 'database.php';
if (isset($_POST['submit'])) {
    $sql = "INSERT INTO user(type,fname,email,password,security_ans,tutor_status) VALUES('1','" . $_POST['name'] . "','" . $_POST['email'] . "','" . $_POST['password'] . "','" . $_POST['security'] . "','1')";
    $result = $conn->query($sql);
}
?>

</html>