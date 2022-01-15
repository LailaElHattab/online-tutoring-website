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

</head>
<?php
include_once 'database.php';
$sql = "SELECT * FROM course WHERE id='" . $_POST['id'] . "'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$sql1 = "UPDATE course SET name='" . $_POST['name'] . "' WHERE id='" . $_POST['id'] . "'";
$result1 = $conn->query($sql1);

$path1 = $row['content'];
file_put_contents($path1, $_POST['cont']);

$path2 = $row['description'];
file_put_contents($path2, $_POST['des']);


?>
<div style='width:400px; text-align: center' class="alert alert-success" role="alert">
    Edited successfully
</div>

</html>