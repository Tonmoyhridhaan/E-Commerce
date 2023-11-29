<?php
   include 'include/adminauth.php';
   include 'include/connection.php';
   if(isset($_REQUEST['id'])){
      $uid = $_REQUEST['id'];
      $query = "update products set status=0 where p_id =$uid ";
      mysqli_query($con,$query);
      header('Location: allproducts.php');
   }
   else if(isset($_REQUEST['pid'])){
      $uid = $_REQUEST['pid'];
      $query = "update products set status=0 where p_id =$uid ";
      mysqli_query($con,$query);
      $query2 = "delete from warningmassage where p_id =$uid ";
      mysqli_query($con,$query2);
      header('Location: warningmsg.php');
   }
   
?>