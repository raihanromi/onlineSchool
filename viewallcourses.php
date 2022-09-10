<!-- Start Header -->
<?php include("mainInclude/header.php") ?>
<!-- End Header -->

<?php include_once("dbConnection.php"); ?>

<br>
<h1 class="text-center">All Course</h1>
<br>

<!-- Start course card -->
<?php

$sql="SELECT * FROM course";
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
         <a class="btn btn-primary text-white font-weight-bolder float-right" href="coursedetails.php?course_code='.$course_code.'">View</a>
      </div>
    </div>
  </div>
</div>';
  }
}
?>
<!-- End course card -->


<!--Start  Registration Modal -->
<!-- Modal -->
<?php include("RegistrationForm.php") ?>
<!-- END  Registration Modal -->


<!-- Start  login form Modal -->
<!-- Modal -->
 <?php include("LoginForm.php")?>
 <!-- END  login form Modal -->

<!-- Start Footer -->
<?php include("mainInclude/footer.php") ?>
<!-- End Footer -->