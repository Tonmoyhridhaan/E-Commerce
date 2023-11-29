<?php
   include 'include/adminauth.php';
   include 'include/connection.php';
   $uid = $_REQUEST['id'];
   $query = "update customers set status=0 where c_id =$uid ";
   mysqli_query($con,$query);
   header('Location: customers.php');
?>