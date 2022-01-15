<html>

<head>
    <meta name="viewport" content="width=device-width , initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Add Tutor</title>
</head>

<body id="addAdminbody">
    <div class="container" id="loginContainer">
        <div class="col-md-4 col-md-offset-4">  
            <div class="row">
                <div class="form-outline mb-4">
                      <h1 id="addAdmin">Add Tutor</h1>
                </div>
            </div>
        <form method='post' action=''>

        <!--Tutor name-->
        <div class="row">
            <div class="form-outline mb-4" id="emailInput">
                 <label for="TutorName" class="form-label" id="label">Enter Tutor's name: </label>
                 <input type="text" class="form-control" id="TutorName" placeholder="Tutor name" name="name">
            </div>
        </div>

        <!--Tutor email-->
        <div class="row">
            <div class="form-outline mb-4" id="emailInput">
                 <label for="TutorEmail" class="form-label" id="label">Enter Tutor's email: </label>
                 <input type="text" class="form-control" id="TutorEmail" placeholder="Tutor email" name="email">
            </div>
        </div>

         <!--Tutor password-->
        <div class="row">
            <div class="form-outline mb-4" id="emailInput">
                 <label for="TutorPwd" class="form-label" id="label">Enter Tutor's password: </label>
                 <input type="password" class="form-control" id="TutorPwd" placeholder="Tutor password" name="password">
            </div>
        </div>

         <!--Tutor security answer-->
        <div class="row">
            <div class="form-outline mb-4" id="emailInput">
                 <label for="TutorSecurity" class="form-label" id="label">Enter Tutor's security answer: </label>
                 <input type="text" class="form-control" id="TutorSecurity" placeholder="security answer" name="security">
            </div>
        </div>

          <!--Submit button-->
        <div class="row" id="tutorbtn">
          <input type="submit" class="btn" id="addTutorbtn" name="submit" value="Add Tutor">
        </div>
       

</form>
<?php
include_once 'database.php';
if (isset($_POST['submit'])) {
    $sql = "INSERT INTO user(type,fname,email,password,security_ans,tutor_status) VALUES('1','" . $_POST['name'] . "','" . $_POST['email'] . "','" . $_POST['password'] . "','" . $_POST['security'] . "','1')";
    $result = $conn->query($sql);
}
?>
</div>
</div>
</body>

</html>