<?php
session_start();
?>
<html>

<head>
  <meta name="viewport" content="width=device-width , initial-scale=1">
  <link rel="stylesheet" type="text/css" href="styles/styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Add Tutor</title>

  <style>
    #learnerView {
      width: 500px;
    }

    #backg {
      background-color: white;
      padding-right: 150px;
    }

    #addAdminbody {
      background-image: url(../images/background4.png);
      background-repeat: no-repeat;
      background-position-x: right;
      background-position-y: 10ch;
      background-size: 290px;

    }
  </style>
</head>
<?php
include 'nav.php';
?>

<body id="addAdminbody">
  <section class="vh-100" id="backg">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-12 col-xl-4">
          <div class="card" style="border-radius: 15px;" id="learnerView">

            <div class="card-body text-left">
              <h4 class=" text-center mb-2">Add Tutor</h4>
              <form method='post' action=''>

                <!--Tutor name-->

                <div class="form-outline mb-4" id="emailInput">
                  <label for="TutorName" class="form-label" id="label">Tutor's name: </label>
                  <input type="text" class="form-control" id="TutorName" placeholder="Tutor name" name="name" maxlength="30" required>
                </div>

                <!--Tutor email-->
                <div class="form-outline mb-4" id="emailInput">
                  <label for="TutorEmail" class="form-label" id="label">Tutor's email: </label>
                  <input type="email" class="form-control" id="TutorEmail" placeholder="Tutor email" name="email" maxlength="62" required>
                </div>

                <!--Tutor password-->
                <div class="form-outline mb-4" id="emailInput">
                  <label for="TutorPwd" class="form-label" id="label">Tutor's password: </label>
                  <input type="password" class="form-control" id="TutorPwd" placeholder="Tutor password" name="password" maxlength="20" required>
                </div>

                <!--Tutor security answer-->
                <div class="form-outline mb-4" id="emailInput">
                  <label for="TutorSecurity" class="form-label" id="label">Enter Tutor's security answer: </label>
                  <input type="text" class="form-control" id="TutorSecurity" placeholder="security answer" name="security" maxlength="10" required>
                </div>

                <!--Submit button-->
                <input type="submit" class="btn" id="addTutorbtn" name="submit" value="Add Tutor">

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>


  </form>
  <?php
  include_once 'database.php';
  if (isset($_POST['submit'])) {
    $email1 = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    if (!filter_var($email1, FILTER_VALIDATE_EMAIL) === false) {
      $sql = "SELECT email FROM user WHERE email='" . $email1 . "'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
  ?>
        <div class='alert alert-danger col-md-4' style='width:300px;position:absolute;left:69%;top:43%'>
          <label> There's another user with the same email </label>
        </div>
      <?php
      } else {
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $pass = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        $security = filter_var($_POST['security'], FILTER_SANITIZE_STRING);
        $sql = "INSERT INTO user(type,fname,email,password,security_ans,tutor_status) VALUES('1','" . $_POST['name'] . "','" . $email1 . "','" . $pass . "','" .  $security . "','1')";
        $result = $conn->query($sql);
      ?>
        <div class='alert alert-success col-md-4' style='text-align:center;width:350px;position:absolute;top:10%;left:35%'>
          <label> The tutor has been added successfully </label>
        </div>
  <?php
      }
    }
  }
  ?>
  </div>
  </div>
</body>

</html>