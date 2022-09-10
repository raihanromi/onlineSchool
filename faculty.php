<?php
session_start();
$_SESSION['user_type']="faculty";
$_SESSION['faculty_id']=1;
include_once 'dbConnection.php';
include_once'header.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>DASHBOARD</title>
</head>
<body>
	<h3 style="padding: 50px">Welcome, Faculty.</h5>
	<h5 style="padding-left: 50px">Use the navigation bar to roam through your desired features.</h3>

</body>
</html>