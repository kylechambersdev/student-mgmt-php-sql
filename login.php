<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/main.css">
</head>
<body background="images/building1.jpg" id="body_deg">

<center>
    <div class="form_deg">
        <center class="title_deg">
            Login Form
            <!-- this is to display the error message if wrong u/n or pw is put in -->
            <h4><?php
                error_reporting(0);
                session_start();
                session_destroy();
                echo $_SESSION['loginMessage'];
                ?></h4>
        </center>
        <form class="login_form" action="login_check.php" method="POST">
            <div>
                <label class="label_deg" for="">Username</label>
                <input type="text" name="username">
            </div>
            <div>
                <label class="label_deg" for="">Password</label>
                <input type="password" name="password">
            </div>
            <div>
                <input class="btn btn-primary" type="submit" name="submit" value="Login">
            </div>
        </form>
    </div>
</center>
    
</body>
</html>