<?php
   include 'include/adminauth.php';
   include 'include/connection.php';
   $uid = $_REQUEST['id'];
   $query = "update products set status=1 where p_id =$uid ";
   mysqli_query($con,$query);
   header('Location: block_products_list.php');
?>