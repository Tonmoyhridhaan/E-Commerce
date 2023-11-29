<?php 
    session_start();
    $_SESSION['isloggedin'] = 'no';
    $_SESSION['user'] = 'none';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Site</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  <style>
    .bg-secondary {
        background-color: #054b898a!important;
    }
    /* .btn-primary {
        color: #fff;
        background-color: #054b898a!important;
        border-color: #054b898a!important;
    } */
    /* .btn-danger {
    color: #fff;
    background-color: #0d84fdb8;
    border-color: #0d84fdb8;
} */
    .col{
        color:#054b898a!important;
    }
    .update {
        padding-left:40%;
        
      }
    .para{
        font-size:17px ;
        font-family:Helvetica ;
    }
    .cl{
        padding-left:36%;
    }
    .b{
         background-color: #b6c5d5!important;
         
   }
   .new{
       padding-top:8.5%;
   }
   a {
    color: #343a40;
    text-decoration: underline;
}

</style>
</head>
<body>
<div class="container mt-3">
  <div class="mt-4 p-4 bg-secondary text-light rounded">
    <h1>Click And Collect</h1> 
    <p class="para">welcome to click and collect.Please log in if you are registered before.Otherwise  <a href="register.php">register</a> here.One thing if you want to register as seller <a href="registerseller.php">click</a>  here.And Go to Home page by <a href="index.php">this</a> link.</p> 
  </div>
  <div class="mt-5 card">
    <div class="card bg-light text-dark">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 mt-5 mb-2">
                <h2 class="text-center">Login form</h2>
                    <form method="post" class="cmxform" action="" id="loginForm" name="theform">
                        <div class="mb-3 mt-3">
                            <label for="email">Email:</label>
                            <input type="text" onkeyup="checkform()" name="usermail" class="form-control" id="username"  placeholder="Write your email" />
                        </div>
                        <div class="mb-3">
                            <label for="pwd">Password:</label>
                            <input type="password" onkeyup="checkform()" name="password" class="form-control" id="password" placeholder="Enter password"  />
                        </div>
                        <div class="form-check mb-3">
                            <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="remember"> Remember me
                            </label>
                        </div>
                        <div class = "row">
                            <div class= "col-sm-6 update">
                                <input type="submit" id="submitbutton" disabled="disabled" name = "login" class="btn btn-primary"  value="Log In" />
                            </div>
                            <div class="col-sm-6 ">
                                <input type="submit" id ="resetbtn" class="btn btn-danger" value="Reset" onclick="resetText()" />
                            </div>
                        </div>
                        <br>
                        <div class = "row">
                                <div class = "col-sm-6">
                                    <small> don't have an account? <a href = "register.php">create one</a> </small>
                                </div>
                                <div class = "col-sm-6 cl">
                                    <small><a href="forgot_password.php" style="line-decoration:none;">Forgot Password?</a></small>
                                </div>
                        </div>  
                        <?php 
                            if(isset($_POST['login'])){
                                    include 'connection.php';
                                    $email=$_POST['usermail'];
                                    $pass = $_POST['password'];
                                    echo $email;
                                    echo '<br>';
                                    echo $pass;
                                    $query="SELECT * FROM admin WHERE email = '$email' AND pass='$pass'"; 
                                    $table=mysqli_query($con, $query);
                                    $row = mysqli_fetch_array($table);
                                    if($row){
                                        $_SESSION['isloggedin'] = 'yes';
                                        $_SESSION['user'] = 'admin'; 
                                        $_SESSION['id']=$row['a_id'];
                                        $_SESSION['name'] = $row['name'];
                                        $_SESSION['email'] = $row['email']; 
                                        $_SESSION['img'] = $row['img'];
                                        echo "<script>window.location.href='admin/account.php'</script>" ;
                                        //header('Location: admin/account.php');
                                    }
                                    else{
                                        $query = "select * FROM sellers WHERE email ='$email' AND  pass = '$pass' ";
                                        $table = mysqli_query($con,$query);
                                        $row = mysqli_fetch_array($table);
                                        if($row){
                                            $_SESSION['isloggedin'] = 'yes';
                                            $_SESSION['user'] = 'seller';
                                            $_SESSION['id']=$row['s_id'];
                                            $_SESSION['name'] = $row['name'];
                                            $_SESSION['email'] = $row['email']; 
                                            $_SESSION['img'] = $row['img'];
                                            echo "<script>window.location.href='seller/account.php'</script>" ;
                                            //header('Location: seller/account.php');
                                        }
                                        else{
                                            $query = "select * FROM customers WHERE email ='$email' AND  pass = '$pass' ";
                                            $table = mysqli_query($con,$query);
                                            $row = mysqli_fetch_array($table);
                                            
                                            if($row){
                                                $_SESSION['isloggedin'] = 'yes';
                                                $_SESSION['user'] = 'customer';
                                                $_SESSION['id']=$row['c_id']; 
                                                $_SESSION['name'] = $row['name'];
                                                $_SESSION['email'] = $row['email'];
                                                $_SESSION['img'] = $row['img'];
                                                echo "<script>window.location.href='customer/account.php'</script>" ;
                                               // header('Location: customer/account.php');
                                            }
                                            else{
                                                
                                                echo "<span style = 'color:red;'>Invalid mail or pass.Please try again";
                                            }                          
                                        }                    
                                    
                                }
                                    


                            }
                        ?>
                        <br>
                        <!-- <div class = "row">
                            <div class="pull-left col">
                                <a href="registerseller.php">Create a new account as a seller</a>
                            </div>
                            <div class="pull-center col">
                                <a href="register.php">Create a new account as a  customer </a>
                            </div>  
                            <div class="pull-right col">
                                <a href="forgot_password.html">Forgot Password</a>
                            </div>

                        </div> -->
                        
                    </form>
            </div>
        </div>
    </div>
  </div>
</div>
<script src="script.js"></script>
<div class="new">
    <footer>
    <div class="text-center p-3 b">
        © 2022 Copyright:
        <a class="text-Blue" href="../../index.php">ClickAndCollect.com</a>
    </div>
        <!-- Copyright -->
    </footer>
</div>
 

</body>
</html>