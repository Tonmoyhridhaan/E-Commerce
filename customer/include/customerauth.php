
<?php
    session_start();
    if( $_SESSION['isloggedin'] != 'yes'){
        header('Location: ../logout.php');
    }
    else if($_SESSION['user']!='customer'){
        header('Location:../unauthorised.php');
    }   
   
?>
