<?php
  session_start();
  if(!isset($_SESSION['Userid']))
  { 
    header('location:userlogin.php');
  }
  if(isset($_POST['Add']))
  {
    include("dbconnect.php");

    if(!$con)
    {
      die("Connection to this database failed" . mysqli_connect_error());
    }
    else
    {
    
      $policy_name = $_POST['Policy_name'];
      $policy_comp = $_POST['Policy_Comp'];
      $monthly =$_POST['Monthly'];
      $total =  $_POST['Total'];
      $user_id =   $_SESSION['Userid']; 
      $coverage = $_POST['Coverage'] ;

      $sql = "INSERT INTO `prem_category` ( `Policy_name`, `Policy_company`, `Monthly_pay`, `Total_year`, `User_id`,`Coverage`) VALUES ('$policy_name','$policy_comp','$monthly','$total','$user_id','$coverage')";

      if(($con->query($sql)) == true)
      { 
        // session_destroy();
        header('location:reg_complete.php');
      }
      else
      {
        echo "Error: $sql <br> $con->error";
      }

      $con->close();

    }
  }
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Buy Basic Policy</title>
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
  <link href="assets/css/admin.css" rel="stylesheet">

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
        <h2>Premium Policy</h2>
        <ol>
          <li><a href="index.php">Home</a></li>
          <li><a href="plans.php">Insurance Schemes</a></li>
          <li>Premium Category</li>
        </ol>
      </div>
    </div>
  </section class="prof">
  <!-- End Breadcrumbs Section -->

  <section>

    <div class="container">

      <div class="col-lg-6 col-sm-8 shadow p-3 mb-5 bg-white rounded mx-auto">
        <div class="form-group text-center my-3">
          <div class="container ">
            <h1><b>Choose Insurance Scheme</b></h1>
          </div>
        </div>

        <script>
          var type = "Life Insurance";
          function jsFunctio(value) {
            type = value;
          }


          function jsFunction(value) {

            if (type == "Life Insurance") {

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
            else if (type == "Health Insurance") {

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
            else if (type == "Car Insurance") {

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

            else if (type == "Home Insurance") {

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

          <div class="form-group">
            <label>Policy Name</label>
            <select class="form-control form-control-sm input" aria-label=".form-select-lg example" name="Policy_name"
              onmousedown="this.value='';" onchange="jsFunctio(this.value);">
              <option value="Life Insurance">Life Insurance</option>
              <option value="Health Insurance">Health Insurance</option>
              <option value="Car Insurance">Car Insurance</option>
              <option value="Home Insurance">Home Insurance</option>
            </select>
          </div>

          <div class="form-group">
            <label>Policy Company</label>
            <select class="form-control form-control-sm input" aria-label=".form-select-lg example" name="Policy_Comp"
              onmousedown="this.value='';" onchange="jsFunction(this.value);">
              <option value="HDFC">HDFC</option>
              <option value="TATA">TATA</option>
              <option value="Kotak Mahindra">Kotak Mahindra </option>
              <option value="LIC">LIC</option>
            </select>
          </div>

          <div class="form-group">
            <label>Monthly Deposit</label>
            <input id="monthl" type="" name="Monthly" class="form-control form-control-sm" value="5999"
              readonly="readonly">
          </div>

          <div class="form-group">
            <label>Total Period(Year)</label>
            <input id="tota" type="number" name="Total" class="form-control form-control-sm" value="22"
              readonly="readonly">
          </div>

          <div class="form-group">
            <label>Coverage</label>
            <input id="coverag" type="number" name="Coverage" id="cvr" class="form-control form-control-sm"
              value="4000000" readonly="readonly">

          </div>

          <div class="form-group">
            <label>User Id</label>
            <input type="number" name="Customerno" class="form-control form-control-sm"
              value="<?php  $_SESSION['Userid']  ?>" placeholder="<?php echo $_SESSION['Userid']?>" disabled>
          </div>
          <br>
          <div class="text-center">
            <button type="submit" name="Add" class="btn btn-outline-dark btn-md">Buy Now</button>
          </div>

        </form>
      </div>

    </div>

  </section>

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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
    crossorigin="anonymous"></script>

</body>

</html>