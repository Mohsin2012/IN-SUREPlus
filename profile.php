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
        $emailValid = true;
        $mobValid = true;
        $sqlquery = "SELECT * FROM user WHERE Userid = '$id'";
        
        $resultquery = mysqli_query($con, $sqlquery) or die(mysqli_error($con));
        $update = false;

        if(isset($_GET['edit'])) 
        {
            $id = $_GET['edit'];
            $update = true;
            $result = mysqli_query($con, "SELECT * FROM user WHERE Userid='$id'") or die(mysqli_error($con));

            if($result) 
            {
                $row = $result->fetch_array();
                $Firstname = $row['Firstname'];
                $Lastname = $row['Lastname'];
                $Mobile = $row['Mobile'];
                $Email = $row['Email'];
                $Address = $row['Address'];
            }

        }

        if(isset($_POST['update'])) 
        {
            $id = $_SESSION['Userid'];
            $Firstname = $_POST['Firstname'];
            $Lastname = $_POST['Lastname'];
            $Mobile = $_POST['Mobile'];
            $Email = $_POST['Email'];
            $Address = $_POST['Address'];

            mysqli_query($con, "UPDATE user SET Firstname='$Firstname', Lastname='$Lastname', Mobile='$Mobile', Email='$Email', Address='$Address'  WHERE Userid=$id") or die(mysqli_error($con));

            $_SESSION['message'] = "Profile updated successfully!";
            $_SESSION['msg_type'] = "success alert-dismissible";

            header('location:profile.php');
        }
    } 
  
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Profile</title>
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
    <link href="assets/css/style.css" rel="stylesheet">

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
                    <li>User Profile</li>
                </ol>
            </div>
        </div>
    </section>
    <!-- End Breadcrumbs Section -->


    <section id="cpanel">

        <div class="container col-md-9 desktop-visible ">
            <div class="profile-user-box card-box bg-custom row shadow p-3 mb-5 bg-white rounded">
                <?php while ($row = $resultquery->fetch_assoc()): ?>
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
                            <a href="view_policy.php">View Policy</a>
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

                            <button type="button" class="btn btn-sm btn-outline-dark my-2">
                                <a href="view_policy.php">View Policy</a>
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


    <div class="container">
        <div class="container col-md-6 shadow p-3 mb-5 bg-white rounded">
            <h1 class="text-center">Profile</h1>
            <form action="profile.php" method="POST">
                <?php if(!$update): ?>
                <span class="titles">Username</span>
                <span class="form-control">
                    <?php echo $_SESSION['Username']; ?>
                </span><br />
                <?php endif; ?>
                <span class="titles">Firstname</span>
                <?php if($update): ?>
                <input type="text" class="form-control input" name="Firstname" placeholder="Firstname"
                    value="<?php echo $row['Firstname']; ?>" pattern="[A-Za-z]{2,}" title="Firstname should only contain lowercase and uppercase letters" autocomplete="off" autofocus><br />
                <?php else: ?>
                <span class="form-control">
                    <?php echo $row['Firstname']; ?>
                </span><br />
                <?php endif; ?>
                <span class="titles">Lastname</span>
                <?php if($update): ?>
                <input type="text" class="form-control input" name="Lastname" autocomplete="off" placeholder="Lastname"
                    value="<?php echo $row['Lastname']; ?>" pattern="[A-Za-z]{2,}" title="Lastname should only contain lowercase and uppercase letters"><br />
                <?php else: ?>
                <span class="form-control">
                    <?php echo $row['Lastname']; ?>
                </span><br />
                <?php endif; ?>
                <span class="titles">Email</span>
                <?php if($update): ?>
                <input type="email" class="form-control input" name="Email" autocomplete="off" placeholder="Email"
                    value="<?php echo $row['Email']; ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" autocomplete="off"><br />
                <?php else: ?>
                <span class="form-control">
                    <?php echo $row['Email']; ?>
                </span><br />
                <?php endif; ?>
                <span class="titles">Mobile No.</span>
                <?php if($update): ?>
                <input type="tel" class="form-control input" name="Mobile" pattern="[1-9]{1}[0-9]{9}" title="10 Digits Only" maxlength="10" minlength="10" max="9999999999" autocomplete="off" placeholder="Mobile No."
                    value="<?php echo $row['Mobile']; ?>"><br />
                <?php else: ?>
                <span class="form-control">
                    <?php echo $row['Mobile']; ?>
                </span><br />
                <?php endif; ?>
                <span class="titles">Address</span>
                <?php if($update): ?>
                <input type="text" class="form-control input" name="Address" autocomplete="off" readonly="readonly" placeholder="Address"
                    value="<?php echo $row['Address'] ?>"><br />
                <?php else: ?>
                <span class="form-control">
                    <?php echo $row['Address']; ?>
                </span> <br />
                <?php endif; ?>
                <?php if(!$update): ?>
                <span class="titles">DOB</span>
                <span class="form-control">
                    <?php echo $row['dob']; ?>
                </span><br />
                <span class="titles">Registered on</span>
                <span class="form-control">
                    <?php echo $row['Regdate']; ?>
                </span><br />
                <?php endif; ?>
                <?php endwhile; ?>
                <?php if($update): ?>
                <div class="d-flex justify-content-between align-items-center">
                    <button type="submit" name="update" class="btn btn-outline-dark mx-auto">Save Changes</button>
                </div>
                <?php endif; ?>
            </form>
            <?php if(!$update): ?>
            <div class="row">
                <button type="button" class="btn btn-md btn-outline-dark mx-auto"><a
                        href="profile.php?edit=<?php echo '';?>">Edit Profile</a></button>
            </div>
            <?php endif; ?>

        </div>
    </div>

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