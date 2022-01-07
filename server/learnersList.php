<html>
<?php
include_once 'database.php';
$sql = "SELECT id,fname FROM user WHERE type='2'";
$result = $conn->query($sql);
?>
<table border=1>
    <tr>
        <th>Firstname</th>
    </tr>
    <?php
    while ($row = $result->fetch_assoc()) {
    ?>
        <tr>
            <td> <?php echo $row['fname'] ?></td>
            <td> <a href=view.php?id=<?php echo $row['id'] ?>>view</a></td>
        <?php
    }
        ?>
</table>

</html>