<!-- Start header -->
<?php include("mainInclude/header.php") ?>
<!-- End header -->

<?php include_once("dbConnection.php") ?>

<center>
<h1 class="my-content">Welcome To Online School</h1>
<?php if(!isset($_SESSION['is_login'])){
   echo '<a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#stuRegModalCenter">Get Started</a>';
}else{
  echo '<a href="studentProfile.php" class="btn btn-success">My profile</a>';
}
?>
</center>

<!-- start text Banner -->
<br>

<div class="container-fluid bg-danger txt-banner" >
    <div class="row bottom-banner">
        <div class="col-sm">
            <h5><i class="fas fa-book-open mr-3"></i> Online Free Courses</h5>
        </div>
        <div class="col-sm">
            <h5><i class="fas fa-users mr-3"></i> Expert Teacher</h5>
        </div>
        <div class="col-sm">
            <h5><i class="fas fa-keyboard mr-3"></i> Full Access</h5>
        </div>
    </div>
</div>
<!-- end text Banner -->





<!--Start  Registration Modal -->
<!-- Modal -->
<?php include("RegistrationForm.php") ?>
<!-- END  Registration Modal -->


<!-- Start  login form Modal -->
<!-- Modal -->
 <?php include("LoginForm.php")?>
 <!-- END  login form Modal -->

 <br> 


<!-- Start footer -->
<?php include("mainInclude/footer.php") ?>
<!-- End footer -->