<?php

include 'dbconnect.php';

$id=$_GET['id'];

$delete = "DELETE FROM `login` WHERE Userid =$id";

$query=mysqli_query($con,$delete);
session_start();
session_unset();
session_destroy();
// header('location:index.php');
echo "<script type='text/javascript'>alert('Your Account Has Been Deleted Successfully.')</script>";
echo "<script type='text/javascript'>window.location.href = 'index.php'</script>";          
?>