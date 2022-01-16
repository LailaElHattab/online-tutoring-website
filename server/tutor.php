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
<body>

<?php
include_once 'database.php';
$sql = "SELECT * FROM user WHERE id='" . $_GET['id'] . "'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<section class="vh-100" id="backg">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100" >
        <div class="col-md-12 col-xl-4">

          <div class="card" style="border-radius: 20px;" id="learnerView">
            <div class="card-body text-center">
              <div class="mt-3 mb-4">
                <?php
                if ($row['picture'] != "") {
                ?>
                <img src="<?php echo $row['picture'] ?>" class="rounded-circle img-fluid" style="width: 100px;" />
               <?php
               } else {
               ?>
               <img src="images/pic.png" class="rounded-circle img-fluid" style="width: 100px;" />
              <?php
              }
              ?>
              </div>
              <h4 class="mb-2"><?php echo $row['fname'] ?></h4>
              <p class="text-muted mb-4"><a href="#!"><?php echo $row['email'] ?></a></p>

              <div class="d-flex justify-content-center text-center mt-5 mb-2">
                <div>
                  <p class="mb-2 h5">Courses taught:</p>
                 <?php
                    $sql1 = "SELECT * FROM course WHERE tutor_id='" . $_GET['id'] . "'";
                    $result1 = $conn->query($sql1);
                    if ($result1->num_rows > 0) {
                 ?>

                <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Course name</th>
                        </tr>
                      </thead>
                      <?php
                      while ($row1 = $result1->fetch_assoc()) {
                      $sql2 = "SELECT name FROM course WHERE id='" . $row1['id'] . "'";
                      $result2 = $conn->query($sql2);
                      $row2 = $result2->fetch_assoc();
                      ?>
                       <tbody>
                          <tr scope="row">
                          <td><?php echo $row2['name'] ?></td>
                          </tr>
                        </tbody>

                    <?php
                      }
                     } else {
                    ?>
                    <p class="text-muted mb-0">No courses taught</p>
                    <?php
                    }
               
                    if ($row['tutor_status'] == 0) {
                    ?>  
                      </table>
                         <input type="submit" class="btn mx-2" id="loginbtn" name="submit" value="Approve Tutor" onclick="location.href='approveTutor.php?id=<?php echo $row['id'] ?>'">
                   
                    <?php
                    }
                    ?>
                      <input type="submit" class="btn" id="loginbtn" name="submit" value="Delete Tutor"  onclick="location.href='deleteUser.php?id=<?php echo $row['id'] ?>'">

                   

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