<?php
   include 'include/adminauth.php';
   include 'include/connection.php';
   $uid = $_REQUEST['id'];
   $query = "update sellers set status=1 where s_id =$uid ";
   mysqli_query($con,$query);
   header('Location: block_sellers_list.php');
?>