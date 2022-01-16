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

  <style>
      
   
    @media (min-width:768px) {
    #learnerView {
      display: flex;
      width: 1240px;
      }
    }

    #backg {
      background-color: white;
      padding-right: 150px;
    }

    #learnerbody {
      background-image: url(../images/loginbackground.png);
      background-repeat: no-repeat;
      background-position-x: left;
      background-position-y: 150px;
      background-size: 400px;
    }

    .checked {
      color: orange;
    }
  </style>

</head>

<body id="learnerbody">
  <?php
  include_once 'navbarAdmin.php';
  include_once 'database.php';
  $sql = "SELECT * FROM course where id='" . $_GET['id'] . "'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  ?>
  <section class="vh-100" id="backg">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-12">

          <div class="card" style="border-radius: 20px;" id="learnerView">
            <div class="card-body text-center">
              <img src="<?php echo $row['image'] ?>" class="img-fluid rounded" style="width: 400px; height: 200px" />
              <div class="mt-3 mb-4">
                <h4 class="mb-2"><?php echo $row['name'] ?></h4>
                <?php
                $rating = $row['rating'];
                ?>
                <?php
                for ($i = 0; $i < (int)$rating; $i++) {
                ?>
                  <span class='fa fa-star checked'></span>
                <?php
                }
                $unchecked = 5 - $rating;
                for ($j = 0; $j < $unchecked; $j++) {
                ?>
                  <span class='fa fa-star'></span>
                <?php
                }
                ?>
                <div class="d-flex justify-content-center text-center mt-5 mb-2">
                  <div>
                    <?php
                    $sql0 = "SELECT fname FROM user where id='" . $row['tutor_id'] . "'";
                    $result0 = $conn->query($sql0);
                    $row0 = $result0->fetch_assoc();
                    ?>
                    <p class="mb-2">Created by <?php echo $row0['fname'] ?> </p>

                    <?php
                    $path = $row['description'];
                    ?>
                    <p class="mb-2 h5">Course Description</p>
                    <?php
                    $file = fopen($path, "r");
                    while (!feof($file)) {
                      $line = fgets($file);
                    ?>
                      <p class="mb-2"><b><?php $line ?></b></p>
                    <?php
                    }
                    fclose($file);
                    ?>

                    <?php
                    if ($_SESSION['user'] == '2' || $_SESSION['user'] == "") {
                      $sql1 = "SELECT * FROM enroll WHERE learner_id='" . $_SESSION['id'] . "' and course_id='" . $row['id'] . "'";
                      $result1 = $conn->query($sql1);
                      $row1 = $result1->fetch_assoc();
                      if ($result1->num_rows > 0) {
                        $content = $row1['content'];
                    ?>
                        <p class="mb-2 h5">Course content</p>
                        <?php
                        $file1 = fopen($content, "r");
                        while (!feof($file1)) {
                          $line1 = fgets($file1);
                        ?>
                          <p class="mb-2"><b><?php $line1 ?></b></p>
                        <?php
                        }
                      } else {
                        ?>
                        <button class="btn btn-sm" id="editcbtn" onclick="location.href='cart.php?id=<?php echo $row['id'] ?>'">Add to cart</button>

                      <?php
                      }
                    } else {

                      $content = $row['content'];
                      ?>
                      <p class="mb-2 h5">Course content</p>
                      <?php
                      $file1 = fopen($content, "r");
                      while (!feof($file1)) {
                        $line1 = fgets($file1);
                      ?>
                        <p class="mb-2"><b><?php $line1 ?></b></p>
                      <?php
                      }
                      ?>

                      <button class="btn btn-sm" id="editcbtn" onclick="location.href='editCourse.php?id=<?php echo $row['id'] ?>'">edit course</button>
                      <button class="btn btn-sm" id="editcbtn" onclick="location.href='deleteCourse.php?id=<?php echo $row['id'] ?>'">delete course</button>


                      <?php
                      if ($row['status'] == 0) {
                      ?>
                        <button class="btn btn-sm" id="editcbtn" onclick="location.href='approveCourse.php?id=<?php echo $row['id'] ?>'">approve course</button>

                    <?php
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