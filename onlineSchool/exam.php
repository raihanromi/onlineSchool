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
	<title>Exams</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<script src="js/exam.js" type="text/javascript" charset="utf-8" async defer></script>
</head>
<body>
	
	<div class="container-fluid" style="padding-top: 40px;padding-left: 20%">
	<table class="table table-sm table-bordered" style="width: 90%">
		<h3>List Of Exams You Posted</h3>
  		<thead class="table-dark">
  			<td>#</td>
  			<td>Course</td>
  			<td>Exam ID</td>
    		<td>Exam Name</td>
    		<td>Date</td>
    		<td>Window Start Time</td>
    		<td>Window End Time</td>
    		<td>Duration (Mins)</td>
    		<td>Maximum Attempt</td>
    		<td>Questions</td>
    		<td>Exam Status</td>
  		</thead>
  		<tbody>
	<?php
	$sql="SELECT * FROM course,contains,contents,exam WHERE (course.course_code = contains.course_code AND contents.c_id = exam.c_id AND contains.c_id = exam.c_id) HAVING contents.c_type = 'exam';";
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
					<td>".$row['date']."</td>
					<td>".$row['start_time']."</td>
					<td>".$row['end_time']."</td>
					<td>".$row['duration']."</td>
					<td>".$row['max_attempt']."</td>
					<td><a href='questions.php?exam=".$row['c_id']."'><button class='btn btn-info btn-sm'>View Questions</button></a>.</td>
					<td>".$row['examStatus']."</td>
				</tr>";
		}
		echo "</table>";
	}else{
		echo "No exams yet";
	}
	?>
	</tbody>
	</table>
	<button onclick="showCreateExam()" class="btn btn-primary">Create New Exam</button>

	<button onclick="showDeleteExam()" class="btn btn-primary">Delete Exam</button>

	<button onclick="showPostSolution()" class="btn btn-primary">End Exam and Post Solution</button>

	<?php

	$sql="SELECT * FROM course WHERE faculty_id = $_SESSION[faculty_id];";
	$result=mysqli_query($con,$sql);
	?>
	<div id="createExam" style="display: none;"><br>
	<h5>Choose course first:</h5>
	<form action="createExam.php" method="GET">
	<select name="course" required>
		<?php
		while ($rows=mysqli_fetch_array($result)) {
				$course=$rows['course_code'];
				echo "<option value='$course'>$course</option>";	
			}
		?>
	</select>
	<br>
	<input type="text" name="name" placeholder="Exam Name" required>
	<input type="date" name="date" placeholder="Date" required>
	<input type="time" name="start" placeholder="Windows Start Time" required>
	<input type="time" name="end" placeholder="Window End Time" required>
	<input type="number" name="duration" placeholder="Duration in Minutes" required>
	<input type="number" name="attempt" placeholder="Maximum Attempt" required>
	<button type="SUBMIT" class="btn btn-outline-success">Create & Add questions</button>
	</form>
	
	<button onclick="hideCreateExam()" class="btn btn-warning">Cancel</button>
	

	<?php

	$sql="SELECT * FROM course,contains,contents,exam WHERE (course.course_code = contains.course_code AND contents.c_id = exam.c_id AND contains.c_id = exam.c_id) HAVING contents.c_type = 'exam';";
	$result=mysqli_query($con,$sql);
	?>

	</div>
	<div id="deleteExam" style="display: none;"><br>
	<h5>Choose the exam you want to delete:</h5>
	<form action="deleteExam.php" method="GET">
	<p>Select the exam ID:</p>
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
	<button onclick="hideDeleteExam()" class="btn btn-warning">Cancel</button>
	
	</div>

	<?php

	$sql="SELECT * FROM course,contains,contents,exam WHERE (course.course_code = contains.course_code AND contents.c_id = exam.c_id AND contains.c_id = exam.c_id) HAVING contents.c_type = 'exam' AND exam.examStatus = 'active';";
	$result=mysqli_query($con,$sql);
	?>

	<div id="postSolution" style="display: none;"><br>
	<h5>Choose the exam to post solution for:</h5>
	<form action="postSolution.php" method="GET">
	<p>Select the exam ID:</p>
	<select name="c_id" required>
		<?php
		while ($rows=mysqli_fetch_array($result)) {
				$exam=$rows['c_id'];
				echo "<option value='$exam'>$exam</option>";	
			}
		?>
	</select>
	<button type="SUBMIT" class="btn btn-outline-success">Post Solution</button>
	</form>
	<br>
	<button onclick="hidePostSolution()" class="btn btn-warning">Cancel</button>
	
	</div>
	</div>
</body>
</html>