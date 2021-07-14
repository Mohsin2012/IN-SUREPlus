<?php 

  error_reporting(E_ALL & ~E_NOTICE);

  if (session_status() == PHP_SESSION_NONE) 
  {
    session_start();
  }

  if (!(isset($_SESSION['loggedin']))||!($_SESSION['loggedin']==true)) 
  {
    header("location: userLogin.php");
    exit();
  }
  else
  {
  
    $showError=false;
    $succs=false;
    include 'dbconnect.php';
    if(isset($_POST['change_pass']))
    {
      $id = $_SESSION['Userid'];
      // echo "$id";
      $spassword = mysqli_real_escape_string($con,$_POST['spassword']); 
      $spassword=md5($spassword);
      
      
      $sqlexists="SELECT * FROM login WHERE Password='$spassword'";
      $resultexists=mysqli_query($con,$sqlexists);
      $numexists=mysqli_num_rows($resultexists);

      if ($numexists>0) 
      {
        $showError="This Was Your Previous Password. Enter New Password";
      }
      else 
      {       
        $query = "UPDATE `login` SET `Password` = '$spassword' WHERE `login`.`Userid` = $id;";  
        $result = mysqli_query($con, $query) or die(mysqli_error($con));

        // $succs="Your Password Has Changed Successfully.";
        echo "<script type='text/javascript'>alert('Your Password Has Changed Successfully.')</script>";

        header('location:profile.php');
      }
    }
  }
?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Change Password</title>
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
        <h2>Change Password</h2>
        <ol>
          <li><a href="index.php">Home</a></li>
          <li>Change Password</li>
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
    if($succs){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>Suucess!</strong> '. $succs.'
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>';
    }
  ?>

  <section id="cpanel">

    <div class="container col-md-9 desktop-visible">
      <div class="profile-user-box card-box bg-custom row shadow p-3 mb-5 bg-white rounded">
        <div class="col-sm-6 row">
          <i class="fas fa-user-circle fa-5x"></i>

          <span class="media-body col align-self-center">

            <h2 class="mt-1 mb-1 font-18" id="tcl">
              <?php echo $_SESSION['Username']; ?>
            </h2>

            <button type="button" class="btn btn-sm btn-outline-dark active" data-toggle="tooltip"
              data-placement="bottom" title="Change Password">
              <a href="change_pass.php">Change <i class="fal fa-key"></i></a>
            </button>

            <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="tooltip" data-placement="bottom"
              title="Delete Account">
              <a href="account_del.php?id=<?php echo $_SESSION['Userid']; ?>"><i class="far fa-trash-alt"></i>
                Account</a>
            </button>

          </span>
        </div>

        <div class="col-sm-6 row">
          <div class="btn-group col align-self-center" role="group" aria-label="Basic example">

            <button type="button" class="btn btn-sm btn-outline-dark">
              <a href="profile.php">View Profile</a>
            </button>

            <button type="button" class="btn btn-sm btn-outline-dark">
              <a href="claim.php">Claim</a>
            </button>

            <button type="button" class="btn btn-sm btn-outline-dark">
              <a href="view_policy.php">View Policy</a>
            </button>

            <button type="button" class="btn btn-sm btn-outline-dark">
              <a href="payments.php">Payment</a>
            </button>

            <button type="button" class="btn btn-sm btn-outline-danger">
              <a href="logout.php">Logout</a>
            </button>

          </div>
        </div>

      </div>
    </div>


    <div class="accordion container col-md-9" id="accordionExample">

      <div class="card bg-custom">

        <div type="button" class="card-header" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
          aria-controls="collapseOne" id="headingOne">
          <h2 class="my-auto text-center">
            <i class="fas fa-user-circle my-2"></i>
            <?php echo $_SESSION['Username']; ?>
          </h2>
        </div>

        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
          <div class="card-body">
            <div class="text-center">

              <button type="button" class="btn btn-sm btn-outline-dark">
                <a href="profile.php">View Profile</a>
              </button>

              <button type="button" class="btn btn-sm btn-outline-dark my-2">
                <a href="claim.php">Claim</a>
              </button>

              <button type="button" class="btn btn-sm btn-outline-dark">
                <a href="view_policy.php">View Policy</a>
              </button>

              <button type="button" class="btn btn-sm btn-outline-dark my-2">
                <a href="payments.php">Payment</a>
              </button>

              <button type="button" class="btn btn-sm btn-outline-danger my-2" data-toggle="tooltip"
                data-placement="bottom" title="Delete Account">
                <a href="account_del.php?id=<?php echo $_SESSION['Userid']; ?>"><i class="far fa-trash-alt"></i>
                  Account</a>
              </button>

              <button type="button" class="btn btn-sm btn-outline-danger my-2">
                <a href="logout.php">Logout</a>
              </button>

            </div>
          </div>
        </div>

      </div>
    </div>

  </section>


  <div class="container">
    <div class="container px-5 col-lg-4 col-md-6 my-4 shadow p-3 mb-5 bg-white rounded">
      <h2 id="heading" class="mt-5 text-center" style="font-family: 'Ubuntu', sans-serif;">Change Password</h2>
      <form action="" name="signupForm" method="post" id="login-form">
        <div class="form-group">
          <i class="fa fa-unlock-alt icons"></i>
          <label for="password">Enter New Password</label>
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
          <label for="confirm-password">Confirm New Password</label>
          <input type="password" class="form-control indiv input" name="confirm-password" id="confirm-password"
            placeholder="Confirm password" minlength="8" maxlength="15" onkeyup="check();" required />
          <span id="msg"></span>
        </div>
        <button name="change_pass" id="submitbtn" type="submit"
          class="btn btn-outline-dark container my-3">Save</button>
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
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

</html>