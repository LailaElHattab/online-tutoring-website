<?php
    include "database.php";
?>
<html>
    <body>
    <table border="1">

    <tr>
        <th> ID </th>
        <th> Name </th>
        <th> Email </th>
        <th> Admin Rank </th>
        <th> Delete </th>
    </tr>
    <?php
        $query = "SELECT * FROM user WHERE type = 1";
        $result = $conn->query($query);
        while($row=$result->fetch_array(MYSQLI_ASSOC)){
    ?>
    <tr>

        <td> <?php echo $row['id']?> </td>
        <td> <?php echo $row['fname']?> </td>
        <td> <?php echo $row['email']?> </td>
        <td> <?php echo $row['admin_rank']?> </td>
        <?php if($row['admin_rank'] == 2){?> 
            <td> <a href=adminDelete.php?id=<?php echo $row["id"]?> >Delete</a> </td>
         
        <?php
        } 
        ?>  
    </tr>
    <?php
    }
    ?>

    </table>
    </body>
</html>
