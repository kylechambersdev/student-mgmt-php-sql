<?php
session_start();
$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

$data = mysqli_connect($host, $user, $password, $db);

//if this function gets a student_id which comes from someone clicking delete on view_student.php
if($_GET['student_id'])
{
    //get the student_id
    $user_id = $_GET['student_id'];
    //define the function to delete the student with that id from the sql db
    $sql = "DELETE FROM user WHERE id='$user_id'";
    //run the query $sql through the $data connection
    $results = mysqli_query($data, $sql);
    //if the query is successful.. 
    if($results)
    {
        $_SESSION['message'] = "Student deleted successfully";
        //redirect to view_student.php
        header('Location: view_student.php');
    }
    else
    {

    }
}

?>