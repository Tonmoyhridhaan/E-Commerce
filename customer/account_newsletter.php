<?php 
include 'include/customerauth.php';
include 'include/connection.php';
$cid =  $_SESSION['id'];

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up </title>
  <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="include/style.css" rel="stylesheet" />
  <style>
   .pad{
   padding-right :5%;
   } 
   .bot{
    padding-top:15%;
   }
</style>
    
</head>
<body>
<div class="b">
    <?php include 'include/navbar.php' ?>
</div>
<div class="account-page">   
 <div class="container-fluid">
    <div class="row">
  
            <div class="col-sm-3 mt-0 pad">
                <?php include 'include/sidebar.php' ?>
            </div>
      
    <div class="col-sm-9">
        <div class="mt-0 card">  
            <div class="card bg-light text-dark">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8 mt-5 mb-5">
                        <h2 class="text-center">Account News Letter</h2>
                        <br>
                        <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="well">
                                <h3>News Letters</h3>
                                <p>Do you want to get the latest product news and promotion offers then make it on otherwise off it.</p>
                                <!-- <p class="pull-right"><a href="#"><i class="fa fa-edit"></i> Edit</a></p> -->
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div> 

    </div>
</div>  

</div>

</div>
<div class="bot">
      <?php include 'include/footer.php' ?>
</div>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/webslidemenu.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
