<?php
    include 'dbconnect.php';

    $id=$_GET['id'];
    $delete = "DELETE FROM `prem_category` WHERE Policy_no=$id";

    $query=mysqli_query($con,$delete);
    header('location:admin_pre_category_view.php');
?>