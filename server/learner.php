<?php
session_start();
?>
<html>
<?php
include_once 'database.php';
$sql = "SELECT * FROM user WHERE id='" . $_GET['id'] . "'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
if ($row['picture'] != "") {
    echo "<img src='" . $row['picture'] . "' width='300' height='300'>";
}
echo "<h3>Name: " . $row['fname'] . "</h3>";
echo "<h3>Email: " . $row['email'] . "</h3>";
echo "<h4>Courses purchased:</h4>";
$sql1 = "SELECT * FROM enroll WHERE learner_id='" . $_GET['id'] . "'";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {

?>
    <table border=1>
        <tr>
            <th>Course name</th>
        </tr>
        <?php

        while ($row1 = $result1->fetch_assoc()) {
            $sql2 = "SELECT name FROM course WHERE id='" . $row1['course_id'] . "'";
            $result2 = $conn->query($sql2);
            $row2 = $result2->fetch_assoc();
        ?>
            <tr>
                <td><?php echo $row2['name'] ?></td>
            </tr>
    <?php
        }
    } else {
        echo "<h5>Not enrolled in any course</h5>";
    }
    ?>
    </table>


</html>