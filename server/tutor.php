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
} else {
?>
    <img src="images/pic.png" class="rounded-circle img-fluid" style="width: 100px;" />
<?php
}
echo "<h3>Name: " . $row['fname'] . "</h3>";
echo "<h3>Email: " . $row['email'] . "</h3>";
echo "<h4>Courses taught:</h4>";
$sql1 = "SELECT * FROM course WHERE tutor_id='" . $_GET['id'] . "'";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {

?>
    <table border=1>
        <tr>
            <th>Course name</th>
        </tr>
        <?php

        while ($row1 = $result1->fetch_assoc()) {
            $sql2 = "SELECT name FROM course WHERE id='" . $row1['id'] . "'";

            $result2 = $conn->query($sql2);
            $row2 = $result2->fetch_assoc();
        ?>
            <tr>
                <td><?php echo $row2['name'] ?></td>
            </tr>
    <?php
        }
    } else {
        echo "<h5>No courses taught</h5>";
    }
    ?>
    </table>
    <br>
    <?php
    if ($row['tutor_status'] == 0) {
    ?>
        <button onclick="location.href='approveTutor.php?id=<?php echo $row['id'] ?>'">approve tutor</button>
    <?php
    }
    ?>
    <button onclick="location.href='deleteUser.php?id=<?php echo $row['id'] ?>'">delete tutor</button>

</html>