<?php
   include 'adminauth.php';
   include 'include/connection.php';
   $id = $_REQUEST['id'];
   $query = "delete from products where p_id = $id ";
   mysqli_query($con,$query);
   header('Location: product_request.php');
?>