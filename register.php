<?php 
/*
* redirect user to index.php if session exists
*/
session_start();
include("config.php");
if (isset($_SESSION['user'])){
    header("Location: index.php");
  }
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>PHP Phone Directory Login</title>
</head>

<body class="">
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto mt-3">
                <div class="card shadow">
                    <div class="card-header">
                        <h1 class="text-center text-info">Register</h1>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" class="form">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" class="form-control" type="email" required name="email">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input id="username" class="form-control" type="text" required name="username">
                            </div>
                            <div class="form-group">
                                <label for="username">Password</label>
                                <input id="username" class="form-control" type="password" required name="password">
                            </div>
                    </div>
                    <div class="card-footer ">
                        <button class="btn btn-success btn-block" type="submit">Register Me</button>
                        <a href="login.php" class="nav-link text-center">Already Registered! login Here</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
if(isset($_POST['email']) and isset($_POST['username']) and isset($_POST['password'])){
    include_once("config.php");
    $username = $conn->real_escape_string($_POST['username']);
    $email =    $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string(md5($_POST['password']));
    $query = "INSERT INTO `users`(`email`, `username`, `password`) VALUES ('$email', '$username', '$password')";
    if ($result = $conn->query($query)) 
    {
        session_start();
        $_SESSION['user'] = $row['username'];
        $_SESSION['user_id'] = $row['id'];
        header("Location: index.php"); 
    }else{
        echo "<script> alert('Whoops! Invalid username or password'); </script>";
    }

}

?>
</body>

</html>