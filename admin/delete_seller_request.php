<?php
   include 'include/adminauth.php';
   include 'include/connection.php';
   $id = $_REQUEST['id'];
   $query = "delete from sellers where s_id = $id ";
   mysqli_query($con,$query);
   header('Location: seller_request.php');
?>