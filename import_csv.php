<?php 

include_once("config.php");
/*
* Import data from csv file
*/
 $csvmimes = array('text/x-comma-serated-values','text/comma-serpated-values','application/octet-stream','application/vnd.ms-excel','application/x-csv','text/x-csv','text/csv','application/csv','application/excel','application/vnd.msexcel','text/application');

if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvmimes)) {
	if (is_uploaded_file($_FILES['file']['tmp_name'])) {

		$csvFile = fopen($_FILES['file']['tmp_name'], 'r');
		fgetcsv($csvFile);
		while(($line = fgetcsv($csvFile)) != FALSE){
			$id=$line[0];
			$name=$line[1];
			$phone=$line[2];
			$created_at=$line[3];
			$updated_at=$line[4];

			$prevQuery = "SELECT * FROM phonesdirectory WHERE name='$name'";

			$prevResult = $conn->query($prevQuery);
			if ($prevResult->num_rows > 0 ){
				$conn->query("UPDATE phonesdirectory SET name='$name', phone ='$phone' , created_at=$created_at , updated_at = NOW()");

			}else{
					$conn->query("INSERT INTO phonesdirectory (name,phone,updated_at) VALUES ('$name' ,'$phone',NOW())");

			}
		}
		fclose($csvFile);
		$resback = "resback='Imported successfully'";
	}else{
		$resback = "resback='Error wile importing!'";

	}
}else{
		$resback = "resback='UnknownFile!'";
}     	
header('Location: index.php?'.$resback)


 ?>