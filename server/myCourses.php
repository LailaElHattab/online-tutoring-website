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
<body>

<?php
include 'functions.php';
include 'database.php';
include 'nav.php';
$sql = "SELECT course_id FROM enroll WHERE learner_id='" . $_SESSION['id'] . "'";
$result = $conn->query($sql);
?>
<h1 class="ms-5">My Learning</h1>
<hr>
<?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id = $row['course_id'];
        $result1 = searchCourse($id);
?>


<div class="card my-3 ms-5" style="width: 1000px; height: 200px">
      <div class="row ">
        <div class="col-md-4">
        <img src=<?php echo $result1['image'] ?> class="img-fluid rounded" />
        </div>
        <div class="col-md-8">
        <div class="card-body">
        <h5 class="card-title"><?php echo $result1['name'] ?></h5>
        <input type="submit" class="btn" id="loginbtn" name="submit" value="View" onclick="location.href='courses.php?id=<?php echo $result1['id'] ?>'"><br>
        </div>
        </div>
      </div>
    </div>
<?php
    }
} else {
    echo "You are not enrolled in any courses";
}
?>
</body>
</html>