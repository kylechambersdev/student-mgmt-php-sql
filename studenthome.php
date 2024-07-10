<?php
session_start();
//if whoever accesses this page isnt logged in, redirects to login page
if(!isset($_SESSION['username']))
{
    header('Location: login.php');
}
//if username that has "admin" usertype, then redirects them to login page
elseif($_SESSION['usertype'] == "admin")
{
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/user.css">
</head>
<body>
<!-- navbar -->
    <header class="header">
        <a href="">Student Dashboard</a>
        <div class="logout">
            <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
    </header>
<!-- side navbar -->
    <aside>
        <ul>
            <li><a href="">My Courses</a></li>
            <li><a href="">My Result</a></li>
        </ul>
    </aside>

    <div id="content">

        <input type="text">
    </div>


    
</body>
</html>
