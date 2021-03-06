<html>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<?php
include_once 'database.php';
include_once 'functions.php';
include_once($_SERVER['DOCUMENT_ROOT'] . "/online-tutoring-website/client/homeAdmin.html");
$sql = "SELECT id,fname,email,tutor_status FROM user WHERE type='4'";
$result = $conn->query($sql);
?>

<table class="table caption-top ms-3 table-hover table-hover" id="tutorData">
    <caption>List of Tutors</caption>
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Status</th>
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
                <?php
                if ($row['tutor_status'] == 0) {
                ?>
                    <td class="table-danger">Pending</td>
                <?php
                } else {
                ?>
                    <td class="table-success">Approved</td>
                <?php
                }

                ?>
                <td><button type="button" class="btn btn-primary btn-sm px-3" onclick="location.href='tutor.php?id=<?php echo $row['id'] ?>'">
                        view
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
<table class="table caption-top ms-3 table-hover" id="learnerData">
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

                <td><button type="button" class="btn btn-primary btn-sm px-3" onclick="location.href='learner.php?id=<?php echo $row2['id'] ?>'">
                        view
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
<table class="table caption-top ms-3 table-hover" id="courseData">
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
                    <td class="table-success">Approved</td>
                <?php
                }
                ?>
                <td><button type="button" class="btn btn-primary btn-sm px-3" onclick="location.href='courses.php?id=<?php echo $row3['id'] ?>'">
                        open
                    </button></td>


            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<?php
$sql4 = "SELECT id,fname,email,admin_rank FROM user WHERE type='1'";
$result4 = $conn->query($sql4);
?>
<table class="table caption-top ms-3 table-hover" id="adminData">
    <caption>List of Admins</caption>
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
        while ($row4 = $result4->fetch_assoc()) {
            if ($row4['admin_rank'] == 1) {


        ?>
                <tr class="table-primary">
                <?php
            } else {
                ?>
                <tr>
                <?php
            }
                ?>
                <td> <?php echo $row4['id'] ?></td>
                <td> <?php echo $row4['fname'] ?></td>
                <td> <?php echo $row4['email'] ?></td>
                <td><button type=" button" class="btn btn-primary btn-sm px-3" onclick="location.href='admin.php?id=<?php echo $row4['id'] ?>'">
                        view
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
$sql5 = "SELECT * FROM purchase";
$result5 = $conn->query($sql5);
?>
<table class="table caption-top ms-3 table-hover" id="orderData">

    <caption>List of Orders</caption>
    <thead>
        <tr>
            <th scope=" col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Amount</th>
            <th scope="col">Date</th>
            <th scope="col">View</th>
        </tr>
    </thead>
    <tbody>

        <?php
        while ($row5 = $result5->fetch_assoc()) {
            $result6 = select("SELECT email FROM user WHERE id='" . $row5['learner_id'] . "'");
        ?>

            <tr>
                <td><?php echo $row5['id'] ?></td>
                <td><a href="learner.php?id=<?php echo $row5['learner_id']; ?>"><?php echo $result6['email']; ?></a></td>
                <td><?php echo "E??" . $row5['details'] ?></td>
                <td><?php echo $row5['createdAt'] ?></td>
                <td><button type="button" class="btn btn-primary btn-sm px-3" onclick="location.href='orders.php?id=<?php echo $row5['id'] ?>'">
                        view
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
    table2 = document.getElementById('adminData');
    document.getElementById('admin').append(table2);
    table3 = document.getElementById('learnerData');
    document.getElementById('learner').append(table3);
    table4 = document.getElementById('courseData');
    document.getElementById('course').append(table4);
    table5 = document.getElementById('orderData');
    document.getElementById('order').append(table5);
</script>

</html>