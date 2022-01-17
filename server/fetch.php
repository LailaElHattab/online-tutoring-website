<?php
include 'database.php';
$output = '';
if (isset($_POST["query"])) {
	$search = mysqli_real_escape_string($conn, $_POST["query"]);
	$query = "
	SELECT * FROM course WHERE name LIKE '%$search%';
	";
} else {
	$query = "
	SELECT * FROM course ORDER BY id";
}
$result = mysqli_query($conn, $query);
if ($result->num_rows > 0) {
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>Course Name</th>
						</tr>';
	while ($row = mysqli_fetch_array($result)) {
		$output .= '
			<tr>
				<td>' . $row["name"] . '</td>
				
			</tr>
		';
	}
	echo $output;
} else {
	echo 'Data Not Found';
}