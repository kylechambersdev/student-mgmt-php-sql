<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
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

if(isset($_POST['add_teacher']))
{
    $name = $_POST['name'];
    $description = $_POST['description'];
    //saving file relative to username ('name')
    $file = $_FILES['image']['name'];
    //pathway to saving file to directory
    $dst = "teacher_image/".$file;
    //pathway to saving file to database
    $dst_db = "teacher_image/".$file;
    //move file to directory
    move_uploaded_file($_FILES['image']['tmp_name'],$dst);
    $sql = "INSERT INTO teacher (name, description, image) VALUES ('$name', '$description', '$dst_db')";
    $result = mysqli_query($data, $sql);

    if($result)
    {
        echo "<script type='text/javascript'>
        alert('Teacher successfully added!');
        </script>";
        echo "<script>window.open('admin_add_teacher.php', '_self')</script>";
    }
    else
    {
        echo "Failed to add teacher";
    }
    

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Teacher</title>
<?php
include 'admin_css.php';
?>
<style>
    label {
        display: inline-block;
        text-align: right;
        width: 150px;
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
include 'admin_sidebar.php';
?>

    <div class="content">
        <center>
        <h1>Add Teacher</h1><br><br>
        <div class="div_deg">
            <form action="#" method="POST" enctype="multipart/form-data">
                <div>
                    <label for="">Teacher Name :</label>
                    <input type="text" name="name">
                </div>
                <br>
                <div>
                    <label for="">Description :</label>
                    <textarea name="description" id=""></textarea>
                </div>
                <br>
                <div>
                    <label for="">Image :</label>
                    <input type="file" name="image">
                </div>
                <br>
                <div>
                    <input class="btn btn-primary" type="submit" name="add_teacher" value="Add Teacher">
                </div>
            </form>
        </div>
        </center>
    </div>

</body>
</html>