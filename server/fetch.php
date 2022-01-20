<?php
include 'database.php';
$output = '';

if (isset($_POST["query"])) {
	$id = 1;
	$search = mysqli_real_escape_string($conn, $_POST["query"]);
	$query = "
	SELECT * FROM course WHERE name LIKE '$search%';
	";
} else {
	$id = -1;
	$query = "
	SELECT * FROM course WHRERE id=-1";
}
if ($id == 1) {
	$result = mysqli_query($conn, $query);
	if ($result->num_rows > 0) {
		$output .= '<div class="dropdown-content" style="position:absolute;left:20%">';
		while ($row = mysqli_fetch_array($result)) {
			$output .=  "<a style='text-decoration:none; color:black; display: inline-block;margin:0.01em' href='courses.php?id=" . $row['id'] . "'>" . $row['name'] . "</a><hr style='width:40px'>";
		}
		$output .= '</div>';
		echo $output;
	} else {
		echo '<p style="position:absolute;left:20%">Data Not Found</p>';
	}
}
