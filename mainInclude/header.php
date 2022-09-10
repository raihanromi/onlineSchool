<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- font awesome css -->
    <link rel="stylesheet" href="css/all.min.css">

    
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">


  <!-- Custom css style -->
  <link rel="stylesheet" href="css/style.css">
    <title>Brac online</title>
</head>
<body>

<!-- start navbar -->

<nav class="navbar navbar-expand-sm navbar-light bg-light pl-5" >
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Brac online</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <ul class="navbar-nav">
        <li class="nav-item custom-nav-item"><a href="index.php" class="nav-link">Home</a></li>
        <li class="nav-item custom-nav-item"><a href="viewallcourses.php" class="nav-link">Courses</a></li>
        

        <!--Start my profile/logout option -->
        <?php 
        session_start();
        if(isset($_SESSION['is_login'])){
          echo '<li class="nav-item custom-nav-item"><a href="studentProfile.php" class="nav-link">My profile</a></li>
        <li class="nav-item custom-nav-item"><a href="logout.php" class="nav-link">Logout</a></li>';
        }else{
          echo '<li class="nav-item custom-nav-item"><a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#stuLoginModalCenter">Login</a></li>
        <li class="nav-item custom-nav-item"><a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#stuRegModalCenter">singup</a></li>';
        }
        ?>
      <!--End my profile/logout option -->
      </ul>
    </div>
  </div>
</nav>
<!-- end navbar -->