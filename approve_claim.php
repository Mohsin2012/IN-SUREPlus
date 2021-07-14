<?php

    include 'dbconnect.php';

    $id=$_GET['id'];

    $normsql="SELECT * FROM `norm_category` WHERE `User_id`=$id";
    $query=mysqli_query($con,$normsql);
    if (mysqli_num_rows($query)!=0)
    {
        $delete = "DELETE FROM `norm_category` WHERE `User_id`=$id";
        $query=mysqli_query($con,$delete);
        $delete = "DELETE FROM `claim_req` WHERE `claim_req`.`userid` = $id";
        $query=mysqli_query($con,$delete);
    }
    else
    {
        $delete = "DELETE FROM `prem_category` WHERE `User_id`=$id";
        $query=mysqli_query($con,$delete);
        $delete = "DELETE FROM `claim_req` WHERE `claim_req`.`userid` = $id";
        $query=mysqli_query($con,$delete);
    }

    header('location:claim_req.php');
?>