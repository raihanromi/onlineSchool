<?php
	session_start();
	include_once 'dbConnection.php';
	include_once'header.php';
	$exam=$_GET['exam'];
	echo "<h4 style='padding-left:500px'>Questions of exam: ".$exam."</h4>";	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Questions</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	
</head>
<body>
	<div class="container-fluid" style="align-self: center; padding: 80px">
	<form>
	<?php
	$sql="SELECT * FROM question WHERE c_id=$exam;";
	$result=mysqli_query($con,$sql);
	$check=mysqli_num_rows($result);
	$c=1;
	if($check!=0){
		while ($row=mysqli_fetch_array($result)) {
				echo "<h4>".$c++.".	".$row['question']."&emsp;&emsp;&emsp; <small class='text-muted'> Mark allocated: ".$row['marks']."</small></h4>";
				echo "<div class='container-fluid'>
				<div class='form-check'>
					  <input class='form-check-input' type='radio' id='".$c."option_1' disabled>
					  <label class='form-check-label-lg' for='$c.option_1'>
					    ".$row['option_1']."
					  </label>
					</div>
					<div class='form-check'>
					  <input class='form-check-input' type='radio' id='".$c."option_2' disabled>
					  <label class='form-check-label-lg' for='$c.option_2'>
					    ".$row['option_2']."
					  </label>
					</div>
					<div class='form-check'>
					  <input class='form-check-input' type='radio' id='".$c."option_3'  disabled>
					  <label class='form-check-label-lg' for='$c.option_3'>
					    ".$row['option_3']."
					  </label>
					</div>
					<div class='form-check'>
					  <input class='form-check-input' type='radio' id='".$c."option_4' disabled>
					  <label class='form-check-label-lg' for='$c.option_4'>
					    ".$row['option_4']."
					  </label>

					</div>
					</div>
					<br>
					<hr>";
					$radio="".$c."".$row['correct_option']."";
					echo "<script>
						document.getElementById('$radio').classList.add('is-valid');
						document.getElementById('$radio').checked = true;
						document.getElementById('$radio').disabled = false;
						</script>";

				}
	}else{
		echo "No questions added";
	}
	?>
</form>
</div>
</body>
</html>