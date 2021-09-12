<?php

include_once('config.php');

/*
 * Load Data
 */
if (count($_GET) > 0) {
    if ($_GET['type'] === 'load') {
        
        $result = mysqli_query($conn, "SELECT * FROM  phonesdirectory  order by id desc");
        $output = "";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>
                        <td>" . $row['id'] . "</td><td>" . $row["name"] . "</td>
                        <td>" . $row['phone'] . "</td>
                            <td class='text-center'>
                                <button class='btn  btn-sm btn-primary' data-id='" . $row['id'] . "' data-toggle='modal' id='edit'>Edit</button>

                                <button class='btn btn-sm btn-danger' data-id='" . $row['id'] . "' data-toggle='modal' id='delete'>Delete</button>
                            </td></tr>";
        }
        
        
    }
}


/*
* Update Data
*/

if (count($_POST) > 0) {
    if ($_POST['type'] == "update") {
        $id    = $_POST['id'];
        $name  = $_POST['name'];
        $phone = $_POST['phone'];
        $query = "UPDATE `phonesdirectory` SET `name`='$name',`phone`='$phone' WHERE id=$id";
        mysqli_query($conn, $query);
        echo 'success';
        mysqli_close($conn);
    }
}


/*
* Create Data
*/

if (count($_POST) > 0) {
    if ($_POST['type'] == "create") {
        $name  = $_POST['name'];
        $phone = $_POST['phone'];
        $query = "INSERT INTO `phonesdirectory`( `name`, `phone`) 
        VALUES ('$name','$phone')";
        if (mysqli_query($conn, $query)) {
            echo json_encode(array(
                "statusCode" => 200
            ));
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
}


/*
* Delete Data
*/

if (count($_POST) > 0) {
    if ($_POST['type'] == "delete") {
        $id = $_POST['id'];
        
        $query = "DELETE FROM `phonesdirectory` WHERE id=$id ";
        if (mysqli_query($conn, $query)) {
            echo $id;
        } else {
            echo "Error:: " . $query . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
}


if (count($_GET) > 0) {
    if ($_GET['type'] == "edit") {
        $id = $_GET['id'];
        
        $query = "SELECT * FROM `phonesdirectory` WHERE id=$id ";
        $result = mysqli_query($conn, $query);

		$row = mysqli_fetch_assoc($result);
		echo '<form id="data_form">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label" >Name</label>
            <input type="text" required="" class="form-control" id="ename" value="'.$row['name'].'">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label" >Phone</label>
            <input type="number" required="" min="100000000" max="100000000000" value="'.$row['phone'].'" class="form-control" id="ephone">
          </div>
        </form>';
        mysqli_close($conn);
    }
}


?>