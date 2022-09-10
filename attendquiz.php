<?php include_once("Student/stuInclude/header.php"); ?>

<?php include("dbConnection.php");
session_start();
$user_id=$_SESSION['user_id'];
$course_code= $_GET['course_code']; ?>



<?php $sql="SELECT * FROM course,contains,contents,exam,question WHERE course.course_code=contains.course_code AND contains.c_id=contents.c_id AND exam.c_id =contents.c_id AND exam.examStatus='active' AND course.course_code='$course_code'";





$result=$con->query($sql);
// var_dump($row);

?>
<?php



   $row=$result->fetch_array();
    echo '<form action="checkquiz.php"><div class="card mb-3" style="max-width: 100%;">
  <div class="row g-0">
    <div class="col-md-8">
      <div class="card-body">
      <h4 class="card-title">'.$row['question'].'</h4>
      <input type="radio" name="checkquiz" value="'.$row['option_1'].'">' .$row['option_1'].'<br>
        <input type="radio" name="checkquiz" value="'.$row['option_2'].'">'.$row['option_2'].'<br>
          <input type="radio" name="checkquiz" value="'.$row['option_3'].'">'.$row['option_3'].'<br>
            <input type="radio" name="checkquiz" value="'.$row['option_4'].'">'.$row['option_4'].'<br>
      </div>
    </div>
  </div>
</div>

<input type="submit" name="submit" value="Submit" class="btn btn-success m-auto d-block ">
</form>';

 echo '<br>';
  
?>


</body>
</htm>