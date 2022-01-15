<html>

<head>
    <meta name="viewport" content="width=device-width , initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Add admin</title>
</head>

<body id="addAdminbody">
    <div class="container" id="loginContainer">
        <div class="col-md-4 col-md-offset-4">  
            <div class="row">
                <div class="form-outline mb-4">
                      <h1 id="addAdmin">Add Admin</h1>
                </div>
            </div>
        <form method='post' action=''>
           
        <!--Admin name-->
        <div class="row">
            <div class="form-outline mb-4" id="emailInput">
                 <label for="adminName" class="form-label" id="label">Enter Admin's name: </label>
                 <input type="text" class="form-control" id="adminName" placeholder="admin name" name="name">
            </div>
        </div>

        <!--Admin email-->
        <div class="row">
            <div class="form-outline mb-4" id="emailInput">
                 <label for="adminEmail" class="form-label" id="label">Enter Admin's email: </label>
                 <input type="text" class="form-control" id="adminEmail" placeholder="admin email" name="email">
            </div>
        </div>

         <!--Admin password-->
        <div class="row">
            <div class="form-outline mb-4" id="emailInput">
                 <label for="adminPwd" class="form-label" id="label">Enter Admin's password: </label>
                 <input type="password" class="form-control" id="adminPwd" placeholder="admin password" name="password">
            </div>
        </div>

         <!--Admin security answer-->
        <div class="row">
            <div class="form-outline mb-4" id="emailInput">
                 <label for="adminSecurity" class="form-label" id="label">Enter Admin's security answer: </label>
                 <input type="text" class="form-control" id="adminSecurity" placeholder="security answer" name="security">
            </div>
        </div>

        <!--Choose rank-->
        <div class="row">
            <div class="form-outline mb-4" id="emailInput">
                 <label  class="form-label" id="label">Choose Rank </label>
            </div>
        </div>

        <div class="form-check">
          <input class="form-check-input" type="radio" name="rank" id="rank1">
          <label class="form-check-label" for="rank1">1</label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="rank" id="rank2" checked>
            <label class="form-check-label" for="rank2">2</label>
        </div>

          <!--Submit button-->
        <input type="submit" class="btn" id="loginbtn" name="submit" value="Add Admin">

</form>
<?php
include_once 'database.php';
if (isset($_POST['submit'])) {
    $sql = "INSERT INTO user(type,fname,email,password,security_ans,admin_rank) VALUES('1','" . $_POST['name'] . "','" . $_POST['email'] . "','" . $_POST['password'] . "','" . $_POST['security'] . "','" . $_POST['rank'] . "')";
    $result = $conn->query($sql);
}
?>
</div>
</div>
</body>

</html>