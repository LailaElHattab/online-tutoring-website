<html>

<head>

    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script type='text/javascript' src=''></script>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</head>

<body>
    <?php

    // session start
    session_start();
    include 'database.php';

    $receiver = $_SESSION['reciever'];
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


        <section style="background-color: #eee;">
            <div class="container py-5">

                <div class="row">


                    <div class="col-md-6 col-lg-7 col-xl-8">

                        <ul class="list-unstyled">
                            <li class="d-flex justify-content-between mb-4">
                                <img src=<?php echo $row['picture'] ?> alt="avatar" class="rounded-circle d-flex align-self-start me-3 shadow-1-strong" width="60">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between p-3">
                                        <p class="fw-bold mb-0"><?php echo $row['fname'] ?></p>
                                    </div>

                                    <?php
                                    $getMessage = "SELECT  message.* ,user.fname FROM message INNER JOIN user on sent_by=user.id  WHERE sent_by = '$receiver' AND received_by = " . $_SESSION['id'] . " OR sent_by = " . $_SESSION['id'] . " AND received_by = '$receiver' ORDER BY createdAt asc";
                                    $result2 = $conn->query($getMessage);
                                    if ($result2->num_rows > 0) {
                                        while ($row2 = $result2->fetch_assoc()) {
                                            if ($row2['received_by'] == $_SESSION['id']) {
                                    ?>
                                                <div class="card-body">
                                                    <p class="mb-0"><?php echo $row2['message'] ?></p>
                                                </div>

                                                <?php
                                                $seen = "UPDATE message SET seen=1 WHERE id='" . $row2['id'] . "'";
                                                $conn->query($seen);
                                            } else {
                                                if ($row2['seen'] == '1') {

                                                ?>
                                                    <div class="card-body">
                                                        <p class="mb-0" style="text-align:right;font-size:20px;font-style: italic;"><?php echo $row2['message'] ?></p>
                                                    </div>

                                                <?php
                                                } else {
                                                ?>
                                                    <div class="card-body">
                                                        <p class="mb-0" style="text-align:right;font-size:20px;font-style:bold;text-decoration: underline;"><?php echo $row2['message'] ?></p>
                                                    </div>

                                        <?php
                                                }
                                            }
                                        }
                                    } else {
                                        ?>
                                        <div class="card-body">
                                            <p class="mb-0">No messages yet! Say 'Hi'</p>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </li>

                            <li class="bg-white mb-3">
                                <div class="form-outline">
                                    <textarea class="form-control" name="message" id="textAreaExample2" rows="4" placeholder="Type your message here" required></textarea>
                                </div>
                            </li>
                            <button type="submit" name='submit' class="btn btn-info btn-rounded float-end">Send</button>
                        </ul>

                    </div>

                </div>
            </div>
            </div>
        </section>

</body>

</html>