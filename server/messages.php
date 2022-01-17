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
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js'></script>


</head>

<html>
<?php
include 'functions.php';
include 'nav.php';
$_SESSION['reciever'] = 5;
$sql = "SELECT * FROM user WHERE id='" . $_SESSION['reciever'] . "'";
$row = printUser($sql);
?>

<body>

    <div class="container py-5">
        <div class="row">
            <div class="col-md-6 col-lg-5 col-xl-4 mb-4 mb-md-0">

                <h5 class="font-weight-bold mb-3 text-left text-lg-start" id="inbox">Inbox</h5>

                <div class="card">
                    <div class="card-body">

                        <ul class="list-unstyled mb-0">
                            <li class="p-2 ">
                                <a href="#!" class="d-flex justify-content-between">
                                    <div class="d-flex flex-row">
                                        <img src=<?php echo $row['picture'] ?> alt="avatar" class="rounded-circle d-flex align-self-center me-3 shadow-1-strong" width="60" height="60">
                                        <div class="pt-1">
                                            <p class="fw-bold mb-0"><?php echo $row['fname'] ?></p>

                                        </div>
                                    </div>
                                    <div class="pt-1">
                                        <span class="badge bg-danger float-end" onclick="location.href='message.php?receiver=<?php echo $_SESSION['reciever']; ?>'">1</span>

                                    </div>
                                </a>
                            </li>
                        </ul>

                    </div>
                </div>

            </div>


</html>