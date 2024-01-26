<?php
    include_once 'dbConnection.php';
    session_start();
    if(isset($_SESSION['n'])){
        ++$_SESSION['n'];
    } else if(!isset($_SESSION['n'])) {
        $_SESSION['n'] =2;
    }
    $n = $_SESSION['n'];
    $eid=$_GET['eid'];
    $qid=rand(100000,999999);
    $q=$_GET['q'];
    $o1=$_GET['o1'];
    $o2=$_GET['o2'];
    $o3=$_GET['o3'];
    $o4=$_GET['o4'];
    $co=$_GET['co'];
    $mark=$_GET['mark'];
    $sql="INSERT INTO question(q_id,c_id,question,option_1,option_2,option_3,option_4,correct_option,marks) VALUES('$qid','$eid','$q','$o1','$o2','$o3','$o4','$co','$mark');";
    mysqli_query($con,$sql);
    $location = "createExam.php?n=".$n."&eid=".$eid."";

    header("Location: $location");
?>