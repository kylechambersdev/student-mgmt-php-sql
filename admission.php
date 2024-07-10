<?php
session_start();
//if whoever accesses this page isnt logged in, redirects to login page
if(!isset($_SESSION['username']))
{
    header('Location: login.php');
}
//if username that has "admin" usertype, then redirects them to login page
elseif($_SESSION['usertype'] == "student")
{
    header('Location: login.php');
}
//connect to database
$host = "localhost";
$user="root";
$password="";
$db="schoolproject";

$data = mysqli_connect($host, $user, $password, $db);
//grab the data from the db admission
$sql = "SELECT * FROM admission";
//
$result = mysqli_query($data, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission</title>
    <?php
    include 'admin_css.php';
    ?>
    <style>
        th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
<?php
include 'admin_sidebar.php';
?>

    <div class="content">
        <center>
            <h1>Applied for Admission</h1>
            <br>
            <!-- admissions table -->
            <table border=1>
                <tr>
                    <th style="padding: 20px; font-size: 15px;">Name</th>
                    <th style="padding: 20px; font-size: 15px;">Email</th>
                    <th style="padding: 20px; font-size: 15px;">Phone</th>
                    <th style="padding: 20px; font-size: 15px;">Message</th>
                </tr>
                <?php
                    //fetches the data from the db, fetch_assoc() is used to fetch the data as an associative array
                    while($info = $result -> fetch_assoc())
                    {

                ?>
                    <tr>
                        <td style="padding: 20px; font-size: 15px;"><?php echo "{$info['name']}" ?></td>
                        <td style="padding: 20px; font-size: 15px;"><?php echo "{$info['email']}" ?></td>
                        <td style="padding: 20px; font-size: 15px;"><?php echo "{$info['phone']}" ?></td>
                        <td style="padding: 20px; font-size: 15px;"><?php echo "{$info['message']}" ?></td>
                    </tr>
                <?php

                    }

                ?>
                
        </table>
        </center>
    </div>


    
</body>
</html>