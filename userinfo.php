<?php  

    error_reporting(E_ALL & ~E_NOTICE);

    if (session_status() == PHP_SESSION_NONE) 
    {
        session_start();
    }

    $nameErr = $emailErr = $genderErr = $websiteErr = "";

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    include 'dbconnect.php';
    $registration = false;
    $emailValid = true;
    $mobValid = true;

    if(isset($_POST['submit'])) 
    {
        $Firstname = $_POST['Firstname'];
        $Lastname = $_POST['Lastname'];
        $Mobile = $_POST['Mobile'];
        $Email = $_POST['Email'];
        $dob = $_POST['dob'];
        $Gender = $_POST['gender'];
        $Address = $_POST['Address'];
        $state = $_POST['state'];
        $country = $_POST['country'];
        $com_address = $Address.', '.$state.', '.$country;
        $Regdate = date('y-m-d');

        

        $id = $_SESSION['Userid'];
        $Username = $_SESSION['Username'];
        $Password = $_SESSION['Password'];
        $Password = md5($Password);

        // Code block for checking unique email & mobile number
        if (isset($_POST['submit']))
        {
            // For email
            $checkEmail = $_POST['Email'];
            $emailQuery = mysqli_query($con, "SELECT `Email` FROM `user` WHERE `Email` = '$checkEmail';") or die(mysqli_error($con));
            $numOfemailRows = mysqli_num_rows($emailQuery);

            if ($numOfemailRows >= 1) 
            {
                $emailValid = false;
                $emailErr = "This email is already taken. Please enter another email.";
            }

            // For mobile
            $checkMob = $_POST['Mobile'];
            $mobQuery = mysqli_query($con, "SELECT `Mobile` FROM `user` WHERE `Mobile` = '$checkMob';") or die(mysqli_error($con));
            $numOfmobRows = mysqli_num_rows($mobQuery);

            if ($numOfmobRows >= 1) 
            {
                $mobValid = false;
                $mobErr = "This Mobile number is already taken. Please enter another one.";
            }

            if ($emailValid && $mobValid) 
            {
                mysqli_query($con, "INSERT INTO user(Userid, Firstname, Lastname, Mobile, Email, dob, Gender, Address, Regdate) 
                VALUES('$id', '$Firstname', '$Lastname', '$Mobile', '$Email', '$dob', '$Gender', '$com_address', '$Regdate')");

                header('location:plans.php');
                exit();
            }

        }
        
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Registation Form</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/piggy-bank-solid.svg" rel="icon">
    <link href="assets/img/piggy-bank-solid.svg" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500&display=swap" rel="stylesheet">

    <!-- icon CSS Files -->
    <link rel="stylesheet" href="assets/Font Awesome Pro 5.14.0/css/all.css">

    <!-- Main CSS File -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="assets/css/profile.css">
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

    <?php
    include 'header.php';
    ?>

    <!-- ======= Breadcrumbs Section start ======= -->
    <section class="breadcrumbs" class="">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>User Registration</h2>
                <ol>
                    <li><a href="index.php">Home</a></li>
                    <li>User Registration</li>
                </ol>
            </div>
        </div>
    </section>
    <!-- End Breadcrumbs Section -->

    <?php
        if (isset($_POST['submit'])) {
            include 'userinfoprocess.php';
        }

        if (!$emailValid && !$mobValid) {
            echo    "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>This email and mobile number already taken. Please enter another email and mobile number.</strong>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>";
        } else {
            if (!$emailValid) {
                echo    "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                            <strong>". $emailErr ."</strong>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>";
            }

            if (!$mobValid) {
                echo "  <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                            <strong>". $mobErr ."</strong>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>";
            }
        }

    ?>


  <section id="progress">
    <div class="progress">
      <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 25%">25%</div>
    </div>
  </section>

  
    <div class="container my-5 col-md-6 shadow p-3 mb-5 bg-white rounded p-5">

        <h1 class="text-center" style="font-family: Montserrat sans-serif;font-weight: 400;">User Registration</h1>

        <form id="userreg" name="userreg" action="userinfo.php" method="post" onsubmit="return validateForm()">
            <div class="row mt-3">
                <div class="col-md-6">
                    <label for="Firstname">Firstname</label>
                    <input type="text" id="firstname" name="Firstname" class="info input form-control form-control-sm"
                        placeholder="First Name" pattern="[A-Za-z].{2,}" title="Firstname should only contain lowercase and uppercase letters" required autocomplete="off"/>
                </div>
                <div class="col-md-6">
                    <label for="Lastname">Lastname</label>
                    <input type="text" id="lastname" name="Lastname" class="info input form-control form-control-sm"
                        placeholder="Last Name" pattern="[A-Za-z].{2,}" title="Lastname should only contain lowercase and uppercase letters" required autocomplete="off"/>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <label for="Mobile">Mobile</label>
                    <input type="text" id="mobile" name="Mobile" class="info input form-control form-control-sm"
                        placeholder="Mobile No." pattern="[1-9]{1}[0-9]{9}" title="10 Digits Only" maxlength="10" minlength="10" max="9999999999" required autocomplete="off"/>
                </div>
                <div class="col-md-6">
                    <label for="Email">Email</label>
                    <input type="email" id="email" name="Email" class="info form-control input form-control-sm"
                        placeholder="E-mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$" required autocomplete="off"/>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <label for="dob">Date Of Birth</label>
                    <input type="date" id="dob" name="dob" class="info input form-control form-control-sm"
                        placeholder="Date of Birth" max="2002-12-31" min="1950-12-31" required />
                </div>

                <div class="form-check form-check-inline">
                    <label class="form-check-label mt-4" for="gender">&emsp;Gender:</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input mt-4" type="radio" name="gender" id="male" value="Male">
                    <label class="form-check-label mt-4" for="male"> Male </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input mt-4" type="radio" name="gender" id="female" value="Female">
                    <label class="form-check-label mt-4" for="female"> Female</label>
                </div>
                
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <label for="Address">Address</label>
                    <input type="text" name="Address" class="info form-control form-control-sm input"
                        placeholder="Street, Building/house number, landmark, pincode" pattern="[A-Za-z0-9_].{10,}" title="Please enter valid Address for better communication" required autocomplete="off"/>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <label for="state">State</label>
                    <select name="state" id="state" class="form-control">
                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                        <option value="Assam">Assam</option>
                        <option value="Bihar">Bihar</option>
                        <option value="Chandigarh">Chandigarh</option>
                        <option value="Chhattisgarh">Chhattisgarh</option>
                        <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                        <option value="Daman and Diu">Daman and Diu</option>
                        <option value="Delhi">Delhi</option>
                        <option value="Lakshadweep">Lakshadweep</option>
                        <option value="Puducherry">Puducherry</option>
                        <option value="Goa">Goa</option>
                        <option value="Gujarat">Gujarat</option>
                        <option value="Haryana">Haryana</option>
                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                        <option value="Jharkhand">Jharkhand</option>
                        <option value="Karnataka">Karnataka</option>
                        <option value="Kerala">Kerala</option>
                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                        <option value="Maharashtra">Maharashtra</option>
                        <option value="Manipur">Manipur</option>
                        <option value="Meghalaya">Meghalaya</option>
                        <option value="Mizoram">Mizoram</option>
                        <option value="Nagaland">Nagaland</option>
                        <option value="Odisha">Odisha</option>
                        <option value="Punjab">Punjab</option>
                        <option value="Rajasthan">Rajasthan</option>
                        <option value="Sikkim">Sikkim</option>
                        <option value="Tamil Nadu">Tamil Nadu</option>
                        <option value="Telangana">Telangana</option>
                        <option value="Tripura">Tripura</option>
                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                        <option value="Uttarakhand">Uttarakhand</option>
                        <option value="West Bengal">West Bengal</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="country">Country</label>
                    <input type="text" name="country" class="info form-control form-control-sm input"
                        placeholder="India" value="India"  readonly="readonly"/>
                </div>
            </div>
            <div class="row my-3 d-flex justify-content-between align-items-center">
                <div class="col-md-6 mx-auto">
                    <button id="submit" name="submit" type="submit" value="Submit"
                        class="btn btn-sm btn-outline-dark btn-lg btn-block">Submit</button>
                </div>
            </div>
    </div>
    </form>

    </div>

    <?php
include 'footer.php';
?>

</body>
  <!-- Template Main JS File -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
    crossorigin="anonymous"></script>

<script src="assets/js/validation.js">
    
</script>

</html>