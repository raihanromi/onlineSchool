
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enroll</title>
</head>
<body>
    <?php
    include_once("dbConnection.php");
    
    session_start(); 
    $user_id=$_SESSION['user_id'];
    $course_code=$_SESSION['course_code']
    ?>

    
 <?php 
   
echo '<h1>Enroll</h1>';

$sql="INSERT INTO enrolls (user_id, course_code) VALUES ('$user_id', '$course_code')";
$result=$con->query($sql);

header("location:index.php")

?>

</body>
</html>
