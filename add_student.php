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
$user="root";
$password="";
$db="schoolproject";

$data = mysqli_connect($host, $user, $password, $db);

if(isset($_POST['add_student']))
{
    $username = $_POST['username'];
    $user_email =$_POST['email'];
    $user_phone = $_POST['phone'];
    $user_password = $_POST['password'];
    $usertype = "student";
    /*
    //check if username already exists
    //select all instances where username in db is the same as the one submitted
    $check = "SELECT * FROM user WHERE username = '$username'";
    //run the query
    $check_user = mysqli_query($data, $check);
    //count the number of rows with the same username
    $row_count = mysqli_num_rows($check_user);
    if($row_count > 0)
    {
        echo "<script type='text/javascript'>
        alert('Username already exists. Please choose a different username.');
        </script>";
        header('Location: add_student.php');
    }
*/
        $sql = "INSERT INTO user (username, email, phone, password, usertype) VALUES ('$username', '$user_email', '$user_phone', '$user_password', '$usertype')";
        $result = mysqli_query($data, $sql);

        if($result)
        {
            echo "<script type='text/javascript'>
            alert('Student successfully added!');
            </script>"; 
            header('Location: view_student.php');
        }
        else
        {
            echo "Failed to add student";
        }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
<?php
include 'admin_css.php';
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
            <h1>Add Student</h1>
            <div class="div_deg">
                <form action="#" method="POST">

                    <div>
                        <label for="">Username</label>
                        <input type="text" name="username">
                    </div>
                    <div>
                        <label for="">Email</label>
                        <input type="text" name="email">
                    </div>
                    <div>
                        <label for="">Phone</label>
                        <input type="text" name="phone">
                    </div>
                    <div>
                        <label for="">Password</label>
                        <input type="text" name="password">
                    </div>
                    <div>
                        <input type="submit" class="btn btn-primary" name="add_student" value="Add student">
                    </div>

                </form>
            </div>

        </center>

    </div>

</body>
</html>