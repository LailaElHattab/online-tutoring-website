<?php
session_start();
?>
<html>
<?php
include_once 'database.php';

$sql = "SELECT * FROM course WHERE tutor_id='" . $_SESSION['id'] . "'";
$result = $conn->query($sql);
?>
<table class="table caption-top ms-3" id="courseData">
    <caption>List of Courses</caption>
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Status</th>
            <th scope="col">View</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($row = $result->fetch_assoc()) {
        ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php
                    if ($row['status'] == 1) {
                        echo "Approved by admin";
                    } else {
                        echo "Still not Approved by admin";
                    }
                    ?></td>
                <td><button type="button" class="btn btn-primary btn-sm px-3" onclick="location.href='courses.php?id=<?php echo $row['id'] ?>'">
                        open
                    </button></td>
            </tr>
        <?php
        }
        include_once($_SERVER['DOCUMENT_ROOT'] . "/online-tutoring-website/client/hometutor.html");
        ?>
    </tbody>
</table>

<script>
    item = document.getElementById("courseData");
    document.getElementById("course").append(item);
</script>

</html>