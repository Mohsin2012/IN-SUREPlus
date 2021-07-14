<?php  

  if (session_status() == PHP_SESSION_NONE) 
  {
    session_start();
  }

  if(!isset($_SESSION['loggedin']))
  {
    header('location:admin_login.php');
  }

  $user= $_SESSION['User'];
  
?>



<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Basic Category</title>
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
          <li>Basic Category</li>
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

            <button type="button" class="btn btn-sm btn-outline-dark active">
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

              <button type="button" class="btn my-2 btn-sm btn-outline-dark active">
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

  <div class="col-md-9 mx-auto">

    <div class="text-center row shadow p-3 mb-5 bg-white rounded row align-items-center">

      <div class="col-md-4 offset-md-4">
        <h1><b>Basic Category</b></h1>
      </div>

      <div class="input-group my-3 col-md-4 row justify-content-end">
        <a href="admin_nor_cat_view.php"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i></a>
      </div>

    </div>
  </div>

  <div class="col-md-9 mx-auto table-responsive-sm">
    <table class="table table-sm table-bordered shadow p-3 mb-5 bg-white rounded">
      <thead class="table-dark">
        <tr>
          <th scope="col">Policy No</th>
          <th scope="col">Userid</th>
          <th scope="col">Policy Name</th>
          <th scope="col">Policy Company</th>
          <th scope="col">Monthly Pay</th>
          <th scope="col">Total Year</th>
          <th scope="col">Coverage</th>
          <!-- <th scope="col">Date</th> -->
          <th scope="col">Update</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php  

          include 'dbconnect.php';
                        
          $sq = " CALL `Basic_cursor`($user);"; 
          
          $query = mysqli_query($con, $sq) or die(mysqli_error($con));
          $result = mysqli_fetch_array($query);
          if(is_array($result))
          {                   
          $_SESSION['Userid']=$result['User_I'];
        ?>

        <tr>
          <th scope="row">
            <?php echo $result['Policy_N']; ?>
          </th>
          <td>
            <?php echo $result['User_I']; ?>
          </td>
          <td>
            <?php echo $result['Policy_Nam']; ?>
          </td>
          <td>
            <?php echo $result['Policy_Compan']; ?>
          </td>
          <td>
            <?php echo $result['Monthly_Pa']; ?>
          </td>
          <td>
            <?php echo $result['Total_Yea']; ?>
          </td>
          <td>
            <?php echo $result['Coverag']; ?>
          </td>
          <!-- <td>
            <?php echo $result['dat']; ?>
          </td> -->
          <td class="text-center"><a href="update_nor_cat.php?id=<?php echo $result['Policy_N']; ?>"> <i class="far fa-edit"></i></a>
          </td>
          <td class="text-center"><a href="delete_nor_cat.php?id=<?php echo $result['Policy_N']; ?>"><i class="far fa-trash-alt"></i></a></td>
        </tr>

        <?php
        
          }
          else
          {
            echo "<script type='text/javascript'>alert('Data Does No Exist ')</script>";
            ?>
        <script>
          window.location.href = "admin_nor_cat_view.php";
        </script>
        <?php
          }      
        ?>
      </tbody>
    </table>

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