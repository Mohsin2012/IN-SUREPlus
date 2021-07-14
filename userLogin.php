<?php 

  error_reporting(E_ALL & ~E_NOTICE);

  if (session_status() == PHP_SESSION_NONE) 
  {
    session_start();
  }


  $showError=false;

  include 'dbconnect.php';

  if (!$con)
  {
    die("Database Connection Failed" . mysqli_error($con));
  }

  $select_db = mysqli_select_db($con, $db);

  if (!$select_db)
  {
    die("Database Selection Failed" . mysqli_error($con));
  }
 

  if (isset($_POST['username']) and isset($_POST['password']))
  {
      
    // Assigning POST values to variables.
    $username = mysqli_real_escape_string($con,$_POST['username']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
    // CHECK FOR THE RECORD FROM TABLE
    $query = "CALL `getuser`('$username', '$password');";
    
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $row = mysqli_fetch_array($result);

    if(is_array($row))
    { 
      $_SESSION['Userid'] = $row['Userid'];
      $_SESSION['Username'] = $row['Username']; 
      $_SESSION['Password'] = $row['Password'];
      $_SESSION['loggedin'] = true;
    }
    
    $count = mysqli_num_rows($result);
    

    if ($count > 0 && $row['Status']==1)
    {
      header('location:profile.php');
    }

    else 
    {
      $showError= "Invalid Login Credentials Please Try Again !";       
    }
          
  } 
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>User Login</title>
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
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->
  <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>

<?php
include 'header.php';
?>

  <!-- ======= Breadcrumbs Section start ======= -->
  <section class="breadcrumbs" class="">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <h2>User Login</h2>
        <ol>
          <li><a href="index.php">Home</a></li>
          <li><a href="signin.php">Signin</a></li>
          <li>User Login</li>
        </ol>
      </div>
    </div>
  </section class="prof">
  <!-- End Breadcrumbs Section -->

  <?php

    if($showError){
        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> '. $showError.'
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div> ';
    }
  ?>

  <div class="container">

    <div class="container px-5 col-lg-4 col-md-6 my-4 shadow p-3 mb-5 bg-white rounded">
      <h1 class="text-center">User Login </h1>
      <form method="post" action="userLogin.php">
        <div class="row mt-5">
          <div class="form-group container">
            <i class="icon fa fa-user icons"></i>
            <label for="username">Username</label>
            <input type="text" id="inp" class="form-control input" id="username" name="username" placeholder="Enter your username" maxlength="15" minlength="5" required autofocus autocomplete="off">

          </div>
          <div class="form-group container">
            <i class="icon fa fa-unlock-alt icons" aria-hidden="true"></i>
            <label for="password">Password</label>
            <input type="Password" id="inpass" class="form-control input" placeholder="Your password" maxlength="20" id="password"
              name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" onkeyup="enableLogin();" required>
          </div>
        </div>
        <button type="submit" id="loginbtn" class="btn btn-outline-dark container my-3" name="login">Login</button>
        <p class="text-center" id="signup-para">
          <span>
            <a href="forgot_pass.php">Forgot Password? </a>
          </span>
          
          <span id="sign-in">
            <a href="signup.php" style="color:darkblue;">Create account</a>
          </span>
        </p>
      </form>
    </div>

  </div>

  <?php
include 'footer.php';
?>
  <!-- Template Main JS File -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
    crossorigin="anonymous"></script>

</body>

<script>
  // Enabling Login btn
  var password = document.getElementById('inpass');
  document.getElementById('loginbtn').disabled = true;
  function enableLogin() {
      if (password.value.length >= 5)
      {   
        document.getElementById('loginbtn').disabled = false;
      }
  }
</script>

</html>