<?php

    if (session_status() == PHP_SESSION_NONE) 
    {
        session_start();
    }

    include 'dbconnect.php';

    $pass = $_SESSION['Password'];
    $Userid = $_SESSION['Userid'];
    
    $showsucc=false;
    $showError=false;
    
    $sql = "SELECT * FROM `user` WHERE `user`.`Userid`='$Userid'";         
    $query = mysqli_query($con, $sql) or die(mysqli_error($con));
    $result = mysqli_fetch_array($query);
    if(is_array($result))
    {   
    $email=$result['Email'];
    }
 

    $to_email = "$email";
    $subject = "In-Sure+ Account Activation";
    $body = "
  <h3 style='color: black'>Thanks For Signing Up On IN-SURE+
  (
      <i>$to_email</i>
  ), Please Go To Following Link To Activate Your Account. If Your Are Not This Please Report Immediately.</h3>
  <button style='background:black; border:2px solid black; border-radius:20px;'>
  <a href='https://insureplus.000webhostapp.com/activate_accont.php?pass=$pass' style='text-decoration: none; color:white!important;'>Activate Account</a>
  </button>";
    $headers = "From: insure003@gmail.com";
    $mailerr="There is problem in sending mail please have a patience.";
    $mailsucc="Email verification link has sent to your Email, Check your email for account activation link.";
    include 'insuremail.php';

    session_unset();

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Purchase Completed</title>
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
  <link href="assets/css/admin.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header start======= -->
  <?php
  include('header.php');
  ?>

  <!-- ======= Breadcrumbs Section start ======= -->
  <section class="breadcrumbs" class="">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <h2>Registration Completed</h2>
        <ol>
          <li><a href="index.php">Home</a></li>
          <li>Registration Completed</li>
        </ol>
      </div>
    </div>
  </section class="prof">
  <!-- End Breadcrumbs Section -->

  <section id="progress">
    <div class="progress">
      <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">100%</div>
    </div>
  </section>

  <section>

  <div class="container col-md-7 shadow p-3 mb-5 bg-white rounded">
        <h4 class="text-center">Thank You !</h4>
        <h4 class="text-center">Your Registration Process Has Completed.</h4>
        <h4 class="text-center"><?php echo $showsucc; ?></h4>
        <h4 class="text-center"><?php echo $showError; ?></h4>
      </div>

  </section>

  <?php
    include("footer.php");
  ?>
  
  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
    crossorigin="anonymous"></script>

</body>

</html>