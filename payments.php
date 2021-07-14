<?php

  error_reporting(E_ALL & ~E_NOTICE);

  if (session_status() == PHP_SESSION_NONE) 
  {
    session_start();
  }

  if (!(isset($_SESSION['loggedin']))||!($_SESSION['loggedin']==true)) {
    header("location: userLogin.php");
    exit();
  }

  else 
  {
    $showalert=false;
    $showError=false;
    $paystat=false;
    if ($_SERVER['REQUEST_METHOD']=='POST') 
    {
      $full_name=$_POST['full_name'];
      $card_no=$_POST['card_no'];
      $exp_mon=$_POST['exp_mon'];
      $exp_year=$_POST['exp_year'];
      $cvv=$_POST['cvv'];
      
      if (preg_match("/^[a-zA-Z ]*$/",$full_name))
      { 

        if (preg_match ("/^[0-9]*$/",$card_no))
        {      
  
          include 'dbconnect.php';
            
          $uid=$_SESSION['Userid'];
          
          $query = "SELECT * FROM `user_policy` WHERE `User_id`='$uid';";
          $res = mysqli_query($con, $query) or die(mysqli_error($con));
          $row = mysqli_fetch_array($res);
          $amount=$row['Monthly_pay'];
          $pid=$row['Policy_no'];
          $policy_name=$row['Policy_name'];
          $policy_comp=$row['Policy_company'];
          $policy_cat=$row['cat'];


          // $sql= "INSERT INTO `pay`(`full_name`, `card_no`, `exp_mon`, `exp_year`, `cvv`) VALUES ('$full_name','$card_no','$exp_mon','$exp_year','$cvv')";
          $sql="INSERT INTO `pay` (`sno`, `User_id`, `full_name`, `card_no`, `exp_mon`, `exp_year`, `cvv`, `amt`) VALUES (NULL, '$uid', '$full_name', '$card_no', '$exp_mon', '$exp_year', '$cvv', '$amount')
          ";
          $result=mysqli_query($con,$sql);

          if ($result)
          {
            $showalert=true;
            $paystat="Your Payment Has Done";
          
            $sql="INSERT INTO `pay_log` (`id`, `userid`, `pid`, `policy_name`, `policy_comp`, `policy_cat`, `Amount`, `Status`, `t_stamp`) VALUES (NULL, '$uid', '$pid', '$policy_name', '$policy_comp', ' $policy_cat', $amount, 'Paid', current_timestamp());";
            $query=mysqli_query($con,$sql);
              
          }
          else
          {
            $showError="Your Payment Has Not Made.";
          }

        }

        else
        {
          $showError= "Only numeric value is allowed.";
        }

      }

      else
      {
        $showError= "Only letters and white space allowed"; 
      }    
    }
  }    
  
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Payment</title>
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
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/profile.css">

</head>


<body>

  <!-- ======= Header start======= -->
  <?php
  include('header.php');
  ?>
  <!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs Section start ======= -->
    <section class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2>User Panel</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Payment</li>
          </ol>
        </div>
      </div>
    </section>
    <!-- ======= Breadcrumbs Section end ======= -->


    <section id="cpanel">

      <div class="container col-md-9 desktop-visible">
        <div class="profile-user-box card-box bg-custom row shadow p-3 mb-5 bg-white rounded">
          <div class="col-sm-6 row">
            <i class="fas fa-user-circle fa-5x"></i>

            <span class="media-body col align-self-center">

              <h2 class="mt-1 mb-1 font-18" id="tcl">
                <?php echo $_SESSION['Username']; ?>
              </h2>

              <button type="button" class="btn btn-sm btn-outline-dark" data-toggle="tooltip" data-placement="bottom"
                title="Change Password">
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

                <button type="button" class="btn btn-sm btn-outline-dark my-2" data-toggle="tooltip"
                  data-placement="bottom" title="Change Password">
                  <a href="change_pass.php">Change <i class="fal fa-key"></i></a>
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

    <?php
  if($showError){
      echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> '. $showError.'
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div> ';
  }
