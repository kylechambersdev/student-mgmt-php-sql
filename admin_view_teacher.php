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

$sql = "SELECT * FROM teacher";

$result = mysqli_query($data, $sql);

if($_GET['teacher_id'])
{
    $teacher_id = $_GET['teacher_id'];
    $sql = "DELETE FROM teacher WHERE id='$teacher_id'";
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
        echo "Failed to delete teacher data";
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All Teacher Data</title>
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
        <h1>View All Teacher Data</h1>

        <table border="1px">
            <tr>
                <th class="table_th">Teacher Name</th>
                <th class="table_th">About Teacher</th>
                <th class="table_th">Teacher Picture</th>
                <th class="table_th">Delete</th>
                <th class="table_th">Update</th>
            </tr>
            <?php while ($info = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td class="table_td"><?php echo "{$info['name']}" ?></td>
                <td class="table_td"><?php echo "{$info['description']}" ?></td>
                <td class="table_td"><img height="100px" width="100px" src="<?php echo "{$info['image']}" ?>" alt=""></td>
                <td class="table_td"><?php echo "<a onClick=\"javascript:return confirm('Are you sure?')\" class='btn btn-danger' href='admin_view_teacher.php?teacher_id={$info['id']}'>Delete</a>"?></td>
                <td class="table_td"><?php echo "<a class='btn btn-primary' href='admin_update_teacher.php?teacher_id={$info['id']}'>Update</a>"; ?></td>
            </tr>
            <?php } ?>
        </table>
        </center>
    </div>

</body>
</html>