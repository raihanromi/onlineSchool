<?php
include_once 'dbConnection.php';
session_start();
$aid=$_GET['c_id'];

$sql="DELETE FROM contents WHERE c_id = $aid";
mysqli_query($con,$sql);
header('Location:assignment.php');
?>