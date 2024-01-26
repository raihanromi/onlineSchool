<?php
	session_start();
	include_once 'dbConnection.php';
	include_once'header.php';
	if(isset($_GET['d'])){
		unset($_SESSION['n']);
		echo "<script>
			alert('Questions have been added successfully');
		</script>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Assignments</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<script src="js/assignment.js" type="text/javascript" charset="utf-8" async defer></script>
</head>
<body>
	
	<div class="container-fluid" style="padding-top: 40px;padding-left: 20%">
	<table class="table table-sm table-bordered" style="width: 90%">
		<h3>List Of Assignments You Posted</h3>
  		<thead class="table-dark">
  			<td>#</td>
  			<td>Course</td>
  			<td>Assignment ID</td>
    		<td>Assignment Name</td>
    		<td>Deadline</td>
    		<td>File Link</td>
  		</thead>
  		<tbody>
	<?php
	$sql="SELECT * FROM course,contains,contents,assignment WHERE (course.course_code = contains.course_code AND contents.c_id = assignment.c_id AND contains.c_id = assignment.c_id) HAVING contents.c_type = 'assignment';";
	$result=mysqli_query($con,$sql);
	$check=mysqli_num_rows($result);
	$c=1;
	if($check!=0){
		while ($row=mysqli_fetch_array($result)) {
				echo "<tr>
					<td>".$c++."</td>
					<td>".$row['course_code']."</td>
					<td>".$row['c_id']."</td>
					<td>".$row['name']."</td>
					<td>".$row['deadline']."</td>
					<td>".$row['file']."</td>
				</tr>";
		}
		echo "</table>";
	}else{
		echo "No assignments yet";
	}
	?>
	</tbody>
	</table>
	<button onclick="showPostAssignment()" class="btn btn-primary">Post New Assignment</button>

	<button onclick="showDeleteAssignment()" class="btn btn-primary">Delete Assignment</button>


	<?php

	$sql="SELECT * FROM course WHERE faculty_id = $_SESSION[faculty_id];";
	$result=mysqli_query($con,$sql);
	?>
	<div id="postAssignment" style="display: none;"><br>
	<h5>Choose course first:</h5>
	<form action="postAssignment.php" method="GET">
	<select name="course" required>
		<?php
		while ($rows=mysqli_fetch_array($result)) {
				$course=$rows['course_code'];
				echo "<option value='$course'>$course</option>";	
			}
		?>
	</select>
	<br>
	<input type="text" name="name" placeholder="Assignment Name" required>
	<input type="datetime-local" name="deadline" placeholder="Deadline" required>
	<input type="text" name="file" placeholder="File Link" required>
	<button type="SUBMIT" class="btn btn-outline-success">Post Assignment</button>
	</form>
	
	<button onclick="hidePostAssignment()" class="btn btn-warning">Cancel</button>
	

	<?php

	$sql="SELECT * FROM course,contains,contents,assignment WHERE (course.course_code = contains.course_code AND contents.c_id = assignment.c_id AND contains.c_id = assignment.c_id) HAVING contents.c_type = 'assignment';";
	$result=mysqli_query($con,$sql);
	?>

	</div>
	<div id="deleteAssignment" style="display: none;"><br>
	<h5>Choose the assignment you want to delete:</h5>
	<form action="deleteAssignment.php" method="GET">
	<p>Select the assignment ID:</p>
	<select name="c_id" required>
		<?php
		while ($rows=mysqli_fetch_array($result)) {
				$exam=$rows['c_id'];
				echo "<option value='$exam'>$exam</option>";	
			}
		?>
	</select>
	<button type="SUBMIT" class="btn btn-outline-success">Confirm</button>
	</form>
	<br>
	<button onclick="hideDeleteAssignment()" class="btn btn-warning">Cancel</button>
	
	</div>

	</div>
</body>
</html>