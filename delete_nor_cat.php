<?php
    include 'dbconnect.php';

    $id=$_GET['id'];

    $delete = "DELETE FROM `norm_category` WHERE Policy_no=$id";

    $query=mysqli_query($con,$delete);
    header('location:admin_nor_cat_view.php');
?>



