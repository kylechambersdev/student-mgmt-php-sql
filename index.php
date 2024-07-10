<?php

error_reporting(0);
session_start();
session_destroy();

if($_SESSION['message'])
{
    $message = $_SESSION['message'];
    echo "<script type='text/javascript'>
    alert('$message');
    </script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/main.css">
</head>
<body>
    <!-- navbar -->
    <nav>
        <label for="" id="logo">W-School</label>
        <ul>
            <li><a href="">Home</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="">Admission</a></li>
            <li><a href="login.php" class="btn btn-success">Login</a></li>
        </ul>
    </nav>
    <!-- hero image -->
    <div class="section1">
        <img src="images/hero.jpg" alt="" id="main_img">
        <label for="" id="img_text">We Teach Students With Care</label>
    </div>
<!-- Welcome section -->
    <div class="container">
        <div class="row">
            <div class="col-md-4 align-content-center">
                <img src="images/building1.jpg" alt="" id="welcome_img">
            </div>
            <div class="col-md-8">
                <h1>Welcome to W-Schools</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore reiciendis accusamus fugiat sit, quidem totam quos laudantium sapiente consequuntur suscipit corrupti dignissimos distinctio ex explicabo a sint molestiae eius dolore qui quae doloremque facilis cum atque. Reiciendis excepturi voluptatibus, dolore minus sed nostrum culpa voluptatum modi, nam ut quam nobis!</p>
            </div>
        </div>

    </div>
<!-- Our Teachers section -->
    <center>
        <h1>Our Teachers</h1>
    </center>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="images/teacher1.webp" class="teacher" alt="">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ut fuga perspiciatis eaque harum asperiores eligendi facere quaerat excepturi deserunt sunt?</p>
            </div>
            <div class="col-md-4">
                <img src="images/teacher2.jpg" class="teacher" alt="">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ut fuga perspiciatis eaque harum asperiores eligendi facere quaerat excepturi deserunt sunt?</p>
            </div>
            <div class="col-md-4">
                <img src="images/teacher3.jpg" class="teacher" alt="">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ut fuga perspiciatis eaque harum asperiores eligendi facere quaerat excepturi deserunt sunt?</p>
            </div>
        </div>
    </div>
<!-- Our Courses Section -->
    <center>
        <h1>Our Courses</h1>
    </center>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="images/courses1.jpg" class="teacher" alt="">
                <h3>Web Development</h3>
            </div>
            <div class="col-md-4">
                <img src="images/courses2.avif" class="teacher" alt="">
                <h3>Graphic Design</h3>
            </div>
            <div class="col-md-4">
                <img src="images/courses3.jpg" class="teacher" alt="">
                <h3>Digital Marketing</h3>
            </div>
        </div>
    </div>
<!-- Admission Form -->
    <center>
        <h1 id="adm">Admission Form</h1>


    <div class="admission_form" align="center">
        <form action="data_check.php" method="POST">
            <div class="admin_int">
                <label class="label_text" for="">Name</label>
                <input class="input_deg" type="text" name="name">
            </div>
            <div class="admin_int">
                <label class="label_text" for="">Email</label>
                <input class="input_deg" type="text" name="email">
            </div>
            <div class="admin_int">
                <label class="label_text" for="">Phone</label>
                <input class="input_deg" type="text" name="phone">
            </div>
            <div class="admin_int">
                <label class="label_text" for="">Message</label>
                <textarea class="input_txt" name="message" id=""></textarea>
            </div>
            <div class="admin_int">
                <input class="btn btn-primary" id="submit" type="submit" value="apply" name="apply">
            </div>
        </form>
    </div>
</center>

    <!-- Footer -->
     <footer>
        <h3 id="footer_text">All © reserved by web tech knowledge</h3>
     </footer>
</body>
</html>