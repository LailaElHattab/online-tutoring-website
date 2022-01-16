<?php
session_start();

include('database.php');
include('navbar.php');
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

<body id="body">

    <!--Title-->

    <div class="row">
        <div class="col-lg-5">
            <section class="h-100 gradient-custom">
                <div class="container py-5">
                    <div class="row d-flex justify-content-center my-4">
                        <div class="col-md-8">
                            <h1><b>Shopping Cart</b></h1>

                            <div class="card mb-4" id="card">
                                <div class="card-header py-3">
                                    <h5 class="mb-0">Cart</h5>
                                </div>
                                <div class="card-body" id="items">
                                    <?php
                                    if (isset($_GET['id'])) {

                                        $_SESSION['items'][] = $_GET['id'];
                                    }
                                    if (empty($_SESSION['items'])) {
                                        echo "Your cart is empty..";
                                    } else {
                                        for ($k = 0; $k < count($_SESSION['items']); $k++) {
                                            $total += $row2['price'];
                                            $sql2 = "SELECT * FROM course WHERE id='".$_SESSION['items'][$k]."'";
                                            $result2 = $conn->query($sql2);
                                            $row2 = $result2->fetch_assoc();

                                    ?>
                                            <div id="cartData">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                                                        <!-- Image -->
                                                        <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                                                            <img src="<?php echo $row2['image']; ?>" class="w-100" alt="<?php echo $row2['name']; ?>" />
                                                            <a href="#!">
                                                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                                            </a>
                                                        </div>
                                                        <!-- Image -->
                                                    </div>

                                                    <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                                                        <!-- Data -->
                                                        <p><strong><?php echo $row2['name']; ?></strong></p>

                                                        <button type="button" class="btn btn-primary btn-sm me-1 mb-2" data-mdb-toggle="tooltip" title="Remove item">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                        <!-- Data -->
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                                                        <!-- Price -->
                                                        <p class="text-start text-md-center">
                                                            <strong>E£ <?php echo $row2['price']; ?></strong>
                                                        </p>
                                                        <!-- Price -->
                                                    </div>
                                                </div>
                                                <hr class="my-4" />
                                            </div>
                                        <?php
                                        }

                                        ?>

                                        <div class="card mb-4 mb-lg-0">
                                            <div class="card-body">
                                                <p><strong>We accept</strong></p>
                                                <img class="me-2" width="45px" src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/visa.svg" alt="Visa" />

                                                <img class="me-2" width="45px" src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/mastercard.svg" alt="Mastercard" />

                                            </div>
                                        </div>

                                        <!--Summary-->
                                        <div class="row" id="summary">
                                            <div class="container mt-4">
                                                <div class="card mb-4 mb-lg-0">
                                                    <div class="card-header py-3">
                                                        <h5 class="mb-0">Summary</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <ul class="list-group list-group-flush">

                                                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                                                <div>
                                                                    <strong>Total amount</strong>

                                                                </div>
                                                                <span><strong>E£ <?php echo $total; ?></strong></span>
                                                            </li>
                                                        </ul>

                                                        <button type="button" class="btn btn-lg btn-block" id="checkout" onclick=location.href='checkout.php?total=<?php echo $total ?>' style="
                                                            color:white;
                                                            text-decoration:none;>">
                                                        Go to checkout
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php

                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
            </section>
        </div>
    </div>
    </div>






</body>


</html>