<?php
include_once 'database.php';
$connect = mysqli_connect("localhost", "root","","IS3");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * from user where fname '%".$search."%'";
	}
	else{
	echo 'Data not found';
	}
	?>