?>

    <?php
    include 'dbconnect.php';
    $uid=$_SESSION['Userid'];

    $uid=$_SESSION['Userid'];
    $query = "SELECT `Monthly_pay` FROM `user_policy` WHERE `User_id`='$uid';";
    $res = mysqli_query($con, $query) or die(mysqli_error($con));
    $row = mysqli_fetch_array($res);
    $amount=$row['Monthly_pay'];

    $set=false;
    $query = "SELECT * FROM `pay` WHERE `User_id` = '$uid';";
    
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $row = mysqli_fetch_array($result);

    if(is_array($row))
    { 
      $set=true;
    }

    //Full name
    $nameQuery = "SELECT `Firstname`, `Lastname` FROM `user` WHERE `Userid` = '$uid';";
    $connect = mysqli_query($con, $nameQuery) or die(mysqli_error($con));
    $showName = mysqli_fetch_array($connect);
  ?>
    <?php if(!$set): ?>

    <div class="container row mx-auto" id='paynull'>
      <div class="container col-md-6 shadow p-3 mb-5 bg-white rounded p-5">
        <div>
          <h3 id="details-header" class="text-center">Payment<h3>
        </div>
        <label for="fname">Accepted Cards</label>

        <div class="icon-container mb-2">
          <i class="fab fa-cc-visa" style="color:navy;"></i>
          <i class="fab fa-cc-amex" style="color:blue;"></i>
          <i class="fab fa-cc-mastercard"></i>
          <i class="fab fa-cc-discover" style="color:orange;"></i>
        </div>

        <form action="payments.php" method="post">

          <div class="form-group">
            <label for="full_name">Full Name</label>
            <input type="text" class="form-control input"
              value="<?php echo $showName['Firstname'].' '.$showName['Lastname']; ?>" maxlength="30" id="full_name"
              name="full_name" title="<?php echo $showName['Firstname'].' '.$showName['Lastname']; ?>" readonly>
          </div>
          <div class="form-group">
            <label for="card_no">Credit Card No</label>
            <input type="tel" class="form-control input" id="card_no" name="card_no" inputmode="numeric" maxlength="16"
              minlength="16" title="Enter valid credit card number" placeholder="xxxx-xxxx-xxxx-xxxx" required>
          </div>
          <div class="form-group">
            <label for="exp_mon">Exp Month</label>
            <input type="number" class="form-control input" id="exp_mon" name="exp_mon" inputmode="numeric" max="12"
              min="01" step="1" placeholder="MM" required>
          </div>
          <div class="form-group">
            <label for="exp_year">Exp Year</label>
            <input type="number" class="form-control input" id="exp_year" name="exp_year" inputmode="numeric" max="2025"
              min="2021" placeholder="YYYY" required>
          </div>
          <div class="form-group">
            <label for="cvv">CVV</label>
            <input type="password" class="form-control input" id="cvv" name="cvv" placeholder="* * *" max="999"
              min="100" maxlength="3" required>
          </div>
          <div class="form-group">
            <label for="amt">Amount To Pay</label>
            <input type="number" class="form-control input" id="amt" name="amt" placeholder="<?php echo $amount;?>"
              readonly>
            <small id="emailHelp" class="form-text text-muted">We'll never share your details with anyone
              else.</small>
          </div>
          <button type="submit" class="btn btn-outline-dark btn-md btn-block">Continue To Checkout</button>
        </form>
      </div>
    </div>
    <?php endif; ?>
    <?php if($set): ?>
    <div class="container col-md-5 shadow p-3 mb-5 bg-white rounded" id='paid'>
      <h2 class="text-center">Thank You !</h2>
      <h2 class="text-center">Your Payment Has Done.</h2>
    </div>
    <?php endif; ?>

  </main>
  <!-- End #main -->

  <!-- Footer start -->
  <?php
  include('footer.php');
  ?>
  <!-- End Footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>


  <!-- Template Main JS File -->
  <!-- <script src="assets/js/main.js"></script> -->
  <!-- js files -->
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

</html>