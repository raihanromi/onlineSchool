<?php
	include_once 'dbConnection.php';
	
	$aid=rand(100000,999999);
	$name=ucfirst($_GET['name']);
	$course=$_GET['course'];
	$deadline=$_GET['deadline'];
	$file=$_GET['file'];


	
	$current_date = date("d-m-y h:i:s");
	$sql1="INSERT INTO contents(c_id,update_time,c_type) VALUES ('$aid','$current_date','assignment');";
	mysqli_query($con,$sql1);

	$sql2="INSERT INTO contains(course_code,c_id) VALUES ('$course','$aid');";
	mysqli_query($con,$sql2);

	$sql3="INSERT INTO assignment(c_id,name,deadline,file) VALUES ('$aid','$name','$deadline','$file');";
	mysqli_query($con,$sql3);
	
	include_once 'header.php';
	session_start();
	header("Location: assignment.php")
?>