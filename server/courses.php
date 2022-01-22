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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      $("#ask").click(function() {
        $("#question").slideDown();
        $("#ask1").slideDown();
        $("#ask").hide();
      });
      $(".ans").click(function() {
        $("#answer1").slideDown();
        $("#answer").slideDown();
        $("#answer").attr('value', $(".ans").attr("name"));
        $(".ans").hide();
      });
      $(".reply").click(function() {
        $("#reply").slideDown();
        $("#reply1").slideDown();
        $("#reply1").attr('value', $(".reply").attr("name"));
        $(".reply").hide();
      });
    });
  </script>
  <style>
    :root {
      --primary: #5B25FF;
      --dark: rgb(17, 16, 16);
      --body: #363EE0;
      --dark2: #1c1d1f;
      --box-shadow: 2px 3px 5px grey;
      --active: #FFA700;
      --font: "Open Sans", sans-serif;
    }

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
      background-image: url(images/wave.png);
      background-repeat: no-repeat;
      background-position-y: 90px;
      background-size: contain;

    }

    .checked {
      color: orange;
    }

    #cName {
      font-family: var(--font);
      color: var(--dark);
      font-weight: bold;
    }

    #cDesc {
      font-family: var(--font);
      color: var(--primary);
      font-weight: bold;
      font-size: 20px;
    }

    #con {
      background-image: url(images/Background5.png);
      background-repeat: no-repeat;
      background-position-x: 900px;
      background-position-y: 300px;
      background-size: 350px;
      padding-top: 170px;
      padding-left: 160px;
    }
  </style>

</head>

