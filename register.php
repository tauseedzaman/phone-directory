<?php 
include("config.php");
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
                <form method="post" action="auth/handle_register.php" class="form">
                <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" class="form-control" type="email" name="email">
                    </div>
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
            <button class="btn btn-success btn-block" type="submit">Register Me</button>
            <a href="login.php" class="nav-link text-center">Already Registered! login Here</a>
                </form>
            </div>
        </div>
            </div>
        </div>
    </div>


</body>
</html>


