<?php
session_start();
?>
<html>
<head>
    <meta name="viewport" content="width=device-width , initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<style>
    .checked {
        color: orange;
    }
    h3   {color: rgb(58, 99, 151);
        margin-left: 20px;}
        h1   {color: #363EE0;
        font-style: italic;
        text-align: center;
        margin-left: 20px;}
        b{margin-left: 20px;}
        img{margin-left: 20px;}
        span{margin-left: 20px;}
</style>
<?php
//if no content -> coming soon
include_once 'database.php';
$sql = "SELECT * FROM course where id='" . $_GET['id'] . "'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
echo "<h1>" . $row['name'] . "</h1>";
$rating = $row['rating'];
echo"<b>$rating</b>";
for ($i = 0; $i < (int)$rating; $i++) {
    echo "<span class='fa fa-star checked'></span>";
}
$unchecked = 5 - $rating;
for ($j = 0; $j < $unchecked; $j++) {
    echo "<span class='fa fa-star'></span>";
}
echo "<br>";
echo "<img src='" . $row['image'] . "'>";
$sql0 = "SELECT fname FROM user where id='" . $row['tutor_id'] . "'";
$result0 = $conn->query($sql0);
$row0 = $result0->fetch_assoc();
echo "<p><b><i>Created by " . $row0['fname'] . "</i></b></p>";
$path = $row['description'];
echo "<h3>Course Description</h3>";
$file = fopen($path, "r");
while (!feof($file)) {
    $line = fgets($file);
    echo "<b>$line</b>" . "<br>";
}
fclose($file);
if ($_SESSION['user'] == '2' || $_SESSION['user'] = "") {
    $sql1 = "SELECT * FROM enroll WHERE learner_id='" . $_SESSION['id'] . "' and course_id='" . $row['id'] . "'";
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc();
    if ($result1->num_rows > 0) {
        $content = $row1['content'];
        echo "<h3>Course content</h3>";
        $file1 = fopen($content, "r");
        while (!feof($file1)) {
            $line1 = fgets($file1);
            echo "<b>$line1</b>" . "<br>";
        }
    } else {
?>
        <button class="btn btn-sm" id="editcbtn" onclick="location.href='cart.php?id=<?php echo $row['id'] ?>'">Add to cart</button>
    
    
        <?php
    }
} else {

    $content = $row['content'];
     echo "<h3>Course content</h3>";
    $file1 = fopen($content, "r");
    while (!feof($file1)) {
        $line1 = fgets($file1);
        echo "<b>$line1</b>" . "<br>";
    }
    ?>
   
    
    <button class="btn btn-sm" id="editcbtn" onclick="location.href='editCourse.php?id=<?php echo $row['id'] ?>'">edit course</button>
    <button class="btn btn-sm" id="deletecbtn" onclick="location.href='deleteCourse.php?id=<?php echo $row['id'] ?>'">delete course</button>
   

    <?php
    if ($row['status'] == 0) {
    ?>
        <button class="btn btn-sm" id="approvebtn" onclick="location.href='approveCourse.php?id=<?php echo $row['id'] ?>'">approve course</button>

<?php
    }
}

?>


</html>