<body class="d-flex flex-column min-vh-100" id="learnerbody">
  <?php
  include 'nav.php';
  include_once 'database.php';
  include_once 'functions.php';
  include_once 'errorHandling.php';
  // set_error_handler("customError");
  if ($_GET['id'] == "") {
  ?>
    <h4 style="text-align: center;">No course to show</h4>
  <?php
  } else {
    $sql = "SELECT * FROM course where id='" . $_GET['id'] . "'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
  ?>

    <div class="container-fluid mt-5" id="con">

      <img src="<?php echo $row['image'] ?>" class="img-fluid rounded" style="width: 400px; height: 200px" />

      <div class="mt-3 mb-4">
        <h4 class="mb-2" id="cName"><?php echo $row['name'] ?></h4>
        <?php
        $rating = $row['rating'];

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
      </div>

      <?php
      $sql0 = "SELECT fname FROM user where id='" . $row['tutor_id'] . "'";
      $result0 = $conn->query($sql0);
      $row0 = $result0->fetch_assoc();
      ?>
      <p class="mb-2">Created by <a href="tutor.php?id=<?php echo $row['tutor_id'] ?>"> <?php echo $row0['fname'] ?></a> </p>
      <div class="d-flex justify-content-center text-start mt-5 mb-2">
        <div>

          <?php
          $path = $row['description'];
          ?>
          <p class="mb-2 h5" id="cDesc">Course Description</p>
          <?php
          if (!file_exists($path)) {
            trigger_error("Something went wrong");
          } else {
            $file = fopen($path, "r");
            while (!feof($file)) {
              $line = fgets($file);
          ?>
              <p class="mb-2"><?php echo $line ?></p>
          <?php
            }
            fclose($file);
          }
          ?>
          <hr>
          <?php
          if ($_SESSION['user'] == '2' || $_SESSION['user'] == "") {
            $sql1 = "SELECT * FROM enroll WHERE learner_id='" . $_SESSION['id'] . "' and course_id='" . $row['id'] . "'";
            $result1 = $conn->query($sql1);
            $row1 = $result1->fetch_assoc();
            if ($result1->num_rows > 0) {
              $content = $row['content'];
          ?>
              <p class="mb-2 h5" id="cDesc">Course content</p>
              <?php
              if (!file_exists($content)) {
                trigger_error("Something went wrong");
              } else {
                $file1 = fopen($content, "r");
                while (!feof($file1)) {
                  $line1 = fgets($file1);
              ?>
                  <p class="mb-2"><?php echo $line1 ?></p>
              <?php
                }
              }
              echo "<hr>";
              ?>

              <button class="btn btn-sm" id="editcbtn" onclick="location.href='survey.php?id=<?php echo $row['id'] ?>'">Get certificate</button>
            <?php
            } else {
            ?>
              <button class="btn btn-sm" id="editcbtn" onclick="location.href='cart.php?id=<?php echo $row['id'] ?>'">Add to cart</button>

            <?php
            }
          } else if ($_SESSION['user'] == '1' || $_SESSION['user'] == '4') {

            $content = $row['content'];
            ?>
            <p class="mb-2 h5" id="cDesc">Course content</p>
            <?php
            if (!file_exists($content)) {
              trigger_error("Something went wrong");
            } else {

              $file1 = fopen($content, "r");
              while (!feof($file1)) {
                $line1 = fgets($file1);
            ?>
                <p class="mb-2"><?php echo $line1 ?></p>
            <?php
              }
            }
            ?>

            <button class="btn btn-sm" id="editcbtn" onclick="location.href='editCourse.php?id=<?php echo $row['id'] ?>'">edit course</button>
            <button class="btn btn-sm" id="editcbtn" onclick="location.href='deleteCourse.php?id=<?php echo $row['id'] ?>'">delete course</button>


            <?php
            if ($row['status'] == 0 && $_SESSION['id'] == 1) {
            ?>
              <button class="btn btn-sm" id="editcbtn" onclick="location.href='approveCourse.php?id=<?php echo $row['id'] ?>'">approve course</button>

          <?php
            }
          }
          ?>
          <h2 class="my-5 ms-5" style="font-family: Open Sans, sans-serif; font-size:30px;">Students Feedback</h2>
          <hr style="position:relative;left:40px;width:300px">
          <?php
          $rate = getRating($row['id']);
          echo "<div style='display:inline'><p style='font-size: 5.5rem;position:relative;left:4.5%;color:#b4690e;margin-bottom: 0px;padding: 0; '>" . $rate . "</p>";
          for ($i = 0; $i < (int)$rate; $i++) {
          ?>
            <span class='fa fa-star checked' style='position:relative;left:5%;'></span>
          <?php
          }
          $uncheck = 5 - $rate;
          for ($j = 0; $j < $uncheck; $j++) {
          ?>
            <span class='fa fa-star' style='position:relative;left:5%;'></span>
          <?php
          }
          echo "</div>";
          ?>

          <br>
          <?php
          echo "<div style='display:inline'>";
          $ratings = rateCount($row['id']);
          for ($i = 0; $i <= 5; $i++) {

            for ($j = 0; $j < $i; $j++) {

          ?>
              <span class='fa fa-star checked' style='position:relative;left:5%;'></span>
          <?php
            }
            echo "<b style='color:#5624d0;position:relative;left:7%;top:0%;text-align:center'>" . $ratings[$i] . "</b>";
            echo "<br>";
          }
          echo "</div>";
          ?>

          <hr style="position:relative;left:40px;width:300px">

          <ul class="nav nav-tabs" id="myTab">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="review-tab" data-bs-toggle="tab" data-bs-target="#review" type="button" role="tab" aria-controls="review" aria-selected="true">Reviews</button>
            </li>

            <li class="nav-item" role="presentation">
              <button class="nav-link" id="qa-tab" data-bs-toggle="tab" data-bs-target="#qa" type="button" role="tab" aria-controls="qa" aria-selected="false">Q/A</button>
            </li>

          </ul>
          <!--Reviews tab-->
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
              <?php
              $sql2 = "SELECT * FROM feedback WHERE course_id='" . $row['id'] . "'";
              $result3 = $conn->query($sql2);



              if ($result3->num_rows > 0) {
                while ($reviews = $result3->fetch_assoc()) {
                  $user = searchUser($reviews['learner_id']);
                  $rating2 = $reviews['rating'];


                  echo "<br>";

              ?>
                  <div class="d-flex flex-start mb-4">
                    <?php
                    if ($user['picture'] == '') {
                      $user['picture'] = 'images/pic.png';
                    }
                    ?>
                    <img class="rounded-circle shadow-1-strong me-3" src="<?php echo $user['picture']; ?>" alt="avatar" width="65" height="65" />
                    <div class="card w-100">
                      <div class="card-body p-4" style="background-color:#E6DAEA">
                        <div class="">
                          <h5> <?php echo $user['fname']; ?></h5>
                          <?php
                          for ($i = 0; $i < (int)$rating2; $i++) {
                          ?>
                            <span class=' fa fa-star checked'></span>
                          <?php
                          }
                          $unchecked2 = 5 - $rating2;
                          for ($j = 0; $j < $unchecked2; $j++) {
                          ?>
                            <span class='fa fa-star'></span>
                          <?php
                          }
                          ?>
                          <p>
                            <?php
                            echo $reviews['comment'];
                            ?>
                          </p>

                          <div class="d-flex justify-content-between align-items-center">

                            <?php
                            if ($_SESSION['user'] == 1) {

                            ?>
                              <a class="reply" id="<?php echo $user['learner_id']; ?>"> Reply</a>


                            <?php
                            }
                            ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php

                  ?>
                  <!-- <button class="btn btn-sm">reply</button> -->
                  <?php
                  $sql19 = "SELECT * FROM reply WHERE review_id='" . $reviews['id'] . "'";
                  $result19 = $conn->query($sql19);
                  if ($result19->num_rows > 0) {
                    while ($row19 = $result19->fetch_assoc()) {

                      $sql20 = "SELECT * FROM user WHERE id='" . $row19['admin_id'] . "'";
                      $result20 = select($sql20);
                  ?>

                      <div class="card w-100">
                        <div class="card-body p-4" style="background-color:#FFD580">
                          <p><b><?php echo $result20['fname']; ?></b></p>
                          <img class="rounded-circle shadow-1-strong me-3" src="<?php echo $result20['picture']; ?>" alt="avatar" width="65" height="65" />
                          <?php echo $row19['content']; ?>
                        </div>
                      </div>
              <?php


                    }
                  }
                }
              } else {

                echo "<h5 class='mt-3' style='position:absolute;left:29%'>No reviews yet &#129488;</h5>";
              }
              ?>
              <form method="post" action="">
                <input placeholder="type your reply" style="display:none;width:50%;height:50px;" name="reply" id="reply"><br><br>
                <button class="btn btn-primary btn-sm" type="submit" style="display:none;" name="reply1" id="reply1">reply</button>
              </form>
              <?php
              if (isset($_POST['reply1'])) {
                $sql15 = "INSERT into reply (review_id,admin_id,content) VALUES ('" . 1 . "','" . $_SESSION['id'] . "','" . $_POST['reply'] . "')";
                $conn->query($sql15);
              }
              ?>
            </div>
            <!--Q/A tab-->
            <div class="tab-pane fade" id="qa" role="tabpanel" aria-labelledby="qa-tab">
              <br>
              <?php
              $sql8 = "SELECT * FROM question WHERE course_id='" . $_GET['id'] . "'";
              $result8 = $conn->query($sql8);
              while ($row8 = $result8->fetch_assoc()) {
                $sql10 = "SELECT * FROM user WHERE id='" . $row8['learner_id'] . "'";
                $result10 = select($sql10);
              ?>
                <div class="card w-100">
                  <div class="card-body p-4" style="background-color:#E6DAEA">
                    <p><b><?php echo $result10['fname']; ?></b></p>
                    <img class="rounded-circle shadow-1-strong me-3 float-left" src="<?php echo $result10['picture']; ?>" alt="avatar" width="65" height="65" />
                    <?php
                    echo $row8['content'];
                    ?>
                    <button style="position:absolute;left:90%; background-color:#5b25ff;color:white;" name="<?php echo $row8['id'] ?>" id="<?php echo $row8['id'] ?>" class="ans">answer</button>
                  </div>
                </div>
                <br>
                <?php

                ?>

                <?php

                $sql9 = "SELECT * FROM answer WHERE ques_id='" . $row8['id'] . "'";
                $result9 = $conn->query($sql9);
                if ($result9->num_rows > 0) {
                ?>

                  <?php
                  while ($row9 = $result9->fetch_assoc()) {
                  ?>
                    <div class="card w-100">
                      <div class="card-body p-4" style="background-color:#FFD580;">

                        <?php
                        $sql11 = "SELECT * FROM user WHERE id='" . $row9['learner_id'] . "'";
                        $result11 = select($sql11);

                        ?>
                        <p> <b> <?php echo $result11['fname']; ?></b></p>
                        <img class="rounded-circle shadow-1-strong me-3" src="<?php echo $result11['picture']; ?>" alt="avatar" width="65" height="65" />

                        <?php
                        echo $row9['content'];
                        ?>
                      </div>
                    </div>
                  <?php
                  }
                  ?>


                <?php
                }
                ?>

                <hr>
              <?php
              }
              ?>
              <form method="post" action="">
                <input placeholder="type your answer" style="display:none;width:50%;height:50px;" name="content1" id="answer1"><br><br>
                <button class="btn btn-primary btn-sm" style="display:none;" name="anss" id="answer">answer</button>
              </form>
              <form method="post" action="">
                <input placeholder="type your question" style="display:none;width:50%;height:50px;" name="content" id="question"><br><br>
                <button class="btn btn-primary btn-sm" type="submit" style="display:none;" name="ask1" id="ask1">ask question</button>
              </form>
              <button class="btn btn-primary btn-sm" id="ask">ask question</button>
              <?php
              if (isset($_POST['ask1'])) {
                $sql12 = "INSERT into question (learner_id,course_id,content) VALUES ('" . $_SESSION['id'] . "','" . $_GET['id'] . "','" . $_POST['content'] . "')";
                $conn->query($sql12);
              }
              if (isset($_POST['anss'])) {
                $sql13 = "INSERT into answer (learner_id,ques_id,content) VALUES ('" . $_SESSION['id'] . "','" . $_POST['anss'] . "','" . $_POST['content1'] . "')";
                $conn->query($sql13);
              }
              ?>
            </div>


          </div>
        </div>
        <br>
        <br>
        <br>
        <br>
      </div>
    </div>


  <?php
  }

  ?>
</body>


</html>