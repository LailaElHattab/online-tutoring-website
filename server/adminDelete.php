<?php
session_start();
include 'database.php';
?>
<html>
<body>
    <form method="post" action="adminApplyDelete.php">
        <?php
        //confirmation page so that not everyone can write the parameters in the url and delete a row
        echo "<h2> Are you sure you want to delete the below record?</h2>";

        $query = "SELECT * FROM user WHERE id=".$_GET["id"];
        $result = $conn->query($query);
        if (!$result) {
            die("Fatal error in executing the query");
        }
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            echo "<input type=hidden name=id value=".$row["id"]." readonly<br>";
            echo "<input type=text name=name value=".$row["fname"]." readonly<br>";
            echo "<input type=text name=email value=".$row["email"]." readonly<br>";
            echo "<input type=text name=admin_rank value=".$row["admin_rank"]." readonly<br>";
        }  
       
        ?>
        <input type='submit' value='submit'>
    </form>
</body>

</html>