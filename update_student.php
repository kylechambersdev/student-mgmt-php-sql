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

$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

$data = mysqli_connect($host, $user, $password, $db);

//gets student_id from view_student.php
$id = $_GET['student_id'];
//grab the data for that id
$sql = "SELECT * FROM user WHERE id='$id'";
//exeute the query $sql against $data
$result = mysqli_query($data, $sql);

$info = $result->fetch_assoc();
//upate is the value of the submit button
if(isset($_POST['update']))
{
    //get the values from the form
    $username = $_POST['username'];
    $user_email = $_POST['email'];
    $user_phone = $_POST['phone'];
    $user_password = $_POST['password'];

    //note WHERE comes after specifying the values to be updated, unlike INSERT and DELETE queries
    $query = "UPDATE user SET username='$username', email='$user_email', phone='$user_phone', password='$user_password' WHERE id='$id'";
    //execute the query against the $data connection
    $result = mysqli_query($data, $query);

    if($query)
    {
        echo "<script type='text/javascript'>
        alert('Great Success!');
        </script>"; 
        echo "<script>window.open('view_student.php', '_self')</script>";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>
<?php
include 'admin_css.php';
?>

<style>
    label {
        display: inline-block;
        width: 100px;
        text-align: right;
        padding: 10px 0;
    }

    .div_deg {
        background-color: skyblue;
        width: 400px;
        padding: 70px 0;
    }

</style>
</head>
<body>

<?php
include 'admin_sidebar.php';
?>

    <div class="content">
        <center>
            <h1>Update Student</h1>

            <div class="div_deg">
                <!-- a # in the action means the code for this action will be specified somewhere else in this file -->
                <form action="#" method="POST">
                    <!-- the value of each input fills it with the current data from the db -->
                    <div>
                        <label for="">Username</label>
                        <input type="text" name="username" value="<?php echo "{$info['username']}" ?>">
                    </div>
                    <div>
                        <label for="">Email</label>
                        <input type="text" name="email" value="<?php echo "{$info['email']}" ?>">
                    </div>
                    <div>
                        <label for="">Phone</label>
                        <input type="text" name="phone" value="<?php echo "{$info['phone']}" ?>">
                    </div>
                    <div>
                        <label for="">Password</label>
                        <input type="text" name="password" value="<?php echo "{$info['password']}" ?>">
                    </div>
                    <div>
                        <input class="btn btn-success" type="submit" name="update" value="update">
                    </div>
                </form>
            </div>
        </center>
    </div>

</body>
</html>