<?php
   include 'include/adminauth.php';
   include 'include/connection.php';
   $uid = $_REQUEST['id'];
   $query = "update sellers set status=0 where s_id =$uid ";
   mysqli_query($con,$query);
   header('Location: sellers.php');
?>