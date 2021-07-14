<?php
$showalert = false;
$showError = false;
  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    include 'dbconnect.php';
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];


    $sql = "INSERT INTO `contact` ( `name`, `email`, `subject`, `message`) VALUES ('$name', '$email', '$subject',  '$message')";
    $result = mysqli_query($con, $sql);
    if ($result)
    {
        $showalert = true;
    }
    else {
      $showError="Your message has not sent.";
    }
  }    
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>IN-SURE+ | Best Insurance Agency In India</title>
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

</head>

<body>

  <!-- ======= Header start ======= -->
  <?php
  include('header.php');
  ?>
  <!-- End Header -->
  <?php
        if($showalert){
            echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Your message has been sent. Thank you!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div> ';
        }
        if($showError){
            echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> '. $showError.'
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div> ';
        }
    ?>

  <!-- ======= Intro Section start ======= -->
  <section id="intro">

    <div class="intro-content">
      <h2>LIFE INSURANCE <span>DESIGNED FOR YOU !</span>
        <br>
        <i id="it">
          INSTANT, SIMPLE, SMART
        </i>
      </h2>
      <div>
        <a href="signup.php" class="btn-get-started scrollto">Get Started</a>
      </div>
    </div>

    <div id="intro-carousel">
      <div class="item" style="background-image: url('assets/img/intro-carousel/1.jpg');"></div>
    </div>

  </section>
  <!-- End Intro Section -->

  <main id="main">

    <!-- ======= About Section start======= -->
    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 about-img">
            <img src="assets/img/about-img.jpg" alt="">
          </div>

          <div class="col-lg-6 content shadow p-3 mb-5 bg-white rounded">
            <h2>Nothing is Certain, Except Insurance</h2>
            <h3>Complete protection for your loved ones.</h3>

            <ul>
              <li><i class="fa fa-check-circle"></i> Large cover at affordable rates.</li>
              <li><i class="fa fa-check-circle"></i> 100% Terminal illness payout.</li>
              <li><i class="fa fa-check-circle"></i> Tax benefits up to ₹54,600.</li>
              <li><i class="fa fa-check-circle"></i>It provides the insured with comprehensive coverage against various
                kinds of ailments and medical expenses.</li>
              <li><i class="fa fa-check-circle"></i> Get ₹ 1 Crore life cover starting at ₹ 490 per month. Your premiums
                remain fixed for the entire policy duration.</li>
            </ul>

          </div>
        </div>

      </div>
    </section>
    <!-- End About Section -->


    <!-- ======= Services Section start======= -->
    <section id="services">
      <div class="container">
        <div class="section-header">
          <h2>Services</h2>
        </div>

        <div class="row">

          <div class="col-lg-6">
            <div class="box">
              <div class="icon"><i class="fal fa-heartbeat"></i></div>
              <h4 class="title"><a href="">Life Insurance</a></h4>
              <p class="description">Savings through life insurance guarantee full protection against risk of death of
                the saver. Also, in case of demise, life insurance assures payment of the entire amount assured whereas
                in other savings schemes, only the amount saved is payable.
                .</p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="box ">
              <div class="icon"><i class="fal fa-home-alt"></i></div>
              <h4 class="title"><a href="">Home Insurance</a></h4>
              <p class="description">Get coverage built to protect your home. Allstate home insurance is more than
                quality coverage for your space. With access to innovative tools, money-saving discounts and a local
                agent, it's easy to make sure you're covering all your bases. </p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="box">
              <div class="icon"><i class="fal fa-car-crash"></i></div>
              <h4 class="title"><a href="">Car Insurance</a></h4>
              <p class="description">Protect your car against accidents, third party liability & get damages inspected
                online. Get your car insured with INSURE. Enjoy a hassle-free claims process.Get Cover for Accidential
                Damages. 24*7 Customer Support + No Paperwork + Instant Policy.</p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="box">
              <div class="icon"><i class="fal fa-medkit"></i></div>
              <h4 class="title"><a href="">Health Insurance</a></h4>
              <p class="description">Health is the most valuable commodity of life, more valuable than gold or diamonds.
                Once you lose gold, you can buy more, but if you compromised on your health, then you won’t ever be able
                to restore it, so you can select INSURE.</p>
            </div>
          </div>

        </div>

      </div>
    </section>
    <!-- End Services Section -->


    <!-- ======= Team Section start======= -->
    <section id="team">
      <div class="container">
        <div class="section-header">
          <h2>Our Team</h2>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="member">
              <!-- <div class="pic"><img src="assets/img/team-1.jpg" alt=""></div> -->
              <div class="details">
                <h4>Mohsin Sayyad</h4>
                <!-- <span>ABC</span> -->
                <div class="social">
                  <a href="https://twitter.com/Mohsin__2012?s=03"><i class="fab fa-twitter"></i></a>
                  <a href="https://facebook.com/mohsin.sayyad.2012"><i class="fab fa-facebook-f"></i></a>
                  <a href="https://www.instagram.com/i_am_mohsin_ms/"><i class="fab fa-instagram"></i></a>
                  <a href="https://linkedin.com/in/mohsin-sayyad-11b3501a1/"><i class="fab fa-linkedin-in"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member">
              <!-- <div class="pic"><img src="assets/img/team-2.jpg" alt=""></div> -->
              <div class="details">
                <h4>Rishu Rana</h4>
                <!-- <span>DEF</span> -->
                <div class="social">
                  <a href="https://twitter.com/RishuRa56825372?s=08"><i class="fab fa-twitter"></i></a>
                  <a href="https://www.facebook.com/profile.php?id=100008731112503"><i class="fab fa-facebook-f"></i></a>
                  <a href="https://www.instagram.com/rishurk123/"><i class="fab fa-instagram"></i></a>
                  <a href="https://www.linkedin.com/in/rishu-rana-26b3871ab"><i class="fab fa-linkedin-in"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member">
              <!-- <div class="pic"><img src="assets/img/team-3.jpg" alt=""></div> -->
              <div class="details">
                <h4>Vrushabh Raorane</h4>
                <!-- <span>PQR</span> -->
                <div class="social">
                  <a href="https://twitter.com/v_s_raorane?s=08"><i class="fab fa-twitter"></i></a>
                  <a href="https://www.facebook.com/v.s.raorane"><i class="fab fa-facebook-f"></i></a>
                  <a href="https://www.instagram.com/vrushabh_s_raorane/"><i class="fab fa-instagram"></i></a>
                  <a href="https://www.linkedin.com/in/vrushabhraorane02/"><i class="fab fa-linkedin-in"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member">
              <!-- <div class="pic"><img src="assets/img/team-4.jpg" alt=""></div> -->
              <div class="details">
                <h4>Arnold Waghmare</h4>
                <!-- <span>XYZ</span> -->
                <div class="social">
                  <a href="https://twitter.com/Arnold_Waghmare?s=08"><i class="fab fa-twitter"></i></a>
                  <a href="https://www.facebook.com/profile.php?id=100004278647370"><i class="fab fa-facebook-f"></i></a>
                  <a href="https://www.instagram.com/arnold_10219/"><i class="fab fa-instagram"></i></a>
                  <a href="https://www.linkedin.com/in/arnold-w-9a49b6122"><i class="fab fa-linkedin-in"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>
    <!-- End Team Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact">
      <div class="container">
        <div class="section-header">
          <h2>Contact Us</h2>
          <p>Our customer experiences define our brand.All professionally trained and monitored 24/7 Support by our
            quality assurance team.</p>
        </div>

        <div class="row contact-info shadow p-3 mb-5 bg-white rounded">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="fal fa-map-marker-alt"></i>
              <h3>Address</h3>
              <address>WE ARE EVERYWHERE</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="fal fa-phone"></i>
              <h3>Phone Number</h3>
              <p><a href="tel:+91 1234567890">+91 1234567890</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="far fa-envelope"></i>
              <h3>Email</h3>
              <p><a href="mailto:info@gmail.com">insure@gmail.com</a></p>
            </div>
          </div>

        </div>
      </div>

      <!--contact form start-->
      <div class="container">
        <div class="form">
          <form action="index.php" method="post">
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="name" required class="form-control input" id="name" placeholder="Your Name"
                  data-rule="minlen:4" data-msg="Please enter at least 4 chars" autocomplete="off"/>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control input" required name="email" id="email" placeholder="Your Email"
                  data-rule="email" data-msg="Please enter a valid email" autocomplete="off"/>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control input" required name="subject" id="subject" placeholder="Subject"
                data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" autocomplete="off"/>
            </div>
            <div class="form-group">
              <textarea class="form-control input" required name="message" rows="5" data-rule="required"
                data-msg="Please write something for us" placeholder="Message" autocomplete="off"></textarea>
            </div>

            <div class="text-center"><button type="submit" id="snd" class="btn btn-outline-dark">Send Message</button>
            </div>
          </form>
        </div>
      </div>
      <!--contact form start-->
    </section>
    <!-- End Contact Section -->



  </main><!-- End #main -->

  <!--  Footer Start -->
  <?php
  include('footer.php');
  ?>
  <!-- End Footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>


  <!-- Main JS File -->
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