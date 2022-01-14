<html>

<?php
include_once 'database.php';
$sql = "SELECT * FROM course WHERE id='" . $_GET['id'] . "'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

echo "<h1>" . $row['name'] . "</h1>";

echo "<img src='" . $row['image'] . "'>";
?>

<?php
echo "<form method='post' action='applyEditCourse.php'>";
echo "<input type='hidden' name='id' value=" . $row['id'] . ">";
echo "<textarea  name='name'>" . $row["name"] . "</textarea>";
$path = $row['description'];
echo "<h3>Course Description</h3>";
echo "<textarea name='des' rows='50' cols='100'>" . file_get_contents($path) . "</textarea>";

$content = $row['content'];
echo "<h3>Course content</h3>";
echo "<textarea name='cont' rows='50' cols='100'>" . file_get_contents($content) . "</textarea>";
echo "<input type='submit' name='submit' value='apply'>";

echo "</form>";
?>


</html>