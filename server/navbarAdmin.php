<html> 
    <?php
    include_once 'database.php';
    ?>

<head>
    <meta name="viewport" content="width=device-width , initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>

<body>
   
    <?php
    include_once 'database.php';
    ?>
    <!--navbar-->
    <nav class="navbar navbar-expand-md navbar-light bg-faded justify-content-center" id="navbar">
        <div class="container">
            <a href="home.php" class="navbar-brand d-flex justify-content-center w=50 me-auto">Edupedia</a>


            <!--toggle button-->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav" aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <!--navbar links-->
            <div class="collapse navbar-collapse col-4 mx-5 mt-1" id="main-nav">

                <!--search bar-->
                <div class="col-4 mx-5 mt-1">
                    <form class="w-auto">
                        <input type="search" class="form-control" placeholder="Search" aria-label="Search" />
                    </form>
                </div>

                <ul class="navbar-nav d-flex flex-row me-1">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Categories
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown" id="selector">
                            <h5 class="dropdown-header">Most Popular</h5>
                            <?php
                            //connection

                            $sql = "SELECT * FROM category";
                            $query = $conn->query($sql);

                            while ($row = $query->fetch_assoc()) {
                                echo "<a class='dropdown-item' href='category.php?id=" . $row["id"] . "'>" . $row['name'] . "</a>";
                            }
                            ?>
                        </div>
                    </li>


                    <div class="col-4">
                        <div class="collapse navbar-collapse  justify-content-center" id="navbar-list-4">
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">

                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <?php echo $_SESSION['name']; ?>

                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="#">Messages</a>
                                        <a class="dropdown-item" href="editAccount.php">Edit Account</a>
                                        <a class="dropdown-item" href="editProfile.php">Edit Profile</a>
                                        <a class="dropdown-item" href="SignOut.php">Log Out</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </ul>
            </div>
        </div>
    </nav>

</body>

</html>