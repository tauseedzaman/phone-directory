<?php 
include_once("config.php");
require 'vendor/autoload.php';
session_start();
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$result = mysqli_query($conn, "SELECT * FROM  phonesdirectory ");
        $output = '
			<h1 style="text-align: center; padding: 10px;color: cyan;background:black">Phone Directory Data by <span style="color:blue">'.$_SESSION['user'].'</span></h1>
			<table style="width: 100%;text-align: center;table-layout: all;text-align-last: center;">
					<tr style=" color: yellow;background:green">	
						<td><h2>#</h2></td>
						<td><h2>Name</h2></td>
						<td><h2>Phone</h2></td>
					</tr>
					<tbody>';
        while ($row = mysqli_fetch_array($result)) {
           $output .= "<tr>
                        <td>" . $row['id'] . "</td>
                        <td>" . $row["name"] . "</td>
                        <td>" . $row['phone'] . "</td>
                        </tr>";
        }
        $output .='</tbody>
				</table> <br /><br /><br /><br /><br /><br /><br /><p style="text-align: center; padding: 10px;color: cyan;background:black;text-align: center; margin-top:10px">© Copyright By <a href="https://github.com/tauseedzaman"> Tauseed zaman :)</a></p>';
$dompdf->loadHtml($output);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream();
Header("Location: index.php");
?>