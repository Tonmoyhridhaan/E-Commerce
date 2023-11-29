<?php   include 'include/adminauth.php' ;
        include 'include/connection.php';
        $id =  $_SESSION['id'];
        // $sname = $_SESSION['name'];
        //$semail = $_SESSION['email'];
        $query = "select * from admin where a_id = $id";
        $result = mysqli_query($con,$query);
        $row = mysqli_fetch_array($result);      
        $pass = $row['pass'];
        //echo $pass;
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up </title>
  <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="include/style.css" rel="stylesheet" />
  <style>
   .pad{
   padding-right :5%;
   } 
   .bot{
    padding-top:7%;
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
                        <h2 class="text-center">Reset Password</h2>
                        <br>
                        <form method="post" class="cmxform" action="" id="ReserPassword">
                            <div class="mb-3 mt-3">
                                <label for="oldpass">Old Pass</label>
                                    <input type="text" name="oldpass" class="form-control" id="oldpass" minlength="2" >
                            </div> 

                            <div class="mb-3 mt-3">
                                <label for="newpass">New Pass</label>
                                    <input type="text" name="newpass" class="form-control" id="newpass" minlength="2" >
                            </div> 

                            <div class="mb-3 mt-3">
                                <label for="confirmpass">Confirm Pass</label>
                                    <input type="text" name="confirmpass" class="form-control" id="confirmpass" minlength="2" >
                            </div> 

                            <div class="mb-3 mt-3 text-center">
                                    <input type="submit" class="btn btn-primary" name = "submit" id="submitForm" value="Reset" />
                            </div>
                            <?php
                                if(isset($_POST['submit'])){
                                    
                                    $Opass = $_POST['oldpass'];
                                    $pass1 =   $_POST['newpass'];
                                    $pass2 =   $_POST['confirmpass'];
                                                    //echo $Opass;
                                    if($Opass == $pass){
                                        if($pass1 == $pass2){
                                            $query1 = "update admin set pass = '$pass1' where a_id = $id";
                                                if(mysqli_query($con,$query1)){
                                                    echo '<span style= "color:green;">Successfully updated';
                                                }
                                                else{
                                                echo '<span style= "color:red;"> updated failed!!!';
                                                }
                                        }
                                        else{
                                        echo '<span style= "color:red;"> password doesnt match!!!';
                                        }
                                    }
                                    else{
                                        echo '<span style= "color:red;"> wrong old password!!!';
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
<?php include 'include/footer.php' ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>