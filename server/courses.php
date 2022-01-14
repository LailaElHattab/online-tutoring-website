<?php
session_start();
?>
<html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .checked {
        color: orange;
    }
</style>
<?php
//if no content -> coming soon
include_once 'database.php';
$sql = "SELECT * FROM course where id='" . $_GET['id'] . "'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
echo "<h1>" . $row['name'] . "</h1>";
$rating = $row['rating'];
echo $rating;
for ($i = 0; $i < (int)$rating; $i++) {
    echo "<span class='fa fa-star checked'></span>";
}
$unchecked = 5 - $rating;
for ($j = 0; $j < $unchecked; $j++) {
    echo "<span class='fa fa-star'></span>";
}
echo "<br>";
echo "<img src='" . $row['image'] . "'>";
$sql0 = "SELECT fname FROM user where id='" . $row['tutor_id'] . "'";
$result0 = $conn->query($sql0);
$row0 = $result0->fetch_assoc();
echo "<p>Created by " . $row0['fname'] . "</p>";
$path = $row['description'];
echo "<h3>Course Description</h3>";
$file = fopen($path, "r");
while (!feof($file)) {
    $line = fgets($file);
    echo $line . "<br>";
}
fclose($file);
if ($_SESSION['user'] == '2' || $_SESSION['user'] = "") {
    $sql1 = "SELECT * FROM enroll WHERE learner_id='" . $_SESSION['id'] . "' and course_id='" . $row['id'] . "'";
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc();
    if ($result1->num_rows > 0) {
        $content = $row1['content'];
        echo "<h3>Course content</h3>";
        $file1 = fopen($content, "r");
        while (!feof($file1)) {
            $line1 = fgets($file1);
            echo $line1 . "<br>";
        }
    } else {
?>
        <button onclick="location.href='cart.php?id=<?php echo $row['id'] ?>'">Add to cart</button>
    <?php
    }
} else {

    $content = $row['content'];
    echo "<h3>Course content</h3>";
    $file1 = fopen($content, "r");
    while (!feof($file1)) {
        $line1 = fgets($file1);
        echo $line1 . "<br>";
    }
    ?>
    <button onclick="location.href='editCourse.php?id=<?php echo $row['id'] ?>'">edit course</button>
    <button onclick="location.href='deleteCourse.php?id=<?php echo $row['id'] ?>'">delete course</button>
    <button onclick="location.href='survey.php?id=<?php echo $row['id'] ?>'">Get Certificate</button>

<?php
}

?>


</html>