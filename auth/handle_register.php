<?php 
if(isset($_POST['email']) and isset($_POST['username']) and isset($_POST['password'])){
    include_once("../config.php");
    $username = $conn->real_escape_string($_POST['username']);
    $email =    $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string(md5($_POST['password']));
    $query = "INSERT INTO `users`(`email`, `username`, `password`) VALUES ('$email', '$username', '$password')";
    if ($result = $conn->query($query)) 
    {
        echo "its done";
        header("Location: ../login.php"); 
    }

}else{
    echo "invalid entry";
}

?>