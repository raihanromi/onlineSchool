<?php
include("mainInclude/header.php");


include("dbConnection.php");

?>

<?php if (isset($_SESSION['user_id'])){  ?>
<?php if (isset($_GET['course_code'])){
    
$course_code=$_GET['course_code'];

$sql="SELECT * FROM course WHERE course_code='$course_code'";

$result=$con->query($sql);

$row=$result->fetch_assoc();

$_SESSION['course_code']=$row['course_code'];

}
?>

   <div class="card-body">
        <h5 class="card-title">Course Code: <?php  echo $row['course_code'] ?></h5>
        <p class="card-text">Course Name: <?php echo $row['course_name'] ?></p>

        <a class="btn btn-primary text-white font-weight-bolder float-right" href="enroll.php">Enroll</a>
      </div>


<?php include("mainInclude/footer.php") ?>

<?php }else{

    echo"<script> alert('Login First!!')</script>";
}

