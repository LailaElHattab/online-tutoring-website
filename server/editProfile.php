<?php
session_start();
?>
<html>

<?php
include_once "database.php";
include 'nav.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/online-tutoring-website/client/editProfile.html";


?>
<script>
    el1 = document.createElement("img");
    el1.setAttribute("src", "<?php echo $_SESSION['picture']; ?>");
    el1.setAttribute("style", "width:170px; height:170px;");
    el1.setAttribute("class", "rounded-circle");
    document.getElementById("pic").prepend(el1);
</script>
<?php

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
        <div class='alert alert-danger col-md-4' style='text-align:center;width:350px;position:absolute;top:15%;left:35%'>
            <label>please remove illegal characters e.g numbers, special characters </label>
        </div>

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
                <div class='alert alert-danger col-md-4' style='text-align:center;width:350px;position:absolute;top:15%;left:35%'>
                    <label>please upload a file of image type e.g jpeg,png </label>
                </div>

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
        <div class='alert alert-success col-md-4' style='text-align:center;width:350px;position:absolute;top:15%;left:35%'>
            <label>Your profile has been changed successfully</label>
        </div>

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