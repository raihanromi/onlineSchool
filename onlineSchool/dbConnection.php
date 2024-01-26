<?php 

$db_host="localhost";
$db_user="root";
$db_password="";
$db_name="online_learning_portal";

$con= new mysqli($db_host,$db_user,$db_password,$db_name);

//check connection
if($con->connect_error){
    die("connection failed");
 }

// else{
//     echo "connected";
//  }


?>