<?php
session_start();
?>
<html>
<?php
include_once 'database.php';
include_once 'ajaxsearchbar.php';
?>

<head>
	
    <meta name="viewport" content="width=device-width , initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	

</head>

<body>

    <!--navbar-->
    <nav class="navbar navbar-expand-md navbar-light bg-faded justify-content-center" id="navbar">
        <div class="container">
            <a href="home.php" class="navbar-brand d-flex justify-content-center w=50 me-auto">Edupedia</a>


            <!--toggle button-->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav" aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <!--navbar links-->
            <div class="collapse navbar-collapse col-3 mx-5 mt-1" id="main-nav">
                <!--Search bar -->
                <div class="col-3 mx-5 mt-1">
                    <form class="w-auto">
                    <input type="text" class="form-control" name="search_text" placeholder="Search" id="search_text" aria-label="Search" />
                    </form>
                    <div id="result"></div>
                </div>
                
                <!--dropdown list(Categories)-->
                <div class="tabs col-5">
                    <ul class="navbar-nav">
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

                        <li class="nav-item">
                            <a class="nav-link" href="courses.php">Courses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php">Cart</a>
                        </li>
                </div>

                <div class="buttons col-6">
                    <li class="nav-item ms-2 d-none d-md-inline">
                        <a id="loginhomebtn" class="btn btn ms-lg-3" href="Login.php">Log in</a>
                    </li>
                    <li class="nav-item ms-2 d-none d-md-inline">
                        <a id="signuphomebtn" class="btn btn" href="signup.php">Sign up</a>
                    </li>
                </div>
                </ul>
            </div>
        </div>
    </nav>

</body>

</html>

<script>
	$(document).ready(function() {
		load_data();

		function load_data(query) {
			$.ajax({
				url: "fetch.php",
				method: "post",
				data: {
					query: query
				},
				success: function(data) {
					$('#result').html(data);
				}
			});
		}

		$('#search_text').keyup(function() {
			var search = $(this).val();
			if (search != '') {
				load_data(search);
			} else {
				load_data();
			}
		});
	});
</script>
