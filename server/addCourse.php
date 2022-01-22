<?php
session_start();
?>
<html>
<script src="validations.js"></script>

<?php
include 'database.php';
include 'nav.php';
include_once($_SERVER['DOCUMENT_ROOT'] . "/online-tutoring-website/client/addCourse.html");
if ($_SESSION['user'] == 1) {
?>
    <script>
        el1 = document.createElement("div");
        el1.setAttribute("class", "row");
        el1.setAttribute("id", "outer");

        el2 = document.createElement("div");
        el2.setAttribute("class", "form-outline mb-4");
        el2.setAttribute("id", "inner");

        el3 = document.createElement("label");
        el3.setAttribute("for", "tutor");
        el3.setAttribute("class", "form-label");
        el3.setAttribute("id", "label1");
        el3.innerHTML = "Tutor Email:";

        el4 = document.createElement("input");
        el4.setAttribute("type", "email");
        el4.setAttribute("class", "form-control");
        el4.setAttribute("name", "email");
        el4.setAttribute("placeholder", "email");

        inputs = document.getElementById("here");
        inputs.after(el1);
        document.getElementById("outer").prepend(el2);
        document.getElementById("outer").append(el2);
        document.getElementById("inner").append(el3);
        document.getElementById("inner").append(el4);
    </script>
    <?php
}

if (isset($_POST["add"])) {

    $answer = true;
    $found = true;

    if ($_SESSION['user'] == 1) {
        $email1 = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        if (!filter_var($email1, FILTER_VALIDATE_EMAIL) === false) {
            $sql1 = "select email from user where email='" . $email1 . "'";
            $result1 = $conn->query($sql1);
            if ($result1->num_rows > 0) {
                $found = true;
            } else {

    ?>
                <div class='alert alert-danger col-md-4' style='width:300px;position:absolute;left:70%;top:78%'>
                    <label> Oops, This tutor is not registered </label><br><br>
                </div>
        <?php
                $found = false;
            }
        }
    }
    $courseName = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $sql = "select name from course where name='" . $courseName . "'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        ?>
        <div class='alert alert-danger col-md-4' style='width:300px;position:absolute;left:70%;top:30%;'>
            <label> Oops, another course has the same name </label><br><br>
        </div>
        <?php
    } else {
        if ($_POST["price"] <= 0 || is_numeric($_POST["price"]) == false) {
            $answer = false;
        ?>
            <div class='alert alert-danger col-md-4' style='width:300px;position:absolute;left:70%;top:45%;'>
                <label> Price should be a number above 0 </label><br><br>
            </div>
        <?php
        }
    }

    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["imageToUpload"]["name"]);
    $allowed = array('image/gif', 'image/png', 'image/jpg', 'image/jpeg');
    if (!in_array($_FILES["imageToUpload"]["type"], $allowed) || $_FILES['imageToUpload']['size'] > (2 * (1048576))) {
        ?>
        <div class='alert alert-danger col-md-4' style='width:300px;position:absolute;left:70%;top:95%'>
            <label> please upload a file of image type e.g jpeg, png with a max size of 2 MB</label>
        </div>
    <?php
        $answer = false;
    }

    $target_dir1 = "courseInfo/";
    $target_file1 = $target_dir1 . basename($_FILES["contentToUpload"]["name"]);
    $allowed1 = array('text/plain', 'text/rtf');
    if (!in_array($_FILES["contentToUpload"]["type"], $allowed1) || $_FILES['contentToUpload']['size'] > (2 * (1048576))) {
    ?>
        <div class='alert alert-danger col-md-4' style='width:300px;position:absolute;left:70%;top:125%'>
            <label> please upload a file of text type e.g plain, rtf with a max size of 2 MB</label>
        </div>
    <?php
        $answer = false;
    }

    $target_file2 = $target_dir1 . basename($_FILES["desToUpload"]["name"]);
    if (!in_array($_FILES["desToUpload"]["type"], $allowed1) || $_FILES['desToUpload']['size'] > (2 * (1048576))) {
    ?>
        <div class='alert alert-danger col-md-4' style='width:300px;position:absolute;left:70%;top:110%'>
            <label> please upload a file of text type e.g plain, rtf with a max size of 2 MB</label>
        </div>
    <?php
        $answer = false;
    }

    if ($answer == true && $found == true) {

        move_uploaded_file($_FILES["imageToUpload"]["tmp_name"], $target_file);
        move_uploaded_file($_FILES["contentToUpload"]["tmp_name"], $target_file1);
        move_uploaded_file($_FILES["desToUpload"]["tmp_name"], $target_file2);
        $image = $target_file;
        $content = $target_file1;
        $des = $target_file2;
        $price = $_POST['price'];
        $category = $_POST['category'];
        $level = $_POST['level'];
        $sql3 = "SELECT id FROM category WHERE name='" . $category . "'";
        $result3 = $conn->query($sql3);
        $row3 = $result3->fetch_assoc();
        $category_id = $row3['id'];
        if ($_SESSION['user'] == 1) {
            $tutor = $_POST['email'];
            $admin_id = $_SESSION["id"];
            $sql2 = "SELECT id FROM user WHERE email='" . $tutor . "'";
            $result2 = $conn->query($sql2);
            $row2 = $result2->fetch_assoc();
            $tutor_id = $row2['id'];
            $status = 1;
            $sql4 = "INSERT INTO course (name,image,content,description,level,price,rating,status,category,tutor_id,admin_id) VALUES ('$courseName','$image','$content','$des','$level','$price','0','$status','$category_id','$tutor_id','$admin_id')";
        } else if ($_SESSION['user'] == 4) {
            $tutor_id = $_SESSION['id'];
            $status = 0;
            $sql4 = "INSERT INTO course (name,image,content,description,level,price,rating,status,category,tutor_id) VALUES ('$courseName','$image','$content','$des','$level','$price','0','$status','$category_id','$tutor_id')";
        }

        $conn->query($sql4);
    ?>
        <div class='alert alert-success col-md-4' style='text-align:center;width:350px;position:absolute;top:10%;left:35%'>
            <label> The course has been added successfully </label>
        </div>

<?php
    }
}


?>


</html>