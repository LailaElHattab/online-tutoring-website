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
      :root{
    --primary: #5B25FF;
    --dark: rgb(17, 16, 16);
    --body: #363EE0;
    --dark2: #1c1d1f;
    --box-shadow: 2px 3px 5px grey;
    --active:#FFA700;
    --font:"Open Sans", sans-serif;
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
    background-position-y: 0px;
    background-size: contain; 
 
  }
  
    .checked {
      color: orange;
    }
    
    #cName{
        font-family: var(--font);
        color: var(--dark);
        font-weight: bold;
    }
    #cDesc{
        font-family: var(--font);
        color: var(--primary);
        font-weight: bold;
        font-size: 20px;
    }
    #con{
    background-image: url(images/Background5.png);
    background-repeat: no-repeat;
    background-position-x: 900px;
    background-position-y: 300px;
    background-size: 350px;
    }
  </style>

</head>

<body class="d-flex flex-column min-vh-100" id="learnerbody" >
  <?php
  include 'nav.php';
  include_once 'database.php';
  include_once 'functions.php';
  if ($_GET['id'] == "") {
  ?>
  <div class="container-fluid" id="con">
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
                <p class="mb-2">Created by <?php echo $row0['fname'] ?> </p>
                <div class="d-flex justify-content-center text-start mt-5 mb-2">
                  <div>

                    <?php
                    $path = $row['description'];
                    ?>
                    <p id="cDesc" class="mb-2 h5">Course Description</p>
                    <?php
                    $file = fopen($path, "r");
                    while (!feof($file)) {
                      $line = fgets($file);
                    ?>
                      <p class="mb-2"><?php echo $line ?></p>
                    <?php
                    }
                    fclose($file);
                    ?>
    <h4 style="text-align: center;">No course to show</h4>
                  </div>
  <?php
  } else {
    $sql = "SELECT * FROM course where id='" . $_GET['id'] . "'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
  ?>
    <div class="container-fluid" id="con">
  
                  <img src="<?php echo $row['image'] ?>" class="img-fluid rounded" style="width: 400px; height: 200px" />

                  <div class="mt-3 mb-4">
                    <h4 class="mb-2"><?php echo $row['name'] ?></h4>
                    <?php
                    $rating = $row['rating'];

                    for ($i = 0; $i < (int)$rating; $i++) {
                    ?>
                        <p id="cDesc" class="mb-2 h5">Course content</p>
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
                  <p class="mb-2">Created by <?php echo $row0['fname'] ?> </p>
                  <div class="d-flex justify-content-center text-start mt-5 mb-2">
                    <div>

                      <?php
                      $path = $row['description'];
                      ?>
                      <p id="cDesc" class="mb-2 h5">Course Description</p>
                      <?php
                      $file = fopen($path, "r");
                      while (!feof($file)) {
                        $line = fgets($file);
                      ?>
                        <p class="mb-2"><?php echo $line ?></p>
                      <?php
                      }
                      fclose($file);
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
                          <p class="mb-2 h5">Course content</p>
                          <?php
                          $file1 = fopen($content, "r");
                          while (!feof($file1)) {
                            $line1 = fgets($file1);
                          ?>
                            <p class="mb-2"><?php echo $line1 ?></p>
                          <?php
                          }
                          echo "<hr>";
                          ?>

                          <button class="btn btn-sm" id="editcbtn" onclick="location.href='survey.php?id=<?php echo $row['id'] ?>'">review</button>
                        <?php
                        } else {
                        ?>
                          <button class="btn btn-sm" id="editcbtn" onclick="location.href='cart.php?id=<?php echo $row['id'] ?>'">Add to cart</button>

                        <?php
                        }
                      } else if ($_SESSION['user'] == '1' || $_SESSION['user'] == '4') {

                        $content = $row['content'];
                        ?>
                        <p class="mb-2 h5">Course content</p>
                        <?php
                        $file1 = fopen($content, "r");
                        while (!feof($file1)) {
                          $line1 = fgets($file1);
                        ?>
                          <p class="mb-2"><?php echo $line1 ?></p>
                        <?php
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
                      <h2 class="my-5 ms-5" style="font-family: Open Sans, sans-serif; font-size:20px;"><b>Reviews</b></h2>
                      <hr>
                      <?php
                      $reviews = readReviews($row['id']);

                      if ($reviews) {
                        $user = searchUser($reviews['learner_id']);
                        $rating2 = $reviews['rating'];


                        echo "<br>";

                      ?>
                        <div class="d-flex flex-start mb-4">
                          <img class="rounded-circle shadow-1-strong me-3" src="<?php echo $user['picture']; ?>" alt="avatar" width="65" height="65" />
                          <div class="card w-100">
                            <div class="card-body p-4">
                              <div class="">
                                <h5> <?php echo $user['fname']; ?></h5>
                                <?php
                                for ($i = 0; $i < (int)$rating2; $i++) {
                                ?>
                                  <span class='fa fa-star checked'></span>
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
                                  <div class="d-flex align-items-center">
                                    <a href="#!" class="link-muted me-2"><i class="bi bi-hand-thumbs-up"></i>
                                      <a href="#!" class="link-muted"><i class="bi bi-hand-thumbs-down"></i>
                                  </div>
                                  <a href="#!" class="link-muted"><i class="bi bi-reply"></i></i> Reply</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php

                        ?>
                        <!-- <button class="btn btn-sm">reply</button> -->
                      <?php
                      } else {

                        echo "No reviews yet";
                      }
                      ?>

</div>


  <?php
  }
  ?>
</body>


</html>