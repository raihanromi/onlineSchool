<?php
session_start();
include_once 'dbConnection.php';

include_once 'header.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Courses</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<script src="js/course.js"></script>
</head>
<body>
	<div class="container-fluid" style="padding-top: 40px;padding-left: 30%">
	<table class="table table-sm table-bordered" style="width: 50%">
		<h3>List Of Courses You Created</h3>
  		<thead class="table-dark">
  			<td>#</td>
  			<td>Course_code</td>
    		<td>Course Name</td>
  		</thead>
  		<tbody>
	<?php
	$sql="SELECT * FROM course WHERE faculty_id = $_SESSION[faculty_id];";
	$result=mysqli_query($con,$sql);
	$check=mysqli_num_rows($result);
	$c=1;
	if($check > 0){
		while ($row=mysqli_fetch_array($result)) {
				echo "<tr>
					<td>".$c++."</td>
					<td>".$row['course_code']."</td>
					<td>".$row['course_name']."</td>
				</tr>";
		}
		echo "</table>";
	}else{
		echo "No Courses created yet";
	}
	?>
	</tbody>
	</table>
	<button onclick="showCreateCourse()" class="btn btn-primary">Create New Course</button>

	<div id="createCourse" style="display: none;">
	<form action="createCourse.php" method="GET">
	<input type="text" name="c_code" placeholder="Course Code" required>
	<input type="text" name="c_name" placeholder="Course Name" required>
	<button type="SUBMIT" class="btn btn-outline-success">Confirm</button>
	</form>
	
	<button onclick="hideCreateCourse()" class="btn btn-warning">Cancel</button>
	
	</div>
	</div>
	
	
</body>
</html>