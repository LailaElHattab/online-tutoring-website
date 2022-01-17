<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<?php

// session start
session_start();
include 'database.php';

//$receiver = $_GET['receiver'];
$receiver = 5;
$getReceiver = "SELECT * FROM user WHERE id = '$receiver'";
$result = $conn->query($getReceiver);
$row = $result->fetch_assoc();
?>

<form class="form-inline" action="message.php" method="POST">
    <input type="hidden" name="sent_by" value="<?php echo $_SESSION['id'] ?>" />
    <input type="hidden" name="received_by" value="<?php echo $receiver ?>" />


    <?php
    if (isset($_POST['submit'])) {
        $createdAt = date("Y-m-d h:i:sa");
        $sent_by = $_POST['sent_by'];
        $receiver = $_POST['received_by'];
        $message = $_POST['message'];
        $sendMessage = "INSERT INTO message(sent_by,received_by,message,createdAt) VALUES('$sent_by','$receiver','$message','$createdAt')";
        mysqli_query($conn, $sendMessage) or die(mysqli_error($conn));
    }
    ?>
    <img src="<?php echo $row['picture'] ?>" class="img-circle" width="40" />
    <strong><?php echo $row['fname'] ?></strong>


    <?php
    $getMessage = "SELECT  message.* ,user.fname FROM message INNER JOIN user on sent_by=user.id  WHERE sent_by = '$receiver' AND received_by = " . $_SESSION['id'] . " OR sent_by = " . $_SESSION['id'] . " AND received_by = '$receiver' ORDER BY createdAt asc";
    $result2 = $conn->query($getMessage);
    if ($result2->num_rows > 0) {
        while ($row2 = $result2->fetch_assoc()) {
            if ($row2['received_by'] == $_SESSION['id']) {

    ?>

                <div>

                    <p style="font-size:20px"><?php echo $row2['message'] ?></p>

                </div>

            <?php } else {
            ?>

                <!-- <div style="margin: 10;left:300px;"> -->

                <p style="text-align:right;font-size:20px"><?php echo $row2['message'] . "<br>" ?></p>

                <!-- </div> -->

    <?php
            }
        }
    } else {
        echo "<p>No messages yet! Say 'Hi'</p>";
    }
    ?>

    <input type="text" name="message" class="form-control" placeholder="Type your message here" required />
    <input type="submit" value='send' name='submit' class="btn btn-default">
</form>