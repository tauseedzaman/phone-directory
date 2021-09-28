<?php 
if(isset($_POST['username'])){
    include_once("../config.php");
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string(md5($_POST['password']));

    $query = "SELECT * FROM `users` WHERE username='$username' AND password='$password'";
    if ($result = $conn->query($query)) 
    {
        echo "Inside";
        $row = mysqli_fetch_assoc($result);
        session_start();
        $_SESSION['user'] = $row['username'];
        header("Location: ../index.php"); 
    }

}

?>