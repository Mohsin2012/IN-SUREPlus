<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sign in</title>
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
  <section class="breadcrumbs">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <h2>Sign in Page</h2>
        <ol>
          <li><a href="index.php">Home</a></li>
          <li>Sign in</li>
        </ol>
      </div>
    </div>
  </section>
  <!-- Breadcrumbs Section end-->

  <section>

    <div class="container my-5">
      <div class="container col-sm-4 mx-auto">
        <div class="row my-4">
          <div class="col-md-8 mx-auto">
            <button class="btn btn-outline-dark mx-auto container  btn-lg" id="lgbtn"><a href="admin_login.php">Admin
                Login</a></button>
          </div>
        </div>
        <div class="row my-4">
          <div class="col-md-8 mx-auto">
            <button class="btn btn-outline-dark mx-auto container btn-lg" id="lgbtn"><a href="userLogin.php">User
                Login</a></button>
          </div>
        </div>
      </div>
    </div>

  </section>


  <?php
include 'footer.php';
?>

</body>

</html>