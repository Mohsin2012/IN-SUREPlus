<?php

    error_reporting(E_ALL & ~E_NOTICE);

    if (session_status() == PHP_SESSION_NONE) 
    {
        session_start();
    }

    if (!(isset($_SESSION['loggedin']))||!($_SESSION['loggedin']==true)) 
    {
        header("location: userLogin.php");
        exit();
    }
    else
    { 
        include 'dbconnect.php';

        $id = $_SESSION['Userid'];

        $PolicyQuery = "SELECT * FROM user_policy WHERE User_id = '$id'";
        $policyQueryResult = mysqli_query($con, $PolicyQuery) or die(mysqli_error($con));
    }

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>View User Policy</title>
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
    <!-- <link href="http://netdna.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/profile.css">


</head>

<body>
    <?php
    include 'header.php';
    ?>

    <!-- ======= Breadcrumbs Section start ======= -->
    <section class="breadcrumbs" class="prof">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>User Panel</h2>
                <ol>
                    <li><a href="index.php">Home</a></li>
                    <li>View User Policy</li>
                </ol>
            </div>
        </div>
    </section>
    <!-- End Breadcrumbs Section -->

    <section id="cpanel">

        <div class="container col-md-9 desktop-visible">
            <div class="profile-user-box card-box bg-custom row shadow p-3 mb-5 bg-white rounded">
                <div class="col-sm-6 row">
                    <i class="fas fa-user-circle fa-5x"></i>

                    <span class="media-body col align-self-center">

                        <h2 class="mt-1 mb-1 font-18" id="tcl">
                            <?php echo $_SESSION['Username']; ?>
                        </h2>

                        <button type="button" class="btn btn-sm btn-outline-dark" data-toggle="tooltip" data-placement="bottom" title="Change Password">
                            <a href="change_pass.php">Change <i class="fal fa-key"></i></a>
                        </button>

                        <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="tooltip" data-placement="bottom" title="Delete Account">
                            <a href="account_del.php?id=<?php echo $_SESSION['Userid']; ?>"><i class="far fa-trash-alt"></i> Account</a>
                        </button>

                    </span>
                </div>

                <div class="col-sm-6 row">
                    <div class="btn-group col align-self-center" role="group" aria-label="Basic example">

                        <button type="button" class="btn btn-sm btn-outline-dark">
                            <a href="profile.php">View Profile</a>
                        </button>

                        <button type="button" class="btn btn-sm btn-outline-dark">
                            <a href="claim.php">Claim</a>
                        </button>

                        <button type="button" class="btn btn-sm btn-outline-dark">
                            <a href="payments.php">Payment</a>
                        </button>

                        <button type="button" class="btn btn-sm btn-outline-danger">
                            <a href="logout.php">Logout</a>
                        </button>

                    </div>
                </div>

            </div>
        </div>


        <div class="accordion container col-md-9" id="accordionExample">

            <div class="card bg-custom">

                <div type="button" class="card-header" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                aria-controls="collapseOne" id="headingOne">
                    <h2 class="my-auto text-center">
                        <i class="fas fa-user-circle my-2"></i> <?php echo $_SESSION['Username']; ?>
                    </h2>
                </div>

                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="text-center">

                            <button type="button" class="btn btn-sm btn-outline-dark">
                                <a href="profile.php">View Profile</a>
                            </button>

                            <button type="button" class="btn btn-sm btn-outline-dark my-2">
                                <a href="claim.php">Claim</a>
                            </button>

                            <button type="button" class="btn btn-sm btn-outline-dark my-2">
                                <a href="payments.php">Payment</a>
                            </button>

                            <button type="button" class="btn btn-sm btn-outline-dark my-2" data-toggle="tooltip" data-placement="bottom" title="Change Password">
                                <a href="change_pass.php">Change <i class="fal fa-key"></i></a>
                            </button>

                            <button type="button" class="btn btn-sm btn-outline-danger my-2" data-toggle="tooltip" data-placement="bottom" title="Delete Account">
                                <a href="account_del.php?id=<?php echo $_SESSION['Userid']; ?>"><i class="far fa-trash-alt"></i> Account</a>
                            </button>

                            <button type="button" class="btn btn-sm btn-outline-danger my-2">
                                <a href="logout.php">Logout</a>
                            </button>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>


    <!-- Normal/Premium Category Policies -->
    <?php while ($row = $policyQueryResult->fetch_assoc()): ?>
    <div class="container">
        <div class="container col-md-6 shadow p-3 mb-5 bg-white rounded">
            <div>
                <h3 id="details-header" class="text-center">Policy Details<h3>
            </div>
            <span class="titles">Policy No.
                <span class="form-control">
                    <?php echo $row['Policy_no']; ?>
                </span>
            </span><br />
            <span class="titles">Category
                <span class="form-control">
                    <?php echo $row['cat']; ?>
                </span>
            </span><br />
            <span class="titles">Policy Name
                <span class="form-control">
                    <?php echo $row['Policy_name']; ?>
                </span>
            </span><br />
            <span class="titles">Policy Company
                <span class="form-control">
                    <?php echo $row['Policy_company']; ?>
                </span>
            </span><br />
            <span class="titles">Monthly Pay
                <span class="form-control">
                    <?php echo $row['Monthly_pay']; ?>
                </span>
            </span><br />
            <span class="titles">Duration
                <span class="form-control">
                    <?php echo $row['Total_year']; ?>
                </span>
            </span><br />
            <span class="titles">Coverage
                <span class="form-control">
                    <?php echo $row['Coverage']; ?>
                </span>
            </span><br />
            <span class="titles">Date and Time of Registation
                <span class="form-control">
                    <?php echo $row['date']; ?>
                </span>
            </span>
        </div>
    </div>
    <?php endwhile; ?>
    <!-- End of Normal/Premium Category Policies -->
    <?php
    include 'footer.php';
    ?>

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

</body>

</html>