<?php
include_once("../dbConnection.php");

// $user=$_POST['role'];

// $_SESSION['user']=$user;

 if (isset($_POST['stuname']) && isset($_POST['stuemail']) && isset($_POST['stupass'])){
    $stuname=$_POST['stuname'];
    $stuemail=$_POST['stuemail'];
    $stupass=$_POST['stupass'];
    $user_type=$_POST['role'];
    $user_id=rand(100000,999999);
   

    $sql="INSERT INTO user(user_id,name,email,password,user_type) VALUES('$user_id','$stuname','$stuemail','$stupass','$user_type') ";

    $con->query($sql);
    header('location:../index.php');

 }


?>