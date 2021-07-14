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

  <title>Premium Category</title>
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
          <li><a href="admin.php">Admin Panel</a></li>
          <li>Update Insurance Details</li>
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

            <button type="button" class="btn btn-sm btn-outline-dark active">
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

              <button type="button" class="btn my-2 btn-sm btn-outline-dark active">
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


  <div class="container">

    <div class="col-md-7 mx-auto shadow p-3 mb-5 bg-white rounded">

      <div class="text-center mb-5">
        <div class="col-md-6 offset-md-3">
          <h1><b>Update Insurance Details</b></h1>
        </div>
      </div>

      <script>
         var type="Life Insurance";
         function jsFunctio(value) {
           type = value;
         }


          function jsFunction(value) {
           
            if(type=="Life Insurance"){
                   
            if (value == "TATA") {

              var input1 = document.getElementById('monthl');
              input1.value = "7999";
              asd = "7999";
              var input2 = document.getElementById('coverag');
              input2.value = "5000000";
              var input3 = document.getElementById('tota');
              input3.value = "20";
            } else if (value == "HDFC") {

              var input1 = document.getElementById('monthl');
              input1.value = "8199";
              var input2 = document.getElementById('coverag');
              input2.value = "6000000";
              var input3 = document.getElementById('tota');
              input3.value = "21";
            } else if (value == "LIC") {

              var input1 = document.getElementById('monthl');
              input1.value = "8599";
              var input2 = document.getElementById('coverag');
              input2.value = "8000000";
              var input3 = document.getElementById('tota');
              input3.value = "20";
            } else if (value == "Kotak Mahindra") {

              var input1 = document.getElementById('monthl');
              input1.value = "8999";
              var input2 = document.getElementById('coverag');
              input2.value = "10000000";
              var input3 = document.getElementById('tota');
              input3.value = "21";
            }
          }
          else if(type=="Health Insurance"){
                   
                   if (value == "TATA") {
       
                     var input1 = document.getElementById('monthl');
                     input1.value = "7990";
                     asd = "7990";
                     var input2 = document.getElementById('coverag');
                     input2.value = "4900000";
                     var input3 = document.getElementById('tota');
                     input3.value = "19";
                   } else if (value == "HDFC") {
       
                     var input1 = document.getElementById('monthl');
                     input1.value = "8190";
                     var input2 = document.getElementById('coverag');
                     input2.value = "5900000";
                     var input3 = document.getElementById('tota');
                     input3.value = "22";
                   } else if (value == "LIC") {
       
                     var input1 = document.getElementById('monthl');
                     input1.value = "8590";
                     var input2 = document.getElementById('coverag');
                     input2.value = "7900000";
                     var input3 = document.getElementById('tota');
                     input3.value = "20";
                   } else if (value == "Kotak Mahindra") {
       
                     var input1 = document.getElementById('monthl');
                     input1.value = "8990";
                     var input2 = document.getElementById('coverag');
                     input2.value = "9000000";
                     var input3 = document.getElementById('tota');
                     input3.value = "21";
                   }
                 }
                  else if(type=="Car Insurance"){
                   
                   if (value == "TATA") {
       
                     var input1 = document.getElementById('monthl');
                     input1.value = "7980";
                     asd = "7980";
                     var input2 = document.getElementById('coverag');
                     input2.value = "4900000";
                     var input3 = document.getElementById('tota');
                     input3.value = "21";
                   } else if (value == "HDFC") {
       
                     var input1 = document.getElementById('monthl');
                     input1.value = "8180";
                     var input2 = document.getElementById('coverag');
                     input2.value = "5900000";
                     var input3 = document.getElementById('tota');
                     input3.value = "22";
                   } else if (value == "LIC") {
       
                     var input1 = document.getElementById('monthl');
                     input1.value = "8580";
                     var input2 = document.getElementById('coverag');
                     input2.value = "7900000";
                     var input3 = document.getElementById('tota');
                     input3.value = "21";
                   } else if (value == "Kotak Mahindra") {
       
                     var input1 = document.getElementById('monthl');
                     input1.value = "8980";
                     var input2 = document.getElementById('coverag');
                     input2.value = "9000000";
                     var input3 = document.getElementById('tota');
                     input3.value = "27";
                   }
                 }

                 else if(type=="Home Insurance"){
                   
                   if (value == "TATA") {
       
                     var input1 = document.getElementById('monthl');
                     input1.value = "7970";
                     asd = "7970";
                     var input2 = document.getElementById('coverag');
                     input2.value = "5000000";
                     var input3 = document.getElementById('tota');
                     input3.value = "21";
                   } else if (value == "HDFC") {
       
                     var input1 = document.getElementById('monthl');
                     input1.value = "8170";
                     var input2 = document.getElementById('coverag');
                     input2.value = "6000000";
                     var input3 = document.getElementById('tota');
                     input3.value = "22";
                   } else if (value == "LIC") {
       
                     var input1 = document.getElementById('monthl');
                     input1.value = "8570";
                     var input2 = document.getElementById('coverag');
                     input2.value = "8000000";
                     var input3 = document.getElementById('tota');
                     input3.value = "22";
                   } else if (value == "Kotak Mahindra") {
       
                     var input1 = document.getElementById('monthl');
                     input1.value = "8970";
                     var input2 = document.getElementById('coverag');
                     input2.value = "10000000";
                     var input3 = document.getElementById('tota');
                     input3.value = "25";
                   }
                 }
          }
        </script>

      <form method="POST" action="">

        <?php

          $id = $_GET['id'];
          include("dbconnect.php");

          $sq = "SELECT * FROM `prem_category` where Policy_no=$id"; 
          $query = mysqli_query($con,$sq);

          $result = mysqli_fetch_assoc($query);

          if(isset($_POST['Add']))
          {
            
            if(!$con)
            {
              die("Connection to this database failed" . mysqli_connect_error());
            }
            else
            {
              $policy_name = $_POST['Policy_name'];
              $policy_comp = $_POST['Policy_Comp'];
              $monthly =$_POST['Monthly'];
              $total = $_POST['Total'];
              $user_id = $_POST['user_id'];
              $coverage = $_POST['Coverage'];
            
              $sql = "UPDATE prem_category SET Policy_name='$policy_name',Policy_company='$policy_comp',Monthly_pay='$monthly',Total_year='$total',User_id='$user_id',Coverage='$coverage' WHERE Policy_no=$id";

              if(($con->query($sql)) == true)
              { 
                ?>
        <script>
          window.location.href = "admin_pre_category_view.php";
        </script>
        <?php
              }
              else
              {
                echo "Error: $sql <br> $con->error";
              }

              $con->close();
            }
          }

        ?>

        <div class="form-group">
          <label>Policy Name</label>
          <select class="form-control form-control-sm input" aria-label=".form-select-lg example"
            name="Policy_name" onmousedown="this.value='<?php echo $result['Policy_name']; ?>';" onchange="jsFunctio(this.value);">
            <option value="<?php echo $result['Policy_name']; ?>" selected style="background-color:grey;">
            <?php echo $result['Policy_name']; ?><span style="color:green;"> ✔</span>
            </option>
            <option value="Life Insurance">Life Insurance</option>
            <option value="Health Insurance">Health Insurance</option>
            <option value="Car Insurance">Car Insurance</option>
            <option value="Home Insurance">Home Insurance</option>
          </select>
        </div>
        
        <div class="form-group">
          <label>Policy Company</label>
          <select class="form-control form-control-sm input" aria-label=".form-select-lg example"
            name="Policy_Comp" onmousedown="this.value='<?php echo $result['Policy_company'];  ?>';" onchange="jsFunction(this.value);">
            <option value="<?php echo $result['Policy_company'];  ?>" selected style="background-color:grey;">
            <?php echo $result['Policy_company'];  ?><span style="color:green;"> ✔</span>
            </option>
            <option value="HDFC">HDFC</option>
            <option value="TATA">TATA</option>
            <option value="Kotak Mahindra">Kotak Mahindra </option>
            <option value="LIC">LIC</option>
          </select>
        </div>

        <div class="form-group">
          <label>Monthly Deposit</label>
          <input id="monthl" type="" name="Monthly" value="<?php echo $result['Monthly_pay'];  ?> "
            class="form-control form-control-sm">
        </div>

        <div class="form-group">
          <label>Total Period(Year)</label>
          <input id="tota" type="" name="Total" value="<?php echo $result['Total_year'];  ?> "
            class="form-control form-control-sm">
        </div>

        <div class="form-group">
          <label>Coverage</label>
          <input id="coverag" type="" name="Coverage" value="<?php echo $result['Coverage'];  ?> " id="cvr"
            class="form-control form-control-sm">
        </div>

        <div class="form-group">
          <label>User_Id</label>
          <input type="number" name="user_id" class="form-control form-control-sm"
            value="<?php echo $result['User_id'];  ?>" placeholder="" readonly="readonly">
        </div>

        <div class="text-center">
          <button type="submit" name="Add" class="btn btn-outline-dark btn-md">Update</button>
        </div>

      </form>

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

</body>

</html>