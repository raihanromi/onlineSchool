<?php include_once("Student/stuInclude/header.php"); ?>

<?php include("dbConnection.php");
session_start();
$user_id=$_SESSION['user_id'];

$sql="SELECT * FROM course,enrolls,user WHERE course.course_code=enrolls.course_code AND enrolls.user_id=user.user_id AND user.user_id='$user_id'";

$result=$con->query($sql);

if($result->num_rows >0){
  while($row=$result->fetch_assoc()){
    $course_code=$row['course_code'];
    echo '<div class="card mb-3" style="max-width: 100%;">
  <div class="row g-0">
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">'.$row['course_code'].'</h5>
        <p class="card-text">'.$row['course_name'].'</p>
      </div>
    </div>
  </div>
</div>';

  }
}

?>

<?php include_once("Student/stuInclude/footer.php"); ?>