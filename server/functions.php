<?php
//Function to delete data e.g delete user, delete account
function deleteData($conn, $sql)
{
    include_once 'database.php';
    $conn->query($sql);
?>
    <div style='width:400px; text-align: center' class="alert alert-success" role="alert">
        Deleted successfully
    </div>
<?php
}
//Function to add data e.g user, course
function addData($conn, $sql)
{

    $conn->query($sql);
?>

    <div style='width:400px; text-align: center' class="alert alert-success" role="alert">
        Added successfully
    </div>
<?php
}
function select($sql)
{
    include_once 'database.php';
    $result = $conn->query($sql);
    return $result->fetch_assoc();
}

function printCourse($sql)
{
    include_once 'database.php';
    $result = $conn->query($sql);
    return $result;
}
//Function to generate a new password
function generatePwd()
{
    $comb = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array();
    $combLen = strlen($comb) - 1;
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $combLen);
        $pass[] = $comb[$n];
    }
    return implode($pass);
}
// Remember the mail function will not work on a local server.There is phpmailer 
function emailPwd($id, $email)
{
    include 'database.php';
    $pwd = md5(generatePwd());
    $sql1 = "update user set password='" . $pwd . "' where id ='" . $id . "'";

    $conn->query($sql1);
    //The message
    $msg = "Your new password is " . $pwd . "<br> You can change it after you login";

    // send email
    mail($email, "reset password", $msg);
}
function searchCourse($id)
{
    include 'database.php';
    $sql2 = "SELECT * FROM course WHERE id='" . $id . "'";
    $result = $conn->query($sql2);
    $row = $result->fetch_assoc();
    return $row;
}
function readReviews($id)
{
    include 'database.php';
    $sql2 = "SELECT * FROM feedback WHERE course_id='" . $id . "'";
    $result = $conn->query($sql2);
    $row = $result->fetch_assoc();
    return $row;
}
function searchUser($id)
{
    include 'database.php';
    $sql2 = "SELECT * FROM user WHERE id='" . $id . "'";
    $result = $conn->query($sql2);
    $row = $result->fetch_assoc();
    return $row;
}
function addReview()
{

?>
<?php
}

function getTotal()
{
    include 'cart.php';
    return $total;
}

function getCounter()
{
    include 'cart.php';
    return $counter;
}

function footer()
{
?>
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
            <a class="text-white" href="home.php">Edupedia.com</a>
        </div>
        <!-- Copyright -->
    </footer>

<?php
}
?>