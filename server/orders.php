<?php
session_start();
?>
<html>

<head>
    <meta name="viewport" content="width=device-width , initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script type='text/javascript' src=''></script>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js'></script>

    <title>Orders</title>

</head>
<?php
include 'database.php';
include 'nav.php';
include 'functions.php';
$sql = "SELECT * FROM purchaseItem WHERE purchase_id='" . $_GET['id'] . "'";
$result = $conn->query($sql);
?>

<table class="table caption-top ms-3 table-hover">
    <caption>List of Orders</caption>
    <thead>
        <tr>
            <th scope="col">Course ID</th>
            <th scope="col">Name</th>
            <th scope="col">Amount</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($row = $result->fetch_assoc()) {
            $course = select("SELECT * FROM course WHERE id='" . $row['course_id'] . "'");
        ?>
            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $course['name']; ?></td>
                <td><?php echo "E£" . $course['price'] ?></td>
            </tr>
        <?php
        }
        ?>
</table>

</html>