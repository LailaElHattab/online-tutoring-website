<html>
<?php
include_once 'database.php';
include_once 'functions.php';
include_once($_SERVER['DOCUMENT_ROOT'] . "/online-tutoring-website/client/homeAuditor.html");

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

                <td><button type="button" class="btn btn-primary btn-sm px-3" onclick="location.href='learner.php?id=<?php echo $row2['id'] ?>'">View inbox
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

                <td><button type="button" class="btn btn-primary btn-sm px-3" onclick="location.href='admin.php?id=<?php echo $row4['id'] ?>'">View inbox
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
<script>
    table1 = document.getElementById('learnerData');
    document.getElementById('learner').append(table1);
    console.log(document.getElementById('learner'));
    table2 = document.getElementById('adminData');
    document.getElementById('admin').append(table2);
</script>

</html>