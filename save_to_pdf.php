	<?php 

include_once("config.php");
require 'vendor/autoload.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();



$result = mysqli_query($conn, "SELECT * FROM  phonesdirectory ");
        $output = '
	
			<table>
					<thead>	
						<th>#</th>
						<th>Name</th>
						<th>Phone</th>
					</thead>
					<tbody>';
        
        while ($row = mysqli_fetch_array($result)) {
           $output .= "<tr>
                        <td>" . $row['id'] . "</td><td>" . $row["name"] . "</td>
                        <td>" . $row['phone'] . "</td>
                           </tr>";
        }

        $output .='</tbody>
				</table>';

// echo $output;
$dompdf->loadHtml($output);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();

echo 'string';

	 ?>