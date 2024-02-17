<?php
session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "school";
$data = mysqli_connect($host,$user,$password,$db);

$sql = "SELECT * FROM user WHERE usertype='student'";
$result=mysqli_query($data,$sql);

if($_GET['student_id']){

    $user_id=$_GET['student_id'];
    $sql="DELETE FROM user WHERE id='$user_id'";
    $result=mysqli_query($data,$sql);

    if($result){
        $_SESSION['message']='Delete Data successful';
        header("location:view_student.php");
    }

}


?>