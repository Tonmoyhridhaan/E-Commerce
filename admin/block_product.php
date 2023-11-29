<?php
   include 'include/adminauth.php';
   include 'include/connection.php';
   $uid = $_REQUEST['id'];
   $query = "update products set status=0 where p_id =$uid ";
   mysqli_query($con,$query);
   header('Location: allproducts.php');
?>