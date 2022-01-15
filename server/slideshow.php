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

    <!--Heading and picture-->
    <div class="intro vh-100 d-flex align-items-center" id="intro">
        <div class="container">
            <div class="row">
                <div class="col-lg-5" id="title">
                    <h1 id="welcome"><b>Welcome</b> to </h1>
                    <h1 id="edupedia"><b>Edupedia</b></h1>
                    <button onclick="location.href='signup.php'" id="link" class="btn ">Get
                        started</button>
                </div>
                <div class="col-md-6">
                    <img id="illustration" src="../server/images/illustration.png" class="img-fluid" alt="Responsive image">
                </div>
            </div>
        </div>
    </div>

    <!--Slideshow for courses-->

    <?php

    include_once 'database.php';

    $sql1 = "SELECT * FROM course";
    $query = $conn->query($sql1);
    ?>


    <div class="container mb-3">
        <div class="row gx-1 justify-content-center">
            <div class="col-6">
                <h3 class="mb-3">Popular Courses</h3>
            </div>

            <div class="col-6 text-right">
                <a class="btn btn-primary mb-3 mr-1" href="#car" role="button" data-slide="prev" id="arrows">
                    <i class="fa fa-arrow-left"></i>
                </a>
                <a class="btn btn-primary mb-3" href="#car" role="button" data-slide="next" id="arrows">
                    <i class="fa fa-arrow-right"></i>
                </a>
            </div>

            <div id="car" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row gx-1 justify-content-center">

                            <?php
                            while ($row = $query->fetch_assoc()) {
                            ?>
                                <div class="col-lg-3 col-md-6">
                                    <div class="card">
                                        <div class="img-fluid">
                                            <img src=<?php echo $row['image'] ?> class="img-fluid" id="img">
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $row['name'] ?></h5>
                                            <p class="card-text"><b>
                                                    $<?php echo $row['price'] ?>
                                                </b>
                                            </p>
                                            <a href="#" class="btn btn-primary">Go to course</a>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Footer-->

    <footer class="bg-dark text-center text-white">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
            <!-- Section: Form -->
            <section class="">
                <form action="">
                    <!--Grid row-->
                    <div class="row d-flex justify-content-center">
                        <!--Grid column-->
                        <div class="col-auto">
                            <p class="pt-2">
                                <strong>Sign up for our newsletter</strong>
                            </p>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-5 col-12">
                            <!-- Email input -->
                            <div class="form-outline form-white mb-4">
                                <input type="email" id="form5Example29" class="form-control" placeholder="Email Address" />

                            </div>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-auto">
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-outline-light mb-4">
                                Subscribe
                            </button>
                        </div>
                        <!--Grid column-->
                    </div>
                    <!--Grid row-->
                </form>
            </section>
            <!-- Section: Form -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2022 Copyright:
            <a class="text-white" href="https://edupedia.com/">Edupedia.com</a>
        </div>
        <!-- Copyright -->
    </footer>





</body>

</html>