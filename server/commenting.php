<?php
session_start();
?>



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
    <!-- <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js'></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <style>
        @media (min-width:768px) {
            #chat {
                display: flex;
                width: 700;
            }
        }
    </style>

</head>

<body>
    <?php

    // session start

    include 'database.php';
    include 'nav.php';
    if (isset($_GET['receiver']) && isset($_GET['user'])) {
        $_SESSION['receiver'] = $_GET['receiver'];
        $_SESSION['person'] = $_GET['user'];
    }

    $getReceiver = "SELECT * FROM user WHERE id = '" . $_SESSION['receiver'] . "'";
    $result = $conn->query($getReceiver);
    $row = $result->fetch_assoc();
    $getUser = "SELECT * FROM user WHERE id = '" . $_SESSION['person'] . "'";
    $result3 = $conn->query($getUser);
    $row3 = $result3->fetch_assoc();
    ?>
    <form class="form-inline" action="" method="POST">
        <!-- -->

        <?php
        if (isset($_POST['submit'])) {
            $msg = $_POST['msg'];
            $comment = $_POST['message'];
            $addComment = "INSERT INTO comment(msg_id,auditor_id,content) VALUES('$msg','" . $_SESSION['id'] . "','$comment')";
            mysqli_query($conn, $addComment);
        }
        ?>


        <section>
            <div class="container py-5">

                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-md-6 col-lg-7 col-xl-8">
                        <ul class="list-unstyled">
                            <li class="d-flex justify-content-left  mb-4">
                                <img src=<?php echo $row['picture'] ?> alt="avatar" class="rounded-circle d-flex align-self-start me-3 shadow-1-strong" width="60">
                                <img src=<?php echo $row3['picture'] ?> alt="avatar" class="rounded-circle d-flex align-self-start me-3 shadow-1-strong" style="position:absolute;left:75%;" width="60">
                                <div class="card" id="chat">
                                    <div class="card-header d-flex justify-content-between p-3" style="background-color:#F7F1FF;">
                                        <p class="fw-bold mb-0"><?php echo $row['fname'] ?></p>
                                        <p class="fw-bold mb-0 float-right"><?php echo $row3['fname'] ?></p>
                                    </div>
                                    <div class="col-md-6">
                                        <img id="illustration" src="../server/images/Background2.png" class="img-fluid" style="width: 100px;height:100px;position:absolute;left:120%;top:0%" alt="Responsive image">
                                    </div>

                                    <?php
                                    $getMessage = "SELECT  message.* ,user.fname FROM message INNER JOIN user on sent_by=user.id  WHERE sent_by = '" . $_SESSION['receiver'] . "' AND received_by = " . $_SESSION['person'] . " OR sent_by = " . $_SESSION['person'] . " AND received_by = '" . $_SESSION['receiver'] . "' ORDER BY createdAt asc";
                                    $result2 = $conn->query($getMessage);
                                    if ($result2 !== false && $result2->num_rows > 0) {
                                        while ($row2 = $result2->fetch_assoc()) {
                                            $getComment = "SELECT * FROM comment WHERE msg_id='" . $row2['id'] . "'";
                                            $result4 = $conn->query($getComment);
                                            $row4 = $result4->fetch_assoc();
                                            if ($row2['received_by'] == $_SESSION['person']) {

                                    ?>
                                                <div class="card-body">
                                                    <?php
                                                    if ($result4->num_rows > 0) {
                                                        echo "<p class='float-left' >" . $row4['content'] . "</p>";
                                                        echo "<br>";
                                                        echo "<br>";
                                                    }
                                                    ?>
                                                    <div class="float-left" style="background-color:#F8E0CD;box-sizing:border-box;border-radius: 35px;border: solid #FFF;">
                                                        <input type="radio" name="msg" value=<?php echo $row2['id'] ?>>
                                                        <label class="mb-0" style="text-align:left;font-size:20px;" for="msg"><?php echo $row2['message'] ?></label>

                                                    </div>
                                                </div>

                                            <?php
                                            } else {

                                            ?>
                                                <div class="card-body">

                                                    <div class="float-right" style="background-color:#F8E0CD;box-sizing:border-box;border-radius: 20px;border: solid #FFF;">

                                                        <input type="radio" name="msg" value=<?php echo $row2['id'] ?>>
                                                        <label class="mb-0" style="text-align:left;font-size:20px;" for="msg"><?php echo $row2['message'] ?></label>
                                                        <?php
                                                        if ($result4->num_rows > 0) {
                                                            echo "<p style='position:relative;left:20%;color:red; text-decoration: underline;'>" . $row4['content'] . "</p>";
                                                        }
                                                        ?>
                                                    </div>
                                                </div>

                                    <?php

                                            }
                                        }
                                    }
                                    ?>
                                </div>
                            </li>

                            <li class="bg-white mb-3">
                                <div class="form-outline">
                                    <textarea class="form-control" name="message" id="textAreaExample2" rows="2" placeholder="Type comment" required></textarea>
                                </div>
                            </li>
                            <button type="submit" name='submit' class="btn btn-rounded float-end" id="editcbtn">Post</button>
                        </ul>

                    </div>

                </div>
            </div>
            </div>
        </section>
    </form>
</body>


</html>