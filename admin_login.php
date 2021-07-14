<?php 
$showError = false;
$login = false;

if(isset($_POST['login'])){

    $Password = $_POST['password'];
    $username = $_POST['username'];

    if($Password=='admin@123' && $username=='admin@123'){
      session_start();
      $login = true;
      $_SESSION['Password'] = 'admin@123';
      $_SESSION['loggedin'] = true;
       header('location:admin.php');
    }
    else{
        $showError="Invalid Credentials";
    }
}
?>



<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin LogIn</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/piggy-bank-solid.svg" rel="icon">
  <link href="assets/img/piggy-bank-solid.svg" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700"
    rel="stylesheet">

  <!-- icon CSS Files -->
  <link rel="stylesheet" href="assets/Font Awesome Pro 5.14.0/css/all.css">
  
  <!-- Main CSS File -->
  <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- <link href="http://netdna.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="assets/css/profile.css">
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <?php 
  require 'header.php' 
  ?>

  <!-- ======= Breadcrumbs Section start ======= -->
  <section class="breadcrumbs" class="">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <h2>Admin Login</h2>
        <ol>
          <li><a href="index.php">Home</a></li>
          <li><a href="signin.php">Signin</a></li>
          <li>Admin Login</li>
        </ol>
      </div>
    </div>
  </section class="prof">
  <!-- End Breadcrumbs Section -->

  <?php
  if($login){
      echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> Your account is now created and you can login
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
          </button>
      </div> ';
  }
  if($showError){
      echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> '. $showError.'
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
          </button>
      </div> ';
  }
?>

  <div class="container px-5 col-lg-4 col-md-6 my-4 shadow p-3 mb-5 bg-white rounded">
    <h1 class="text-center">Admin Login </h1>
    <form method="post" action="admin_login.php">
      <div class="row mt-5">
        <div class="form-group container">
          <i class="icon fa fa-user icons"></i>
          <label for="username">Username</label>
          <input type="text" required class="form-control input" maxlength="20" id="username" name="username"
            aria-describedby="emailHelp" autocomplete="off">
        </div>

        <div class="form-group container">
          <i class="icon fa fa-unlock-alt icons" aria-hidden="true"></i>
          <label for="password">Password</label>
          <input type="Password" required class="form-control input" maxlength="20" id="password" name="password">
        </div>
      </div>
      <button type="submit" class="btn btn-outline-dark container my-3" name="login">Login</button>
    </form>
  </div>

  <?php
include('footer.php');
?>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
</body>

</html>