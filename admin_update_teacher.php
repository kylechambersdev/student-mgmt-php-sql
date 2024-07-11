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

if($_GET['teacher_id'])
{
    $id = $_GET['teacher_id'];
    $sql = "SELECT * FROM teacher WHERE id='$id'";
    $result = mysqli_query($data, $sql);
    $info = $result->fetch_assoc();
}

if (isset($_POST['update_teacher']))
{
    $id = $_POST['id'];
    $description = $_POST['description'];
    $newimage = $_FILES['newimage']['name'];
    $dst = "teacher_image/".$newimage;
    $dst_db = "teacher_image/".$newimage;
    move_uploaded_file($_FILES['newimage']['tmp_name'], $dst);
    if($newimage)
    {
        $sql = "UPDATE teacher SET description='$description', image='$dst_db' WHERE id ='$id'";
    }
    else
    {
        $sql = "UPDATE teacher SET description='$description' WHERE id ='$id'";
    }

    $result = mysqli_query($data, $sql);

    if($result)
    {
        echo "<script type='text/javascript'>
        alert('Great Success!');
        </script>"; 
        echo "<script>window.open('admin_view_teacher.php', '_self')</script>";
    }
    else
    {
        echo "Failed to update teacher data";
    }
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
    .form_deg {
        background-color: skyblue;
        width: 600px;
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
        <h1>Update Teacher Data</h1>
        <!-- the encytype required to submit images -->
            <form class="form_deg" action="#" method=POST enctype="multipart/form-data">
            <label for="teacher_id">Id :</label>
            <input type="text" name="id" value="<?php echo "{$info['id']}" ?>">
                <div>
                    <label for="teacher_id">About Teacher :</label>
                    <textarea name="description" id=""><?php echo "{$info['description']}" ?></textarea>
                </div>
                <div>
                    <label for="teacher_id">Current Teacher Picture :</label>
                    <img height="150px" width="150px" src="<?php echo "{$info['image']}" ?>" alt="">
                </div>
                <div>
                    <label for="teacher_id">New Teacher Picture :</label>
                    <input type="file" name="newimage">
                </div>
                <input class="btn btn-success" type="submit" name="update_teacher">
            </form>
    </center>
</div>

</body>
</html>