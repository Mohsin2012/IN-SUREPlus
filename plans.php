<?php  session_start();
 if(!isset($_SESSION['Userid'])){ 
      header('location:userlogin.php');
 } ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Insurance Schemes</title>
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


  <!--  Main CSS File -->
  <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="assets/css/plans.css">
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>


  <!-- ======= Header start ======= -->
  <?php
  include('header.php');
  ?>
  <!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs Section start ======= -->
    <section class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2>Insurance Section</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Insurances</li>
          </ol>
        </div>
      </div>
    </section>
    <!-- End Breadcrumbs Section -->
    <section id="progress">
    <div class="progress">
      <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">50%</div>
    </div>
  </section>

    <section>
      <div class="row justify-content-md-center">
        <div class="col-xl-5 col-lg-6 col-md-8">
          <div class="section-title text-center title-ex1">
            <h2>Insurances Offered</h2>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row justify-content-around">

          <div class="card col-md-3 shadow p-3 mb-5 bg-white rounded text-center align-items-center" style="width: 18rem;">
            <i class="fas fa-heartbeat fa-3x" id="icn"></i>
            <div class="card-body">
              <h4 class="card-text">Life Insurance</h4>
            </div>
          </div>
          <div class="card col-md-3 shadow p-3 mb-5 bg-white rounded text-center align-items-center" style="width: 18rem;">
            <i class="fas fa-home-alt fa-3x" id="icn"></i>
            <div class="card-body">
              <h4 class="card-text">Home Insurance</h4>
            </div>
          </div>

        </div>
      </div>

      <div class="container">
        <div class="row justify-content-around">

          <div class="card col-md-3 shadow p-3 mb-5 bg-white rounded text-center align-items-center" style="width: 18rem;">
            <i class="fas fa-car-crash fa-3x" id="icn"></i>
            <div class="card-body">
              <h4 class="card-text">Car Insurance</h4>
            </div>
          </div>
          <div class="card col-md-3 shadow p-3 mb-5 bg-white rounded text-center align-items-center" style="width: 18rem;">
            <i class="fas fa-medkit fa-3x" id="icn"></i>
            <div class="card-body">
              <h4 class="card-text">Health Insurance</h4>
            </div>
          </div>

        </div>
      </div>
    </section>

    <section class="pricing-section">
      <div class="container">
        <div class="row justify-content-md-center">
          <div class="col-xl-5 col-lg-6 col-md-8">
            <div class="section-title text-center title-ex1">
              <h2>Insurance Plans</h2>
            </div>
          </div>
        </div>
        <!-- Pricing Table starts -->
        <div class="row  justify-content-md-center">

          <div class="col-md-4 col-sm-3">
            <div class="price-card">
              <h2>Basic</h2>
              <p>The standard version</p>
              <p class="price"><span>4999</span>/ Month</p>
              <ul class="pricing-offers">
                <li><i class="fad fa-check"></i> Coverage upto 50,00,000 ₹.</li>
                <li><i class="fad fa-check"></i> 24/5 Customer Support.</li>
                <li><i class="fad fa-check"></i> Get Quick Quote · 16 Lac+ Claims Settled!</li>
                <li><i class="fad fa-check"></i> Tax Benefits u/s 80C & 80D*T&C.</li>
              </ul>
              <a href="buy_nor_pol.php" class="btn btn-dark btn-mid">Buy Now</a>
            </div>
          </div>

          <div class="col-md-4 col-sm-3">
            <div class="price-card featured">
              <h2>Premium</h2>
              <p>Top Rated choice</p>
              <p class="price"><span>7999</span>/ Month</p>
              <ul class="pricing-offers">
                <li><i class="fad fa-check"></i> Coverage upto 75,00,000 ₹.</li>
                <li><i class="fad fa-check"></i> 24/7 Customer Support.</li>
                <li><i class="fad fa-check"></i> Get Quick Quote · 25 Lac+ Claims Settled!</li>
                <li><i class="fad fa-check"></i> Tax Benefits u/s 90C & 90D*T&C.</li>
              </ul>
              <a href="buy_pre_pol.php" class="btn btn-dark btn-mid">Buy Now</a>
            </div>
          </div>

        </div>
        <!-- Pricing Table end -->
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

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
  </script>

</body>

</html>