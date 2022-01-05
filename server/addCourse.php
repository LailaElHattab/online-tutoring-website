<?php
session_start();
?>
<html>
<script src="validations.js"></script>

<?php
include 'database.php';
if (isset($_POST["add"])) {
    $sql = "select name from course where name='" . $_POST['name'] . "'";
    $result = $conn->query($sql);

    $sql1 = "select email from user where email='" . $_POST['email'] . "'";
    $result1 = $conn->query($sql1);

    $answer = true;
    $found = false;
    if ($result->num_rows > 0) {
?>
        <label>Oops, another course has the same name</label><br><br>
        <?php
    } else {
        if ($_POST["price"] <= 0 || is_numeric($_POST["price"]) == false) {
            $answer = false;
        ?>
            <label>Price should be a number above 0</label><br><br>
        <?php
        }
        if ($result1->num_rows > 0) {
            $found = true;
        } else {
        ?>

            <label>Oops, This tutor is not registered </label><br><br>
        <?php
            $found = false;
        }
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
        $tutor = $_POST['email'];
        //Line 92 will be removed after some updates and 93 will be used instead
        //$admin_id = 5;
        $admin_id = $_SESSION["id"];
        $sql2 = "SELECT id FROM user WHERE email='" . $tutor . "'";
        $result2 = $conn->query($sql2);
        $row2 = $result2->fetch_assoc();
        $tutor_id = $row2['id'];

        $sql3 = "SELECT id FROM category WHERE name='" . $category . "'";
        $result3 = $conn->query($sql3);
        $row3 = $result3->fetch_assoc();
        $category_id = $row3['id'];

        $sql4 = "INSERT INTO course (name,image,content,description,level,price,rating,status,category,tutor_id,admin_id) VALUES ('$name','$image','$content','$des','$level','$price','0','1','$category_id','$tutor_id','$admin_id')";
        $conn->query($sql4);
    ?>
        <label>The course has been added successfully</label>
<?php
    }
}

include_once($_SERVER['DOCUMENT_ROOT'] . "/online-tutoring-website/client/addCourse.html");
?>


</html>