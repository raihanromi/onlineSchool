<?php include("dbConnection.php")?>

<?php if(!isset($_SESSION)){
  session_start();
} ?>
<?php if (isset($_SESSION['name']) && isset($_SESSION['user_id']) && $_SESSION['user_type']=='student') {  ?>
   
  <?php include_once("Student/stuInclude/header.php"); ?>

<br>
<center>
  <h1>Student Profile</h1>
</center>
<br>

  <div class="accordion accordion-flush" id="accordionFlushExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
      User ID
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body"><?php echo $_SESSION['user_id']?></div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
        Name
      </button>
    </h2>
    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body"><?php echo $_SESSION['name']?></div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
        Email
      </button>
    </h2>
    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body"><?php echo $_SESSION['email']?></div>
    </div>
  </div>
</div>


 <?php include_once("Student/stuInclude/footer.php"); ?>

<?php }
elseif($_SESSION['user_type']=='faculty'){
  header("location:faculty.php");
}
else{ 
    header("Location:index.php");
 } ?>
