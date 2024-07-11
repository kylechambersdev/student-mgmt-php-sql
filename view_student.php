<?php
error_reporting(0);
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

$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

$data = mysqli_connect($host, $user, $password, $db);

$sql = "SELECT * FROM user WHERE usertype='student'";

$result = mysqli_query($data, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Student</title>
<?php
include 'admin_css.php';
?>
<style>
    th, td {
        border: 1px solid black;
    }
    
    .table_th {
        padding: 20px;
        font-size: 20px;
    }
    .table_td {
        background-color: skyblue;
        font-size: 15px;
        padding: 10px;
    }
</style>
</head>
<body>

<?php
include 'admin_sidebar.php';
?>

    <div class="content">
        <center>
            <h1>Student Data</h1>
            <?php

                if($_SESSION['message'])
                {
                    //delivers message from delete.php
                    echo $_SESSION['message'];
                }
                //refreshing browswer will clear the message
                unset ($_SESSION['message']);
                

            ?>
            <br>
            <table border="1px">
                <tr>
                    <th class="table_th">Username</th>
                    <th class="table_th">Email</th>
                    <th class="table_th">Phone</th>
                    <th class="table_th">Password</th>
                    <th class="table_th">Delete</th>
                    <th class="table_th">Update</th>
                </tr>
                <?php
                        //fetches the data from the db, fetch_assoc() is used to fetch the data as an associative array
                        while($info = $result -> fetch_assoc())
                        {
                    ?>
                <tr>
                    <td class="table_td"><?php echo "{$info['username']}" ?></td>
                    <td class="table_td"><?php echo "{$info['email']}" ?></td>
                    <td class="table_td"><?php echo "{$info['phone']}" ?></td>
                    <td class="table_td"><?php echo "{$info['password']}" ?></td>
                    <!-- sends student id to delete.php and also asks for confirmation with javascript -->
                    <td class="table_td"><?php echo "<a class='btn btn-danger' onClick=\"javascript: return confirm('Are you sure?');\" href='delete.php?student_id={$info['id']}'>Delete</a>"; ?></td>
                    <td class="table_td"><?php echo "<a class='btn btn-primary' href='update_student.php?student_id={$info['id']}'>Update</a>"; ?></td>
                </tr>
                <?php
    }
    ?>
            </table>
        </center>
    </div>
    
</body>
</html>