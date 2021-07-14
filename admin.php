<?php  

  if (session_status() == PHP_SESSION_NONE) 
  {
    session_start();
  }

  if(!isset($_SESSION['loggedin']))
  {
    header('location:admin_login.php');
  }
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin DashBoard</title>
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
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/admin.css">

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
        <h2>Admin Panel</h2>
        <ol>
          <li><a href="index.php">Home</a></li>
          <li>Admin DashBoard</li>
        </ol>
      </div>
    </div>
  </section class="prof">
  <!-- End Breadcrumbs Section -->

  <section id="cpanel">

    <div class="container col-md-9 desktop-visible">
      <div class="profile-user-box card-box bg-custom row shadow p-3 mb-5 bg-white rounded">
        <div class="col-sm-5 row">
          <i class="fas fa-user-cog fa-5x"></i>
          <span class="media-body col align-self-center">
            <h2 class="mt-1 mb-1 font-18" id="tcl">Admin</h2>
            <form method="post">
              <button type="button" class="btn btn-sm btn-outline-danger" name="logout"><a href="logout.php">Admin Logout</a></button>
            </form>
          </span>
        </div>

        <div class="col-sm-7 row">
          <div class="btn-group col align-self-center" role="group" aria-label="Basic example">

            <button type="button" class="btn btn-sm btn-outline-dark">
              <a href="admin_nor_cat_view.php">Basic</a>
            </button>

            <button type="button" class="btn btn-sm btn-outline-dark">
              <a href="admin_pre_category_view.php">Premium</a>
            </button>

            <button type="button" class="btn btn-sm btn-outline-dark"> 
              <a href="userdt.php">User Data</a>
            </button>

            <button type="button" class="btn btn-sm btn-outline-dark">
              <a href="claim_req.php">Claim Requests</a>
            </button>

            <div class="btn-group" role="group">

              <button id="btnGroupDrop1" type="button" class="btn btn-sm btn-outline-dark dropdown-toggle"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Logs
              </button>

              <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                <a class="dropdown-item" href="claim_log.php">Claim Log</a>
                <a class="dropdown-item" href="pay_log.php">Payment Log</a>
                <a class="dropdown-item" href="contact.php">Customer Queries</a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>


    <div class="accordion container col-md-9" id="accordionExample">

      <div class="card bg-custom">

        <div type="button" class="card-header" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
          aria-controls="collapseOne" id="headingOne">
          <h2 class="my-auto text-center">
            <i class="fas fa-user-cog my-2"></i> Admin
          </h2>
        </div>

        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
          <div class="card-body">
            <div class="text-center">

              <button type="button" class="btn my-2 btn-sm btn-outline-dark">
                <a href="admin_nor_cat_view.php">Basic</a>
              </button>

              <button type="button" class="btn my-2 btn-sm btn-outline-dark">
                <a href="admin_pre_category_view.php">Premium</a>
              </button>

              <button type="button" class="btn my-2 btn-sm btn-outline-dark">
                <a href="userdt.php">User Data</a>
              </button>

              <button type="button" class="btn my-2 btn-sm btn-outline-dark">
                <a href="claim_log.php">Claim Log</a>
              </button>

              <button type="button" class="btn my-2 btn-sm btn-outline-dark">
                <a href="pay_log.php">Pay Log</a>
              </button>

              <button type="button" class="btn my-2 btn-sm btn-outline-dark">
                <a href="contact.php">Customer Queries</a>
              </button>


              <button type="button" class="btn my-2 btn-sm btn-outline-dark my-3">
                <a href="claim_req.php">Claim Requests</a>
              </button>

            </div>
          </div>
        </div>

      </div>
    </div>

  </section>

  <?php  
  include 'dbconnect.php';
  
  $sq = "SELECT * FROM `user_view`";
  $sq1="SELECT * FROM `norm_view`";
  $sq2 = "SELECT * FROM `prem_view`";
  $sq3 ="SELECT * FROM `claim_view`";
  $sq4 ="SELECT * FROM `amt_sum`";
  $sq5 ="SELECT * FROM `total_user`";
  
  $query = mysqli_query($con,$sq);  
  $query1 = mysqli_query($con,$sq1);  
  $query2 = mysqli_query($con,$sq2);  
  $query3 = mysqli_query($con,$sq3);  
  $query4 = mysqli_query($con,$sq4);  
  $query5 = mysqli_query($con,$sq5);  
  

  $result = mysqli_fetch_assoc($query);
  $result1 = mysqli_fetch_assoc($query1);
  $result2 = mysqli_fetch_assoc($query2);
  $result3 = mysqli_fetch_assoc($query3);
  $result4 = mysqli_fetch_assoc($query4);
  $result5 = mysqli_fetch_assoc($query5);
          
?>

  <div class="col-md-9 mx-auto">
    <div class="text-center row shadow p-3 mb-5 bg-white rounded row align-items-center">
      <div class="col-md-6 offset-md-3">
        <h1 class="my-auto"><b>Admin DashBoard</b></h1>
      </div>
    </div>
  </div>

  <div>

    <div class="container">

      <div class="row justify-content-around">

        <div class="card col-md-3 shadow p-3 mb-5 bg-white rounded text-center align-items-center" style="width: 18rem;">
          <div class="card-body">
            <h1 class="card-text">Total Claim</h1>
            <h1 class="card-text count"><b>
                <?php echo $result4['amt_sum']; ?>
              </b></h1>
          </div>
        </div>

        <div class="card col-md-3 shadow p-3 mb-5 bg-white rounded text-center align-items-center" style="width: 18rem;">
          <div class="card-body">
            <h1 class="card-text">Total Customer's</h1>
            <h1 class="card-text count"><b>
                <?php echo $result5['total_user']; ?>
              </b></h1>
          </div>
        </div>

        <div class="card col-md-3 shadow p-3 mb-5 bg-white rounded text-center align-items-center" style="width: 18rem;">
          <div class="card-body">
            <h1 class="card-text">No of Claim's</h1>
            <h1 class="card-text count"><b>
                <?php echo $result3['claim_count']; ?>
              </b></h1>
          </div>
        </div>

      </div>
      
    </div>

    <div class="container">

      <div class="row justify-content-around">

        <div class="card col-md-3 shadow p-3 mb-5 bg-white rounded text-center align-items-center" style="width: 18rem;">
          <div class="card-body">
            <h1 class="card-text">Total User's</h1>
            <h1 class="card-text count"><b>
                <?php echo $result['user_count']; ?>
              </b></h1>
          </div>
        </div>

        <div class="card col-md-3 shadow p-3 mb-5 bg-white rounded text-center align-items-center" style="width: 18rem;">
          <div class="card-body ">
            <h1 class="card-text">Basic User's</h1>
            <h1 class="card-text count"><b>
                <?php echo $result1['norm_count']; ?>
              </b></h1>
          </div>
        </div>

        <div class="card col-md-3 shadow p-3 mb-5 bg-white rounded text-center align-items-center" style="width: 18rem;">
          <div class="card-body">
            <h1 class="card-text">Premium User's</h1>
            <h1 class="card-text count"><b>
                <?php echo $result2['prem_count']; ?>
              </b></h1>
          </div>
        </div>
      </div>
      
    </div>

  </div>


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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>

  <script>
    $('.count').counterUp
      (
        {
          delay: 20,
          time: 800
        }
      );
  </script>

</body>

</html>