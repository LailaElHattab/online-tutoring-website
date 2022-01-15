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
<style>
h3{color:rgb(58, 99, 151);
    font-style: italic;
    text-align:center;
    font-size: 20px;}
    h4{color:rgb(58, 99, 151);
        text-align:center;
        font-style: italic;
    font-size: 20px;}

img {  
    margin-left: 500px;
object-fit: none;  
object-position: center top;  
}  
table {
            font-family: arial;
            margin: 0px auto;
            font-size: 20px;
            border:solid;
        }
        th{
            text-align:center;
            font-size:30px;
            color:whitesmoke;
        }
</style>
<?php
include_once 'database.php';
$sql = "SELECT * FROM user WHERE id='" . $_GET['id'] . "'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
if ($row['picture'] != "") {
    echo "<img src='"  . $row['picture'] . "' width='300' height='300'>";
}
echo "<h3>Name: " . $row['fname'] . "</h3>";
echo "<h3>Email: " . $row['email'] . "</h3>";
echo "<h4>Courses purchased:</h4>";
$sql1 = "SELECT * FROM enroll WHERE learner_id='" . $_GET['id'] . "'";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {

?>
    <table class="table table-hover">
    <thead>
        <tr style="background-color:rgb(17, 16, 16);">
            <th>Course name</th>
        </tr>
        </thead>
        <?php

        while ($row1 = $result1->fetch_assoc()) {
            $sql2 = "SELECT name FROM course WHERE id='" . $row1['course_id'] . "'";
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
        echo "<h5>Not enrolled in any course</h5>";
    }
    ?>
    </table>


</html>