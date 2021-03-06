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
</head>
<?php
include_once 'database.php';
include_once 'nav.php';
include_once 'functions.php';
?>

<body>

  <?php


  $sql1 = "SELECT * FROM course WHERE category='" . $_GET['id'] . "'";
  $result = $conn->query($sql1);

  $sql2 = "SELECT * FROM category WHERE id=" . $_GET['id'];
  $result2 = $conn->query($sql2);
  $row1 = $result2->fetch_assoc();
  ?>
  <br>
  <h3><?php echo $row1['name']; ?> Courses</h3>
  <hr align="left" width="50%">
  <br>
  <h5 class="ms-5">Courses to get you started</h5>

  <?php
  while ($row = $result->fetch_assoc()) {
  ?>


    <div class="card my-3 ms-5" style="width: 1000px; height: 200px;background-color:#F7F1FF;">
      <div class="row ">
        <div class="col-md-4">
          <img src=<?php echo $row['image'] ?> class="img-fluid rounded" />
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row['name'] ?></h5>
            <input type="submit" class="btn" id="loginbtn" name="submit" value="View" onclick="location.href='courses.php?id=<?php echo $row['id'] ?>'">
          </div>
        </div>
      </div>
    </div>


  <?php
  }
  footer();
  ?>
</body>

</html>