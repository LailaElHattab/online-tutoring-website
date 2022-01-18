<?php
session_start();

include('database.php');
include('nav.php');
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
    <script type='text/javascript' src=''></script>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js'></script>
</head>

<body>
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
                                    <form method="post">
                                        <div class="row mb-4">
                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form6Example1">First name</label>
                                                    <input type="text" id="form6Example1" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form6Example2">Last name</label>
                                                    <input type="text" id="form6Example2" class="form-control" />
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Text input -->
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form6Example4">Country</label>
                                            <input type="text" id="form6Example4" class="form-control" />
                                        </div>

                                        <!-- Email input -->
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form6Example5">Email</label>
                                            <input type="email" id="form6Example5" class="form-control" />
                                        </div>

                                        <!-- Number input -->
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form6Example6">Phone</label>
                                            <input type="number" id="form6Example6" class="form-control" />
                                        </div>

                                        <hr class="my-4" />

                                        <div class="form-check mb-4">
                                            <input class="form-check-input" type="checkbox" value="" id="checkoutForm2" checked />
                                            <label class="form-check-label" for="checkoutForm2">
                                                Save this information for next time
                                            </label>
                                        </div>

                                        <hr class="my-4" />

                                        <h5 class="mb-4">Payment</h5>

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
                                                    <input type="text" id="formNameOnCard" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="formCardNumber">Credit card number</label>
                                                    <input type="text" id="formCardNumber" class="form-control" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col-3">
                                                <div class="form-outline">
                                                    <label class="form-label" for="formExpiration">Expiration</label>
                                                    <input type="text" id="formExpiration" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-outline">
                                                    <label class="form-label" for="formCVV">CVV</label>
                                                    <input type="text" id="formCVV" class="form-control" />
                                                </div>
                                            </div>
                                        </div>

                                        <input class="btn btn-primary btn-lg btn-block" type="submit" style="color:white;text-decoration:none;" name="submit" value="Pay Now">


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
                                                            <span><?php echo $counter; ?></span>
                                                        </li>
                                                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                                            <div>
                                                                <strong>Total amount</strong>
                                                                <strong>
                                                                    <p class="mb-0">(including VAT)</p>
                                                                </strong>
                                                            </div>
                                                            <span><strong> <?php echo "E£" . $_GET['total']; ?></strong></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <?php
                                    if (isset($_POST['submit'])) {

                                        $sql = "SELECT * FROM user WHERE id='" . $_SESSION['id'];
                                        $result = $conn->query($sql);
                                        for ($k = 0; $k < count($_SESSION['items']); $k++) {
                                            $sql2 = "insert into enroll(learner_id, course_id, progress) values('" . $_SESSION['id'] . "','" . $_SESSION['items'][$k] . "',0)";
                                            $result2 = $conn->query($sql2);
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

</html>