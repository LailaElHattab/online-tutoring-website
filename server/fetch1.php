<?php
include 'database.php';
$output = '';

if (isset($_POST["query"])) {
    $id = 1;
    $search = mysqli_real_escape_string($conn, $_POST["query"]);
    $query = "
	SELECT * FROM user WHERE fname LIKE '$search%';
	";
} else {
    $id = -1;
    $query = "
	SELECT * FROM user WHERE name=-1";
}
if ($id == 1) {
    $result = mysqli_query($conn, $query);
    if ($result->num_rows > 0) {
        $output .= '<div class="dropdown-content" >';
        while ($row = mysqli_fetch_array($result)) {
            $output .=  "<a style='text-decoration:none; color:black; display: inline-block;margin:0.01em' href='message.php?receiver=" . $row['id'] . "'>" . $row['fname'] . "</a><hr style='width:40px'>";
        }
        $output .= '</div>';
        echo $output;
    } else {
        echo '<p>Not Found</p>';
    }
}
