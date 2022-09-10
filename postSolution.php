<?php
include_once 'dbConnection.php';
session_start();
$eid=$_GET['c_id'];

$sql="UPDATE exam SET examStatus = 'ended' WHERE c_id = $eid";
mysqli_query($con,$sql);
header('Location:exam.php');
?>