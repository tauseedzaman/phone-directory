<?php 

/*
* Export data to csv file
*/
include_once("config.php");

$query = "SELECT * FROM phonesdirectory";
$result = mysqli_query($conn, $query)or die("Eerror!".mysqli_error($conn));

$data = array();
if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)){
			$data[] = $row;
		}
	}	

	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=Data.csv');
	$output = fopen('php://output','w');
	fputcsv($output,array('#','Name','Phone','created_at','updated_at'));

	if (count($data) > 0) {
		foreach ($data as $row) {
			fputcsv($output, $row);
		}
	}
 ?>