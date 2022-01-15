<html>

<head>
    <title>Add admin</title>
</head>
<form method='post' action=''>
    <h1>Admin</h1>
    <label>Enter Admin's name</label><br>
    <input type='text' name='name' placeholder='admin name'><br><br>
    <label>Enter Admin's email</label><br>
    <input type='text' name='email' placeholder='admin email'><br><br>
    <label>Enter Admin's password</label><br>
    <input type='password' name='password' placeholder='admin password'><br><br>
    <label>Enter Admin's security answer</label><br>
    <input type='text' name='security' placeholder='security answer'><br><br>
    <label>Choose Rank</label>
    <input type="radio" id="rank1" name="rank" value="1">
    <label for="rank1">1</label>
    <input type="radio" id="rank2" name="rank" value="2">
    <label for="rank2">2</label><br><br>
    <input type='submit' name='submit' value='add Admin'>
</form>
<?php
include_once 'database.php';
if (isset($_POST['submit'])) {
    $sql = "INSERT INTO user(type,fname,email,password,security_ans,admin_rank) VALUES('1','" . $_POST['name'] . "','" . $_POST['email'] . "','" . $_POST['password'] . "','" . $_POST['security'] . "','" . $_POST['rank'] . "')";
    $result = $conn->query($sql);
}
?>

</html>