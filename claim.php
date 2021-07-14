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
    include 'dbconnect.php';
    $uid = $_SESSION['Userid'];
    $msg=false;

    $query = "SELECT * FROM `pay_log` WHERE `userid` = '$uid';"; 
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $row = mysqli_fetch_array($result);
    if(is_array($row))
    {
      $query = "SELECT * FROM `claim_req` WHERE `userid` = '$uid';";    
      $result = mysqli_query($con, $query) or die(mysqli_error($con));
      $row = mysqli_fetch_array($result);
  
      if(is_array($row))
      { 
        $msg="Your Claim Request Has Made." ;
      }
      else
      {
        $id = $_SESSION['Userid'];

        $query = "SELECT * FROM `claim_log` WHERE `userid` = '$id';";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $row = mysqli_fetch_array($result);
        if(is_array($row))
        {
          $msg="Your Claim Has Been Approved." ;
        }
        else
        {       
          $Query = "SELECT * FROM user_policy WHERE User_id = '$id'";
          $result = $con->query($Query) or die(mysqli_error($con));
          if($result) 
          {
            $row = $result->fetch_array();
            $Policy_no = $row['Policy_no'];
            $Policy_name = $row['Policy_name'];
            $Policy_company	 = $row['Policy_company'];
            $cat = $row['cat'];
            // echo $Policy_no.$Policy_name.$Policy_company.$cat;

            $set=0;
            $Query = "SELECT * FROM `pay` WHERE `User_id` = '$id';";      
            $result = mysqli_query($con, $Query) or die(mysqli_error($con));
            $row = mysqli_fetch_array($result);
        
            if(is_array($row))
            { 
              $set=1;
            }
                
            $Query = "INSERT INTO `claim_req` (`userid`, `p_id`, `policy_name`, `policy_cat`, `Policy_company`, `payment`) VALUES ('$id', ' $Policy_no', '$Policy_name', ' $cat', '$Policy_company', '$set');";
            
            if(($con->query($Query)) == true)
            { 
              // header('location:profile.php');
              $msg="Your Claim Request Has Made." ;
            }
            else
            {
              echo "Error: $Query <br> $con->error";
            }                 
          }
        }
      }

    }
    else
    {
      $msg="Please Complete Your Payment to Claim." ;
    }
  }
?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Claim</title>
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
            <li><a href="profile.php">User Panel</a></li>
            <li>Claim</li>
          </ol>
        </div>
      </div>
    </section>

    <!-- Breadcrumbs Section end-->
    <section id="cpanel">

      <div class="container col-md-9 desktop-visible">
        <div class="profile-user-box card-box bg-custom row shadow p-3 mb-5 bg-white rounded">
          <div class="col-sm-6 row">
            <i class="fas fa-user-circle fa-5x"></i>

            <span class="media-body col align-self-center">

              <h2 class="mt-1 mb-1 font-18" id="tcl">
                <?php echo $_SESSION['Username']; ?>
              </h2>

              <button type="button" class="btn btn-sm btn-outline-dark" data-toggle="tooltip" data-placement="bottom" title="Change Password">
                <a href="change_pass.php">Change <i class="fal fa-key"></i></a>
              </button>

              <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="tooltip" data-placement="bottom" title="Delete Account">
                <a href="account_del.php?id=<?php echo $_SESSION['Userid']; ?>"><i class="far fa-trash-alt"></i> Account</a>
              </button>

            </span>
          </div>

          <div class="col-sm-6 row">
            <div class="btn-group col align-self-center" role="group" aria-label="Basic example">

              <button type="button" class="btn btn-sm btn-outline-dark">
                <a href="profile.php">View Profile</a>
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
                      <i class="fas fa-user-circle my-2"></i> <?php echo $_SESSION['Username']; ?>
                  </h2>
              </div>

              <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                  <div class="card-body">
                      <div class="text-center">

                          <button type="button" class="btn btn-sm btn-outline-dark">
                              <a href="profile.php">View Profile</a>
                          </button>

                          <button type="button" class="btn btn-sm btn-outline-dark">
                            <a href="view_policy.php">View Policy</a>
                          </button>

                          <button type="button" class="btn btn-sm btn-outline-dark my-2">
                              <a href="payments.php">Payment</a>
                          </button>

                          <button type="button" class="btn btn-sm btn-outline-dark my-2" data-toggle="tooltip" data-placement="bottom" title="Change Password">
                              <a href="change_pass.php">Change <i class="fal fa-key"></i></a>
                          </button>

                          <button type="button" class="btn btn-sm btn-outline-danger my-2" data-toggle="tooltip" data-placement="bottom" title="Delete Account">
                              <a href="account_del.php?id=<?php echo $_SESSION['Userid']; ?>"><i class="far fa-trash-alt"></i> Account</a>
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
              <span aria-hidden="true">×</span>
          </button>
      </div> ';
  }
?>


    <section>

      <div class="container col-md-6 shadow p-3 mb-5 bg-white rounded" id='paid'>
        <h2 class="text-center">
          <?php echo $msg;?>
        </h2>
      </div>
    </section>

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