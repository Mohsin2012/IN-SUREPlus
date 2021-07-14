<?php
  $loggedin=false;
  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
  {
    $loggedin=true;
  }
 
  // <!-- ======= Header start======= -->
  echo'<header class="shadow-sm p-3 mb-5 bg-white rounded" id="hdr">
  <nav class="navbar navbar-expand-lg navbar-light bg-white mx-4">
       <h2 class="m-2" id="brand"><a href="index.php">IN-<span id="spn">SURE<sup>+</sup></span></a></h2>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
       </button>
       <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
           <div class="navbar-nav ml-auto">
               <a class="nav-link" href="index.php">Home</a>';
               if (!$loggedin) {
                echo'
                <a class="nav-link" href="signin.php">Signin</a>';
      
                }
                if ($loggedin) {
                  echo'
                  <a class="nav-link" href="logout.php">Logout</a>';
                }
                echo' 
                <a class="nav-link" href="schemes.php">Plans</a>
                <a class="nav-link" href="index.php #contact">Contact Us</a>
                <a class="nav-link" href="index.php #about">About Us</a>
           </div>
       </div>
   </nav>
</header> ';