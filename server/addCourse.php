<?php
session_start();
?>
<html>
<script src="validations.js"></script>
<h1>Add Course</h1>
<?php
include 'database.php';
if (isset($_POST["add"])) {
    $sql = "select name from course";
    $result = $conn->query($sql);
    $sql1 = "select email from tutor";
    $result1 = $conn->query($sql1);
    $answer = true;
    $found = false;
    while ($row = $result->fetch_assoc()) {
        $comparison = strcasecmp($_POST['name'], $row["name"]);
        if ($comparison == 0) {
?>
            <label>Oops, another course has the same name</label><br><br>
        <?php
            break;
        }
    }
    if ($comparison != 0) {
        if ($_POST["price"] <= 0 || is_numeric($_POST["price"]) == false) {
            $answer = false;
        ?>
            <label>Price should be a number above 0</label><br><br>
        <?php
        }
        while ($row1 = $result1->fetch_assoc()) {
            if ($_POST['tutor'] == $row1['email']) {

                $found = true;
            }
        }
        if ($found == false) {


        ?>

            <label>Oops, This tutor is not registered </label><br><br>
        <?php

            $answer = false;
        }
        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["imageToUpload"]["name"]);
        $allowed = array('image/gif', 'image/png', 'image/jpg', 'image/jpeg');
        if (!in_array($_FILES["imageToUpload"]["type"], $allowed)) {
        ?>
            <label>please upload a file of image type e.g jpeg,png </label>
        <?php
            $answer = false;
        }
        $target_dir1 = "courseInfo/";
        $target_file1 = $target_dir1 . basename($_FILES["contentToUpload"]["name"]);
        $allowed1 = array('text/plain', 'text/rtf');
        if (!in_array($_FILES["contentToUpload"]["type"], $allowed1)) {
        ?>
            <label>please upload a file of text type e.g plain,rtf </label>
        <?php
            $answer = false;
        }
        $target_file2 = $target_dir1 . basename($_FILES["desToUpload"]["name"]);

        if (!in_array($_FILES["desToUpload"]["type"], $allowed1)) {
        ?>
            <label>please upload a file of text type e.g plain,rtf </label>
<?php
            $answer = false;
        }
    }




    if ($answer == true && $found == true) {
        move_uploaded_file($_FILES["imageToUpload"]["tmp_name"], $target_file);
        move_uploaded_file($_FILES["contentToUpload"]["tmp_name"], $target_file1);
        move_uploaded_file($_FILES["desToUpload"]["tmp_name"], $target_file2);
        $name = $_POST['name'];
        $image = $target_file;
        $content = $target_file1;
        $des = $target_file2;
        $price = $_POST['price'];
        $category = $_POST['category'];
        $level = $_POST['level'];
        $tutor = $_POST['tutor'];
        //Line 92 will be removed after some updates and 93 will be used instead
        $admin_id = 5;
        // $admin = $_SESSION["id"];
        $sql2 = "SELECT id FROM tutor WHERE email='" . $tutor . "'";
        $result = $conn->query($sql2);
        $row = $result->fetch_assoc();
        $tutor_id = $row['id'];
        $sql3 = "SELECT id FROM category WHERE name='" . $category . "'";
        $result1 = $conn->query($sql3);
        $row1 = $result1->fetch_assoc();
        $category_id = $row1['id'];

        $sql4 = "INSERT INTO course (name,image,content,description,price,rating,status,category,level,tutor_id,admin_id) VALUES ('$name','$image','$content','$des','$price','0','1','$category_id','$level','$tutor_id','$admin_id')";
        echo $sql4;

        $conn->query($sql4);
    }
}

include_once($_SERVER['DOCUMENT_ROOT'] . "/online-tutoring-website/client/addCourse.html");
?>


</html>