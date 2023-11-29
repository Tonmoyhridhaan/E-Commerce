<?php   
        include 'connection.php';
        $email = $_REQUEST['email'];
        $contact = $_REQUEST['contact'];
            
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
  <link href="customer/include/style.css" rel="stylesheet" />
  <style>
   .pad{
   padding-right :5%;
   } 
   .bot{
    padding-top:20%;
   }
</style>
    
</head>
<body>
<div class="b">
    <?php include 'navbar.php' ?>
</div>
<div class="account-page">   
 <div class="container-fluid">
    <div class="row"> 
        <div class="col-sm-2"></div> 
    <div class="col-sm-8">
        <div class="mt-0 card">  
            <div class="card bg-light text-dark">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8 mt-5 mb-5">
                        <h2 class="text-center">Reset Password</h2>
                        <br>
                        <form method="post" class="cmxform" action="" id="ReserPassword">
                        <div class="mb-3 mt-3">
                                            <label for="newpass">New Pass</label>
                                                <input type="text" name="newpass" class="form-control" id="newpass" minlength="2" >
                                        </div> 

                                        <div class="mb-3 mt-3">
                                            <label for="confirmpass">Confirm Pass</label>
                                                <input type="text" name="confirmpass" class="form-control" id="confirmpass" minlength="2" >
                                        </div> 


                                        <div class="mb-3 mt-3 text-center">
                                                <input type="submit" class="btn btn-primary" name = "reset" id="submitForm1" value="Reset" />
                                        </div>
                            <?php
                                if(isset($_POST['reset'])){

                                    $pass1 =   $_POST['newpass'];
                                    $pass2 =   $_POST['confirmpass'];
                                    if($pass1 == $pass2){
                                            $query1 = "update customers set pass = '$pass1' where email = '$email'   and mobile = '$contact'";
                                                if(mysqli_query($con,$query1)){
                                                    echo '<span style= "color:green;">Successfully updated';?>
                                                    <br>
                                                    <a href="login.php">login</a>
                                              <?php  }
                                                else{
                                                echo '<span style= "color:red;"> updated failed!!!';
                                                }
                                        }
                                        else{
                                        echo '<span style= "color:red;"> password doesnt match!!!';
                                        }
                                }
                            ?>               
                        </form>
                    </div>
                </div> 
            </div>
        </div> 

    </div>
</div>  

</div>

</div>
<div class="bot">
      <?php include 'customer/include/footer.php' ?>
</div>
</body>
</html>