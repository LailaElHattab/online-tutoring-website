<html>
<?php
include_once 'database.php';
include_once($_SERVER['DOCUMENT_ROOT'] . "/online-tutoring-website/client/homeAdmin.html");
$sql = "SELECT id,fname,email FROM user WHERE type='1'";
$result = $conn->query($sql);
?>

<table class="table caption-top ms-3" id="tutorData">
    <caption>List of Tutors</caption>
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">View</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($row = $result->fetch_assoc()) {
        ?>
            <tr>

                <td> <?php echo $row['id'] ?></td>
                <td> <?php echo $row['fname'] ?></td>
                <td> <?php echo $row['email'] ?></td>

                <td><button type="button" class="btn btn-primary btn-sm px-3">
                        <i class="bi bi-check"></i>
                    </button></td>
                <!-- <td><button type="button" class="btn btn-primary btn-sm px-3">
                        open
                    </button></td> -->
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<?php
$sql2 = "SELECT id,fname,email FROM user WHERE type='2'";
$result2 = $conn->query($sql2);
?>
</table>
<table class="table caption-top ms-3" id="learnerData">
    <caption>List of Learners</caption>
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">View</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($row2 = $result2->fetch_assoc()) {
        ?>
            <tr>

                <td> <?php echo $row2['id'] ?></td>
                <td> <?php echo $row2['fname'] ?></td>
                <td> <?php echo $row2['email'] ?></td>

                <td><button type="button" class="btn btn-primary btn-sm px-3">
                        <i class="bi bi-check"></i>
                    </button></td>
                <!-- <td><button type="button" class="btn btn-primary btn-sm px-3">
                        open
                    </button></td> -->
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<?php
$sql3 = "SELECT id,name,status FROM course";
$result3 = $conn->query($sql3);
?>
<table class="table caption-top ms-3" id="courseData">
    <caption>List of Courses</caption>
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Status</th>
            <th scope="col">Approve</th>
            <th scope="col">View</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($row3 = $result3->fetch_assoc()) {
        ?>
            <tr>
                <td><?php echo $row3['id'] ?></td>
                <td><?php echo $row3['name'] ?></td>
                <?php
                if ($row3['status'] == 0) {
                ?>
                    <td class="table-danger">Pending</td>
                <?php
                } else {
                ?>
                    <td class="table-success">Accepted</td>
                <?php
                }
                ?>
                <td><button type="button" class="btn btn-primary btn-sm px-3" onclick="location.href='courses.php?id=<?php echo $row3['id'] ?>'">
                        <i class="bi bi-check"></i>
                    </button></td>
                <td><button type="button" class="btn btn-primary btn-sm px-3" onclick="location.href='courses.php?id=<?php echo $row3['id'] ?>'">
                        open
                    </button></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<script>
    table1 = document.getElementById('tutorData');
    document.getElementById('tutor').append(table1);
    // // table2 = document.getElementById('adminData');
    // // document.getElementById('admin').append(table2);
    table3 = document.getElementById('learnerData');
    document.getElementById('learner').append(table3);
    table4 = document.getElementById('courseData');
    document.getElementById('course').append(table4);
</script>

</html>