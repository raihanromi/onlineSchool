<?php
include_once 'dbConnection.php';
session_start();

$admin=$_SESSION['user_type'];
$c_code=$_GET['c_code'];
$c_name=ucfirst($_GET['c_name']);
$f_id=$_SESSION['faculty_id'];
$sql="INSERT INTO course(course_code,course_name,faculty_id) VALUES ('$c_code','$c_name','$f_id');";
mysqli_query($con,$sql);
header('Location:course.php');
?>