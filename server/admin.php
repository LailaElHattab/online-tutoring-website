<?php
session_start();
include "database.php";
?>
<html>

<body>

    <?php
    $query = "SELECT * FROM user WHERE id='" . $_GET['id'] . "'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    if ($row['picture'] != "") {
        echo "<img src='" . $row['picture'] . "' width='300' height='300'>";
    }
    echo "<h4> Name: " . $row['fname'] . "</h4>";
    echo "<h4>Email: " . $row['email'] . "</h4>";
    echo "<h4>Rank: " . $row['admin_rank'] . "</h4>";
    if ($row['admin_rank'] == 2) {
    ?>
        <button onclick="location.href='deleteUser.php?id=<?php echo $row['id'] ?>'">delete admin</button>
    <?php
    }
    ?>
</body>

</html>