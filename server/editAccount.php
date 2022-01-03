<?php
session_start();
?>
<html>

<?php
include_once 'database.php';
include_once($_SERVER['DOCUMENT_ROOT'] . "/online-tutoring-website/client/editAccount.html");

if (isset($_POST['emailbtn'])) {
    $sql1 = "SELECT * FROM user where email='" . $_POST['email'] . "'";
    $result = $conn->query($sql1);
    if ($result->num_rows > 0) {
?>
        <script>
            el1 = document.createElement("div");
            el1.setAttribute("class", "alert alert-danger col-md-4 ");
            el1.setAttribute("style", "width:400px;");
            el1.innerHTML = "This Email has already been taken!";
            document.getElementById("emailPart").prepend(el1);
        </script>
    <?php
    } else {
        $sql2 = "UPDATE user SET email='" . $_POST['email'] . "' WHERE id='" . $_SESSION['id'] . "'";
        $conn->query($sql2);
        $_SESSION['email'] = $_POST['email'];
    ?>
        <script>
            el1 = document.createElement("div");
            el1.setAttribute("class", "alert alert-success col-md-4 ");
            el1.setAttribute("style", "width:400px;");
            el1.innerHTML = "Your email has been changed successfully!";
            document.getElementById("emailPart").prepend(el1);
        </script>
    <?php
    }
}
if (isset($_POST['pwdbtn'])) {
    $sql = "UPDATE user SET password='" . $_POST['password'] . "' WHERE id='" . $_SESSION['id'] . "'";
    $conn->query($sql);
    $_SESSION['password'] = $_POST['password'];
    ?>
    <script>
        el1 = document.createElement("div");
        el1.setAttribute("class", "alert alert-success col-md-4 ");
        el1.setAttribute("style", "width:400px;");
        el1.innerHTML = "Your Password has been changed successfully!";
        document.getElementById("emailPart").prepend(el1);
    </script>
<?php
}


?>
<script type="text/javascript">
    document.getElementById('email').value = '<?php echo $_SESSION['email']; ?>';
    document.getElementById('pw').value = '<?php echo $_SESSION['password']; ?>';
</script>

</html>