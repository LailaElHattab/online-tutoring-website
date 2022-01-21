<?php
session_start();
ob_start();
include('database.php');
include('nav.php');
include_once 'functions.php';
?>
<html>

<head>
    <meta name="viewport" content="width=device-width , initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js'></script>
</head>

<body id="body">
    <section>
        <div class="row">
            <div class="col-lg-5">
                <section class="h-100 gradient-custom">
                    <div class="container py-5">
                        <div class="row d-flex justify-content-center my-4">
                            <div class="col-md-8">
                                <h1><b>Checkout</b></h1>
                                <div class="card mb-4" id="card">
                                    <div class="card-header py-3">
                                        <h5 class="mb-0">Payment details</h5>
                                    </div>
                                    <div class="card-body" id="items">
                                        <form method="post" class="mx-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="checkoutForm3" checked />
                                                <label class="form-check-label" for="checkoutForm3">
                                                    Credit card
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="checkoutForm4" />
                                                <label class="form-check-label" for="checkoutForm4">
                                                    Debit card
                                                </label>
                                            </div>

                                            <div class="form-check mb-4">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="checkoutForm5" />
                                                <label class="form-check-label" for="checkoutForm5">
                                                    Paypal
                                                </label>
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col">
                                                    <div class="form-outline">
                                                        <label class="form-label" for="formNameOnCard">Name on card</label>
                                                        <input type="text" id="formNameOnCard" class="form-control" required />
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-outline">
                                                        <label class="form-label" for="formCardNumber">Credit card number</label>
                                                        <input type="text" id="formCardNumber" class="form-control" required />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col-3">
                                                    <div class="form-outline">
                                                        <label class="form-label" for="formExpiration">Expiration</label>
                                                        <input type="text" id="formExpiration" class="form-control" required />
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-outline">
                                                        <label class="form-label" for="formCVV">CVV</label>
                                                        <input type="text" id="formCVV" class="form-control" required />
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                        <hr class="my-4" />
                                        <div class="row" id="summary">
                                            <div class="container mt-4">
                                                <div class="card mb-4 mb-lg-0">
                                                    <div class="card-header py-3">
                                                        <h5 class="mb-0">Summary</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <ul class="list-group list-group-flush">
                                                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                                                Products
                                                                <span><?php echo $_GET['count'] . " Courses"; ?></span>
                                                            </li>
                                                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                                                <div>
                                                                    <strong>Total amount</strong>
                                                                </div>
                                                                <span><strong> <?php echo "E£" . $_GET['total']; ?></strong></span>
                                                            </li>
                                                        </ul>
                                                        <input class="btn btn-primary btn-lg btn-block" type="submit" id="checkout" style="color:white;text-decoration:none;" name="submit" value="Pay Now">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col-3">
                                                <div class="form-outline">
                                                    <label class="form-label" for="formExpiration">Expiration</label>
                                                    <input type="text" id="formExpiration" class="form-control" required />
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-outline">
                                                    <label class="form-label" for="formCVV">CVV</label>
                                                    <input type="text" id="formCVV" class="form-control" required />
                                                </div>
                                            </div>
                                        </div>

                                        <input class="btn btn-lg btn-block" type="submit" id="checkout" style="color:white;text-decoration:none;" name="submit" value="Pay Now">


                                    </form>


                                    <div class="row" id="summary">
                                        <div class="container mt-4">
                                            <div class="card mb-4 mb-lg-0">
                                                <div class="card-header py-3">
                                                    <h5 class="mb-0">Summary</h5>
                                                </div>
                                                <div class="card-body">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                                            Products
                                                            <span><?php echo $_GET['count'] . " Courses"; ?></span>
                                                        </li>
                                                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                                            <div>
                                                                <strong>Total amount</strong>
                                                            </div>
                                                            <span><strong> <?php echo "E£" . $_GET['total']; ?></strong></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <?php
                                    $id = 0;
                                    if (isset($_POST['submit'])) {


                                        $name = filter_var($_POST['formNameOnCard'], FILTER_SANITIZE_STRING);
                                        if (!filter_var($_POST['formCardNumber'], FILTER_VALIDATE_INT) == false && !filter_var($_POST['formCVV'], FILTER_VALIDATE_INT) === false && !filter_var($_POST['formExpiration'], FILTER_VALIDATE_INT) === false) {
                                            $sql0 = "SELECT MAX(id) AS max_id FROM purchase";
                                            $result0 = $conn->query($sql0);
                                            $row = $result0->fetch_assoc();
                                            if ($row['max_id'] != '') {
                                                $id = $row['max_id'] + 1;
                                            } else {
                                                $id = 0;
                                            }
                                            $sql1 = "insert into purchase(id,learner_id,createdAt, details) values('" . $id . "','" . $_SESSION['id'] . "','" . date("Y-m-d h:i:sa") . "','" . $_GET['total'] . "')";
                                            $result1 = $conn->query($sql1);
                                            for ($k = 0; $k < count($_SESSION['items']); $k++) {
                                                $sql3 = "insert into enroll(learner_id, course_id) values('" . $_SESSION['id'] . "','" . $_SESSION['items'][$k] . "')";
                                                $sql4 = "insert into purchaseItem(purchase_id,course_id) values('" . $id . "','" . $_SESSION['items'][$k] . "')";
                                                $result3 = $conn->query($sql3);
                                                $result4 = $conn->query($sql4);
                                            }
                                            $_SESSION['items'] = array();
                                            header("Location:home.php");
                                            ob_end_flush();
                                        } else {
                                    ?>
                                            <div class='alert alert-danger col-md-4' style='text-align:center;width:350px;position:absolute;top:15%;left:35%'>
                                                <label> Please enter a valid data</label>
                                            </div>
                                    <?php
                                        }
                                    }

                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        </div>
    </section>
</body>
<?php
footer();
?>

</html>