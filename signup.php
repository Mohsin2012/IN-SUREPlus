<?php 
  session_start();
  $showError=false;
  include 'dbconnect.php';
  if(isset($_POST['signup']))
  {
    $susername = mysqli_real_escape_string($con, $_POST['susername']);
    $spassword = mysqli_real_escape_string($con,$_POST['spassword']); 
    $spassword=md5($spassword);
    
    $sqlexists="SELECT * FROM login WHERE Username='$susername'";
    $resultexists=mysqli_query($con,$sqlexists);
    $numexists=mysqli_num_rows($resultexists);

    if ($numexists>0) 
    {
      $showError="Username already exists";
    }
    else 
    {    

      mysqli_query($con, "INSERT INTO login(Username, Password, Status) VALUES('$susername', '$spassword','0')") or die(mysqli_error($con));
  
      $query = "SELECT * FROM login WHERE Username='$susername' and Password='$spassword'";  
      $result = mysqli_query($con, $query) or die(mysqli_error($con));
      $row = mysqli_fetch_array($result);
      
      if(is_array($row))
      { 
        $_SESSION['Userid'] = $row['Userid'];
        $_SESSION['Username'] = $row['Username']; 
        $_SESSION['Password'] = $row['Password'];
      }

      header('location:userinfo.php');
    }
  }
?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Signup</title>
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
  <link rel="stylesheet" href="assets/css/profile.css">
  <link rel="stylesheet" href="assets/css/signup.css">
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
        <h2>User Signup</h2>
        <ol>
          <li><a href="index.php">Home</a></li>
          <li>User Signup</li>
        </ol>
      </div>
    </div>
  </section class="prof">
  <!-- End Breadcrumbs Section -->



  <?php
    if($showError){
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong>Error!</strong> '. $showError.'
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>';
    }
  ?>

  <div class="container">
    <h1 id="heading" class="text-center mt-5" style="font-family: 'Ubuntu', sans-serif;">Create Account</h1>
    <div class="container px-5 col-md-4 my-4 shadow p-3 mb-5 bg-white rounded">
      <form action="signup.php" name="signupForm" method="post" id="login-form">
        <div class="form-group ">
          <i class="fa fa-user icons"></i>
          <label for="username">Username</label>
          <input type="text" class="form-control indiv input" name="susername" id="username"
            placeholder="Enter username" maxlength="15" minlength="5" required autofocus autocomplete="off" />
        </div>
        <div class="form-group">
          <i class="fa fa-unlock-alt icons"></i>
          <label for="password">Password</label>
          <input type="password" class="form-control indiv input" id="password" name="spassword" placeholder="Password"
            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" minlength="8" maxlength="15"
            title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
            required />
        </div>
        <!-- Validation -->
        <div id="message" class="container">
          <h5>Password must contain :</h5>
          <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
          <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
          <p id="number" class="invalid">A <b>number</b></p>
          <p id="length" class="invalid">Minimum <b>8 characters</b> & Maximum <b>15 characters</b></p>
        </div>
        <div class="form-group">
          <i class="fa fa-unlock-alt icons"></i>
          <label for="confirm-password">Confirm password</label>
          <input type="password" class="form-control indiv input" name="confirm-password" id="confirm-password"
            placeholder="Confirm password" minlength="8" maxlength="15" onkeyup="check();" required />
          <span id="msg"></span>
        </div>
        <button name="signup" id="submitbtn" type="submit" class="btn btn-outline-dark container my-3">Sign up</button>
        <p id="loginpara" class="text-center">Already have an account? <span id="sign-in"><a href="userLogin.php">Log
              in</a></span></p>
      </form>
    </div>
  </div>

  <?php 
  require 'footer.php' 
?>
  <!-- <script src="assets/js/main.js"></script> -->
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
<script lang="JavaScript">

  document.getElementById('submitbtn').disabled = true;
  var check = function () {
    if (document.getElementById('password').value == document.getElementById('confirm-password').value) {
      document.getElementById('msg').style.color = '#50d8af';
      document.getElementById('msg').innerHTML = 'Password matching';
      document.getElementById('submitbtn').disabled = false;
    }
    else {
      document.getElementById('msg').style.color = 'red';
      document.getElementById('msg').innerHTML = 'Password not matching';
      document.getElementById('submitbtn').disabled = true;
    }
  }

  var myInput = document.getElementById("password");
  var letter = document.getElementById("letter");
  var capital = document.getElementById("capital");
  var number = document.getElementById("number");
  var length = document.getElementById("length");

  // When the user clicks on the password field, show the message box
  myInput.onfocus = function () {
    document.getElementById("message").style.display = "block";
  }

  // When the user clicks outside of the password field, hide the message box
  myInput.onblur = function () {
    document.getElementById("message").style.display = "none";
  }

  // When the user starts to type something inside the password field
  myInput.onkeyup = function () {
    // Validate lowercase letters
    var lowerCaseLetters = /[a-z]/g;
    if (myInput.value.match(lowerCaseLetters)) {
      letter.classList.remove("invalid");
      letter.classList.add("valid");
    }

    else {
      letter.classList.remove("valid");
      letter.classList.add("invalid");
    }

    // Validate capital letters
    var upperCaseLetters = /[A-Z]/g;

    if (myInput.value.match(upperCaseLetters)) {
      capital.classList.remove("invalid");
      capital.classList.add("valid");
    }

    else {
      capital.classList.remove("valid");
      capital.classList.add("invalid");
    }

    // Validate numbers
    var numbers = /[0-9]/g;
    if (myInput.value.match(numbers)) {
      number.classList.remove("invalid");
      number.classList.add("valid");
    }

    else {
      number.classList.remove("valid");
      number.classList.add("invalid");
    }

    // Validate length
    if (myInput.value.length >= 8 && myInput.value.length <= 15) {
      length.classList.remove("invalid");
      length.classList.add("valid");
    }

    else {
      length.classList.remove("valid");
      length.classList.add("invalid");
    }
  }

  var inputName = document.getElementById('username');
  inputName.onfocus = function () {
    document.getElementById("nameErr").style.display = "block";
  }

  inputName.onblur = function () {
    document.getElementById("nameErr").style.display = "none";
  }
  len = document.getElementById("nameLength");

  inputName.onkeyup = function () {
    if (inputName.value.length >= 5 && inputName.value.length <= 15) {
      len.classList.remove("invalid");
      len.classList.add("valid");
    } else {
      len.classList.remove("valid");
      len.classList.add("invalid");
    }
  }


</script>

</html>