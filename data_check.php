<?php
session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

$data = mysqli_connect($host, $user, $password, $db);

if($data === false)
{
    die("connection error");
}

if(isset($_POST['apply']))
{
    //used different variable names from login_check to show their irrelevance
    $data_name = $_POST['name'];
    $data_email = $_POST['email'];
    $data_phone = $_POST['phone'];
    $data_message = $_POST['message'];
//inserts the data into the database
    $sql = "INSERT INTO admission (name, email, phone, message) VALUES ('$data_name', '$data_email', '$data_phone', '$data_message')";
//checks if the data has been inserted
    $result = mysqli_query($data, $sql);

    if($result)
    {
        $_SESSION['message'] = "You have successfully applied!";
        header("Location: index.php");
    }
    else
    {
        echo "Failed to Apply:(";
    }
}
    

?>