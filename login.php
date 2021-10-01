<?php 
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<script src="https://apis.google.com/js/platform.js" async defer></script>
    <title>PHP Phone Directory Login</title>
</head>
<body class="">
<br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto mt-3">
        <div class="card shadow">
            <div class="card-header">
        <h1 class="text-center text-info">Login</h1>
            </div>
            <div class="card-body">
                <form method="post" action="auth/handle_login.php" class="form">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input id="username" class="form-control" type="text" name="username">
                    </div>
                    <div class="form-group">
                        <label for="username">Password</label>
                        <input id="username" class="form-control" type="password" name="password">
                    </div>
            </div>
            <div class="card-footer ">
            <button class="btn btn-success btn-block" type="submit">Login</button>
            <a href="register.php" class="nav-link text-center">Not Registered! Click Here</a>
            <a href="" class="nav-link text-center">Sign in wth google <i class="fas fa-google"></i></a> 
            <a href="" class="nav-link text-center">Sign in wth Facebook <i class="fas fa-facebook"></i></a> 
                </form>
            </div>
        </div>
            </div>
        </div>
    </div>


</body>
</html>