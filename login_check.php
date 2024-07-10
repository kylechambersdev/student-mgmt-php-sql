<?php
error_reporting(0);
session_start();

$host="localhost";
$user="root";
$password="";
$db="schoolproject";
//connect to database
$data = mysqli_connect($host, $user, $password, $db);

// if not connected to server, then show error
if($data === false)
{
    die("connection error");
}

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    //values coming from submit form
    $name = $_POST['username'];
    $pass = $_POST['password'];
    //grabs all data from user table where username and password match
    $sql = "select * from user where username = '".$name."' AND password = '".$pass."'  ";
//checks to see if data entered matches data in sql
    $result = mysqli_query($data, $sql);
//stores the result in an array
    $row = mysqli_fetch_array($result);
//checks if the user is a student
    if($row["usertype"] == "student")
    {
        //sends the username to studenthome.php
        $_SESSION['username'] = $name;
        $_SESSION['usertype'] = "student";
        //directs to studenthome.php
        header("Location: studenthome.php");
        exit();
    }
    elseif($row["usertype"] == "admin")
    {
        $_SESSION['username'] = $name;
        $_SESSION['usertype'] = "admin";
        //directs to adminhome.php
        header("Location: adminhome.php");
        exit();
    }
    else
    {
        //sends error message to login page
        $message = "username or password do not match";
        $_SESSION['loginMessage'] = $message;;
        header("Location: login.php");
        // echo "Invalid username or password";
    }
}


?>