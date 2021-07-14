<?php
$showError = false;
$showsucc = false;
include 'dbconnect.php';
if (isset($_POST['reset_pass'])) {
    $email = $_POST['email'];
    $sqlexists = "SELECT * FROM user WHERE Email='$email'";
    $resultexists = mysqli_query($con, $sqlexists);
    $result = mysqli_fetch_array($resultexists);
    $uid = $result['Userid'];
    $numexists = mysqli_num_rows($resultexists);

    if ($numexists > 0) {
        $sql = "SELECT Password FROM login WHERE Userid='$uid'";

        $query = mysqli_query($con, $sql) or die(mysqli_error($con));
        $result = mysqli_fetch_array($query);
        if (is_array($result)) {
            $pass = $result['Password'];
        }

        $to_email = "$email";
        $subject = "In-Sure+ Password Reset";
        $body = "
        <h3 style='color: black'>We Have Just Received A Password Reset Request From
        (
            <i>$to_email</i>
        ) For Your IN-SURE+ Account, Please Go To Following Link To Reset Password. If Your Are Not This Please Report Immediately.</h3>
        <button style='background:black; border:2px solid black; border-radius:20px;'>
        <a href='https://insureplus.000webhostapp.com/reset_pass.php?pass=$pass' style='text-decoration: none; color:white!important;'>Reset Password</a>
        </button>";
        $headers = "From: insure003@gmail.com";
        $mailerr="No Email Account Found Linked With this Email. Please Kindly Enter Right Email.";
        $mailsucc="Reset Link Has been Successfully Sent to Linked Email Address.";
        include 'insuremail.php';
    } else {
        $showError = "No Email Account Found Linked With this Email. Please Kindly Enter Right Email.";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Forgot Password</title>
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
                <h2>Forgot Password</h2>
                <ol>
                    <li><a href="index.php">Home</a></li>
                    <li>Forgot Password</li>
                </ol>
            </div>
        </div>
    </section class="prof">
    <!-- End Breadcrumbs Section -->
    <?php
if ($showError) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong>Error!</strong> ' . $showError . '
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>';
}
if ($showsucc) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>Suucess!</strong> ' . $showsucc . '
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>';
}
?>


    <div class="container px-5 col-md-4 my-4 shadow p-3 mb-5 bg-white rounded">
        <h2 id="heading" class="text-center" style="font-family: 'Ubuntu', sans-serif;">Forgot Password</h2>
        <div class="mt-5">

            <form action="forgot_pass.php" method="post">
                <div class="form-group">
                    <i class="fa fa-unlock-alt icons"></i>
                    <label for="password">Enter Your Email Address</label>
                    <input type="email" class="form-control indiv input" id="email" name="email" placeholder="Email"
                        required />
                </div>
                <button name="reset_pass" id="submitbtn" type="submit" class="btn btn-outline-dark container my-3">Send
                    Reset Link</button>
            </form>

        </div>
    </div>

    <?php
require 'footer.php'
?>

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