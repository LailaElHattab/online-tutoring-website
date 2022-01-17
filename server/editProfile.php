<?php
session_start();
?>
<html>

<?php
include_once "database.php";
include 'nav.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/online-tutoring-website/client/editProfile.html";
$sql = "SELECT fname,picture FROM user WHERE id='" . $_SESSION['id'] . "'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
if ($row['picture'] == '') {
?>
    <script>
        el1 = document.createElement("img");
        el1.setAttribute("src", "images/pic.png");
        el1.setAttribute("style", "width:170px; height:170px;");
        el1.setAttribute("class", "rounded-circle");
        document.getElementById("pic").prepend(el1);
    </script>
<?php
} else {

?>
    <script>
        el1 = document.createElement("img");
        el1.setAttribute("src", '<?php echo $row['picture'] ?>');
        el1.setAttribute("style", "width:170px; height:170px;");
        el1.setAttribute("class", "rounded-circle");
        document.getElementById("pic").prepend(el1);
    </script>
    <?php
}
$answer = true;
if (isset($_POST['save'])) {
    $newstr = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    if ($newstr == $_POST['name']) {
        if ($_POST['name'] != $row['name']) {
            $sql1 = "UPDATE user SET fname='" . $_POST['name'] . "' WHERE id='" . $_SESSION['id'] . "'";
            $conn->query($sql1);
            $_SESSION['name'] = $_POST['name'];
        }
    } else {
    ?>
        <label>please remove illegal characters e.g numbers, special characters </label>
        <?php
        $answer = false;
    }

    $target_dir = "images/";
    if ($_FILES['imageToUpload']["name"] != '') {
        if ($target_dir . $_FILES['imageToUpload']["name"] != $row['picture']) {

            $target_file = $target_dir . basename($_FILES["imageToUpload"]["name"]);
            $allowed = array('image/gif', 'image/png', 'image/jpg', 'image/jpeg');
            if (!in_array($_FILES["imageToUpload"]["type"], $allowed)) {
        ?>
                <label>please upload a file of image type e.g jpeg,png </label>
        <?php
                $answer = false;
            } else {
                move_uploaded_file($_FILES["imageToUpload"]["tmp_name"], $target_file);
                $sql2 = "UPDATE user SET picture='" . $target_file . "' WHERE id='" . $_SESSION['id'] . "'";
                $conn->query($sql2);
                $_SESSION['picture'] = $_POST['picture'];
            }
        }
    }
    if ($answer) {
        ?>
        <label>Your profile has been changed successfully</label>
<?php
    }
}
?>
<script>
    el2 = document.createElement("input");
    el2.setAttribute("type", "file");
    el2.setAttribute("name", "imageToUpload");

    $(document).ready(function() {
        $("#pwdbtn").click(function() {
            $("#pwdbtn").before(el2);
        });
    });
</script>
<script>
    document.getElementById('name').value = '<?php echo $_SESSION['name']; ?>';
</script>

</html>