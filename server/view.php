<html>


<?php
include_once 'database.php';
//PLEASE PUT THEM INTO TABS ONE FOR LEARNER PERSONAL DATA AND ONE FOR THE COURSES HE IS ENROLLED IN
//PLEASE PUT THEM INTO TABS ONE FOR LEARNER PERSONAL DATA AND ONE FOR THE COURSES HE IS ENROLLED IN
//PLEASE PUT THEM INTO TABS ONE FOR LEARNER PERSONAL DATA AND ONE FOR THE COURSES HE IS ENROLLED IN
//PLEASE PUT THEM INTO TABS ONE FOR LEARNER PERSONAL DATA AND ONE FOR THE COURSES HE IS ENROLLED IN
//PLEASE PUT THEM INTO TABS ONE FOR LEARNER PERSONAL DATA AND ONE FOR THE COURSES HE IS ENROLLED IN
$sql = "SELECT email,fname,picture FROM user where id='" . $_GET['id'] . "'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
if ($row['picture'] == "") {
?>
    <img style="width:200px; height:170px;" src="images/pic.png">

<?php
} else {
?>
    <img src="<?php $row['picture']; ?>">
<?php
}
?>
<p><?php echo $row['fname']; ?></p>
<p><?php echo $row['email']; ?></p>
<?php
$sql1 = "SELECT course_id FROM enroll WHERE learner_id='" . $_GET['id'] . "'";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {
?>
    <table border=1>
        <tr>
            <th>Course Name</th>
        </tr>
        <?php
        while ($row1 = $result1->fetch_array(MYSQLI_ASSOC)) {
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
        ?>
        <label>No courses enrolled yet</label>
    <?php
    }
    ?>
    </table>

</html>