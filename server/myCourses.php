<?php
session_start();
?>
<html>

<?php
include 'functions.php';
include 'database.php';
include 'nav.php';
$sql = "SELECT course_id FROM enroll WHERE learner_id='" . $_SESSION['id'] . "'";
$result = $conn->query($sql);
?>
<h1>My Learning</h1>
<hr>
<?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id = $row['course_id'];
        $result1 = searchCourse($id);
?>

        <img src=<?php echo $result1['image'] ?> class="img-fluid rounded" />

        <h5 class="card-title"><?php echo $result1['name'] ?></h5>
        <input type="submit" class="btn" id="loginbtn" name="submit" value="View" onclick="location.href='courses.php?id=<?php echo $result1['id'] ?>'"><br>
<?php
    }
} else {
    echo "You are not enrolled in any courses";
}
?>

</html>