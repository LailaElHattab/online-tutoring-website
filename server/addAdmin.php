<html>

<head>
<meta name="viewport" content="width=device-width , initial-scale=1">
  <link rel="stylesheet" type="text/css" href="styles/styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Add admin</title>

    <style>
   #learnerView{
       width: 500px;
   }
   #backg{
       background-color: white;
       padding-right: 150px;
   }
   #learnerbody{
    background-image: url(../images/loginbackground.png);
    background-repeat: no-repeat;
    background-position-x: left;
    background-position-y: 150px;
    background-size: 400px;
   }

    </style>
</head>

    

<body id="addAdminbody">
    

<section class="vh-100" id="backg">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-12 col-xl-4">

        <div class="card" style="border-radius: 15px;" id="learnerView"> 
       
          <div class="card-body text-left"> 
              <h4 class=" text-center mb-2">Add Admin</h4>

            <form method='post' action=''>
                <!--Admin name-->
            <div class="form-outline mb-4" id="emailInput">
                 <label for="adminName" class="form-label" id="label">Admin's name: </label>
                 <input type="text" class="form-control" id="adminName" placeholder="admin name" name="name">
            </div>
             <!--Admin email-->
            <div class="form-outline mb-4" id="emailInput">
                 <label for="adminEmail" class="form-label" id="label"> Admin's email: </label>
                 <input type="text" class="form-control" id="adminEmail" placeholder="admin email" name="email">
            </div>
     
             <!--Admin password-->
      
            <div class="form-outline mb-4" id="emailInput">
                 <label for="adminPwd" class="form-label" id="label"> Admin's password: </label>
                 <input type="password" class="form-control" id="adminPwd" placeholder="admin password" name="password">
            </div>
    
              <!--Admin security answer-->
            <div class="form-outline mb-4" id="emailInput">
                 <label for="adminSecurity" class="form-label" id="label">Enter Admin's security answer: </label>
                 <input type="text" class="form-control" id="adminSecurity" placeholder="security answer" name="security">
            </div>

              <!--Choose rank-->
            <div class="form-outline mb-4" id="emailInput">
                 <label  class="form-label" id="label">Choose Rank </label>
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
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


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