<?php 
session_start();
 $id = $_REQUEST['id'];
 echo $id;
  if($id>-1){
    foreach($_SESSION['cart'] as $key=>$value){ 
        if($id == $value['id']){
            // echo $value['id'];
            // echo $value['name'];
            // echo $value['quantity'];
             unset($_SESSION['cart'][$key]);
            break;
        }
    }
  }
  else if($id == -1){ 
    unset($_SESSION['cart']);
    
  }
  header('Location: account_carts.php');
?>

