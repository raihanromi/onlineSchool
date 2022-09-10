<?php include("Student/stuInclude/header.php") ?>
    <?php
    include("dbConnection.php");
    session_start();
    $quizanswer=$_GET['checkquiz'];

    $sql="SELECT * FROM course,contains,contents,exam,question WHERE course.course_code=contains.course_code AND contains.c_id=contents.c_id AND exam.c_id =contents.c_id AND course.course_code='CSE340' AND exam.examStatus='active'";


    $result=$con->query($sql);

    $row=$result->fetch_array();

    $correct_option=$row['correct_option'];
    $correct_ans=$row["$correct_option"];




    $mark=0;
    if($quizanswer==$correct_ans){
        $mark=$row['marks'];
        }
    echo"<center><h1> YOUR MARK : $mark </h1></center>";
    ?>

<?php include("Student/stuInclude/footer.php") ?>