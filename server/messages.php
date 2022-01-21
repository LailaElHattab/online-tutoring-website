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
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

</head>

<html>
<?php
include 'functions.php';
include 'nav.php';
include 'database.php';

$sql = "SELECT * FROM message WHERE sent_by='" . $_SESSION['id'] . "'or received_by='" . $_SESSION['id'] . "'";
$result = $conn->query($sql);
$inbox = array();

?>

<body>

    <div class="container py-5">
        <div class="row">
            <div class="col-md-6 col-lg-5 col-xl-4 mb-4 mb-md-0">
                <h3 class="font-weight-bold mb-3 text-left text-lg-start" id="inbox">Inbox</h3>
                <form class="w-auto">
                    <input type="text" class="form-control" name="search_text1" placeholder="Search" id="search_text1" aria-label="Search" />
                </form>
                <div id="result1"></div>
                <br>
                <br>
                <br>
                <?php
                while ($row = $result->fetch_assoc()) {

                    if ($row['sent_by'] == $_SESSION['id']) {
                        $sql1 = "SELECT * FROM user WHERE id='" . $row['received_by'] . "'";
                        $result1 = select($sql1);
                        if (!in_array($row['received_by'], $inbox)) {
                            array_push($inbox, $row['received_by']);
                        } else {
                            continue;
                        }

                ?>

                    <?php
                    } else {
                        $sql1 = "SELECT * FROM user WHERE id='" . $row['sent_by'] . "'";
                        $result1 = select($sql1);
                        if (!in_array($row['sent_by'], $inbox)) {
                            array_push($inbox, $row['sent_by']);
                        } else {
                            continue;
                        }
                    }

                    ?>
                    <div class="card">
                        <div class="card-body" style="background-color:#F7F1FF;">

                            <ul class="list-unstyled mb-0">
                                <li class="p-2 ">
                                    <a href="#!" class="d-flex justify-content-between">
                                        <div class="d-flex flex-row">
                                            <img src=<?php echo $result1['picture'] ?> alt="avatar" class="rounded-circle d-flex align-self-center me-3 shadow-1-strong" width="60" height="60">
                                            <div class="pt-1">
                                                <p class="fw-bold mb-0" onclick="location.href='message.php?receiver=<?php echo $result1['id']; ?>'"><?php echo $result1['fname'] ?></p>

                                            </div>
                                        </div>
                                        <div class="pt-1">
                                            <span class="badge bg-danger float-end">1</span>

                                        </div>
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </div>
                    <br>
                <?php
                }
                ?>

            </div>

        </div>
    </div>
    <div class="col-md-6">
        <img id="illustration" src="../server/images/backgroundtutor.png" class="img-fluid" style="width: 500px;position:absolute;left:50%;top:40%" alt="Responsive image">
    </div>
    <?php
    footer();
    ?>

</html>
<script>
    $(document).ready(function() {
        load_data();

        function load_data(query) {
            $.ajax({
                url: "fetch1.php",
                method: "post",
                data: {
                    query: query
                },
                success: function(data) {
                    $('#result1').html(data);
                }
            });
        }

        $('#search_text1').keyup(function() {
            var search = $(this).val();
            if (search != '') {
                load_data(search);
            } else {
                load_data();
            }
        });
    });
</script>