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

$host="localhost";
$user="root";
$password="";
$db="schoolproject";
//connect to database
$data = mysqli_connect($host, $user, $password, $db);
//grabbing name/username from the session already started above^
$name = $_SESSION['username'];
//requesting the rest of the user data from db using the username
$sql = "SELECT * FROM user WHERE username = '$name'";
//executes the query, storing into a variable
$results = mysqli_query($data, $sql);
//fetches the result as an associative array into variable
$info = mysqli_fetch_assoc($results);

if(isset($_POST['update_profile']))
{
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
//recall $name was established above^
    $query = "UPDATE user SET email='$email', phone='$phone', password='$password' WHERE username='$name'";
    
    $result = mysqli_query($data, $query);

    if($result)
    {
        //good example of using javascript to alert then reload the page after alert is cleared
        echo "<script>alert('Profile Updated Successfully')</script>";
        echo "<script>window.open('student_profile.php', '_self')</script>";
    }
    else
    {
        echo "<script>alert('Profile Update Failed')</script>";
        echo "<script>window.open('student_profile.php', '_self')</script>";
    
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
<?php
include 'student_css.php';
?>
<style>
    label {
        display: inline-block;
        text-align: right;
        width: 100px;
        padding: 10px 0;
    }

    .div_deg {
        background-color: skyblue;
        width: 500px;
        padding: 70px 0;
    }
</style>
</head>
<body>
<?php

include 'student_sidebar.php';

?>

<div class="content">
<center>
    <h1>Student Profile</h1>
    <br>
    <form action="#" method="POST">
        <div class="div_deg">
            <div>
                <label for="">Email</label>
                <input type="text" name="email" value="<?php echo "{$info['email']}"?>">
            </div>
            <div>
                <label for="">Phone</label>
                <input type="text" name="phone" value="<?php echo "{$info['phone']}"?>">
            </div>
            <div>
                <label for="">Password</label>
                <input type="text" name="password" value="<?php echo "{$info['password']}"?>">
            </div>
            <div>
                <input class="btn btn-primary" type="submit" name="update_profile" value="Update">
            </div>
        </div>
    </form>
    </center>
</div>


    
</body>
</html>
