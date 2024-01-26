<?php
	include_once 'dbConnection.php';
	if(isset($_GET['n'])){
		$n = $_GET['n'];
		$eid=$_GET['eid'];
	}else if(!isset($_GET['n'])){
		$n =1;
		$eid=rand(100000,999999);
		$name=ucfirst($_GET['name']);
		$course=$_GET['course'];
		$date=$_GET['date'];
		$start=$_GET['start'];
		$end=$_GET['end'];
		$duration=$_GET['duration'];
		$attempt=$_GET['attempt'];


		
		$current_date = date("d-m-y h:i:s");
		$sql1="INSERT INTO contents(c_id,update_time,c_type) VALUES ('$eid','$current_date','exam');";
		mysqli_query($con,$sql1);

		$sql2="INSERT INTO contains(course_code,c_id) VALUES ('$course','$eid');";
		mysqli_query($con,$sql2);

		$sql3="INSERT INTO exam(c_id,name,date,duration,start_time,end_time,max_attempt, examStatus) VALUES ('$eid','$name','$date','$duration','$start','$end','$attempt','active');";
		mysqli_query($con,$sql3);
	}
	
	include_once 'header.php';
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Create Questions</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
	<form action="addQuestions.php" method="GET" id="form" style="padding: 50px; padding-bottom: 40px">
		<input type="hidden" name="eid" value="<?php echo $eid; ?>">
		<label for="n">Question No.</label>
		<input class="form-control" type="number" name="n" id="n" value="<?php echo $n; ?>" disabled>
		<h5>Insert all the informations correctly:</h5>
		<input class="form-control" type="text" name="q" placeholder="Question text" required>
		<h5>Set the options for the question:</h5>
		<input class="form-control" type="text" name="o1" placeholder="Option-1 text" required>
		<input class="form-control" type="text" name="o2" placeholder="Option-2 text" required>
		<input class="form-control" type="text" name="o3" placeholder="Option-3 text" required>
		<input class="form-control" type="text" name="o4" placeholder="Option-4 text" required>
		<br>
		<h5>Assign a mark:</h5>
		<input class="form-control" type="number" name="mark" placeholder="Allocate a Mark for this question">
		<h5>Choose the correct option:</h5>
		<select class="form-control-sm" name="co" required>
			<option>Select One</option>
			<option value="option_1">Option-1</option>
			<option value="option_2">Option-2</option>
			<option value="option_3">Option-3</option>
			<option value="option_4">Option-4</option>
		</select>
		<br>
		<button class="btn btn-outline-success" type="SUBMIT">Confirm & Next</button>
	</form>
	<hr>
	<form action="exam.php" method="GET" style="padding-left: 100px">
		<input name="d" type="hidden" value="0">
		<h5>If you are done adding questions, press the done button</h5>
		<button class="btn btn-success" type="SUBMIT">Done</button>	
	</form>
	
</body>
</html>