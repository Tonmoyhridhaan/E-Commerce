<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up </title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  <style>
    .bg-secondary {
        background-color: #054b898a!important;
    }
    .btn-primary {
        color: #fff;
        background-color: #054b898a!important;
        border-color: #054b898a!important;
    }
    .btn-success {
        color: #fff;
        background-color: #054b898a!important;
        border-color: #054b898a!important;
   }
   .new{
       padding-top:8.5%;
   }
   .b{
         background-color: #b6c5d5!important;
         
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
    <p class="para">Create your click and collect account.Already member?<a href="login.php">login</a> here.Go to <b>Home</b>  by<a href="index.php">This</a> Link. </p> 
  </div>
  <div class="mt-5 card">
    <div class="card bg-light text-dark">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 mt-5 mb-5">
                <h2 class="text-center">Signup form</h2>
                <br>
                <form method="post" class="cmxform" action="registerseller.php" enctype="multipart/form-data" id="signUpForm">
                      
                        <div class="mb-3 mt-3">
                            <label for="name">Name:</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Write your name" name="name" minlength="2" required>
                        </div>
                        <div class="mb-3">
                            <label for="pwd">Email:</label>
                            <input type="email" name="email" class="form-control email" id="email" placeholder="write your email address" required>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="contact">Contact:</label>
                            <input type="text" name="contact" class="form-control" id="contact" placeholder="018********" required>
                        </div>
                        <div class="mb-3">
                            <label for="image">Image:</label>
                            <input type="file" name="image" class="form-control" id="files" placeholder="" required>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="address">Address:</label>
                            <input type="text" name="address" class="form-control" id="address" placeholder="write your address" required>
                        </div>

                        <div class="mb-3 mt-3">
                            <label for="tradelicence">Trade_licence :</label>
                            <input type="text" name="tradelicence" class="form-control" id="tradelicence" placeholder="tradelicence">
                        </div>
                        <div class="mb-3">
                            <label for="experience">Experience :</label>
                            <input type="text" name="experience" class="form-control" id="experience" placeholder="write your experience">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="cv">CV:</label>
                            <input type="file" name="cv" class="form-control" id="cv" placeholder="upload your cv">
                        </div>

                        <div class="mb-3">
                            <label for="gender">Gender:</label>
                            <select name="gender" class="form-control" id="Gender" type="text" placeholder="Enter your gender" required>
                                    <option value="NULL">Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female"> Female</option>
                                    <option value="other">Other</option>
                                </select>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="date">Date:</label>
                            <input type="date" class="form-control" name="dob" id="dob" placeholder="Enter Birthdate" required>
                        </div>
                        <div class="mb-3">
                            <label for="pass1">Password:</label>
                            <input type="password" name="pass1" class="form-control" id="pass1" placeholder="Enter password" required>
                        </div>
                        <div class="mb-3">
                            <label for="pass2">Confirm Password:</label>
                            <input type="password" class="form-control" name="pass2" id="pass2" placeholder="Same password previously entered" required>
                        </div>
                        <br>
                        <div class="text-center">
                            <input type="submit" name = "submit" class="btn btn-success" id="submitForm" value="Sign Up Now" />
                      </div>
                      <div>
                      <small> already sign up? <a href = "login.php">login</a> </small>  
                      </div>
                      <?php
                            if(isset($_POST['submit'])){
                                include 'connection.php';
                                $name =   $_POST['name'];
                                $mail = $_POST['email'];
                                $address = $_POST['address'];
                                $contact = $_POST['contact'];
                                $pass1 = $_POST['pass1'];
                                $pass2 =  $_POST['pass2']; 
                                $dob = $_POST['dob'];
                                $gender = $_POST['gender'];
                               // $img = $_FILES['image']['name'];
                                $experience = $_POST['experience'];
                                $trade = $_POST['tradelicence'];
                                $cv =$_FILES['cv']['name'];
                                // echo  $name;
                                // echo '<br>';
                                // echo   $mail;
                                // echo '<br>';
                                // echo  $address;
                                // echo '<br>';
                                // echo  $contact;
                                // echo '<br>';
                                // echo  $pass1 ;
                                // echo '<br>';
                                // echo  $dob ;
                                // echo '<br>';
                                // echo  $gender;
                                // echo '<br>';
                                // echo  $experience ;
                                // echo '<br>';
                                // echo   $trade ;
                                // echo '<br>';


                                // if($img){
                                //     $separetedimage = explode(".",$img);
                                //     $ext = $separetedimage[1];
                                //     $date = date("D:M:Y");
                                //     $time = date("h:i:s");
                                //     $image = md5($date.$time);//MD5 function for encryption
                                //     $image = $image.".".$ext;
                                    
                                // }
                                // else{
                                //     $image="NULL";
                                // }
                                
                                // if($image!=NULL){
                                //      move_uploaded_file($_FILES['image']['tmp_name'],"images2/$image");
                                // }
                                echo '<br>';
                                if($gender=='NULL'){
                                    echo '<span style= "color:red;">Please mention the gender!!!';
                                    echo '<br>';
                                }
                                else if($pass1!=$pass2){
                                    echo '<span style= "color:red;">password doesn\'t match!!!';
                                }
                                else if($dob==""){
                                    echo '<span style= "color:red;">Please enter date f birth!!!';
                                    echo '<br>';
                                }
                                else{
                                    $query="SELECT * FROM sellers WHERE email = '$mail' "; 
                                    $table = mysqli_query($con,$query);
                                    $row = mysqli_fetch_array($table);
                                    if($row['email']==$mail){
                                        
                                        // echo '<span style= "color:red;">duplicate user!!!';
                                        echo "<script>alert('Data inserted successfully!');</script>";                                                       
    
                                    }
                                    else{
                                        $query1 = "INSERT INTO `sellers` ( `name`, `email`, `trade_licence`, `experience`, `cv`, `address`, `dob`, `gender`, `mobile`, `pass`, `img`,status)
                                        VALUES('$name','$mail','$trade','$experience','$cv','$address','$dob','$gender','$contact','$pass1','null',2)";
                                        if(mysqli_query($con,$query1)){
                                                echo '<span style= "color:green;">Successfully inserted';
                                                echo '<br>';
                                                echo '<span style= "color:green;">your registration confirm by admin via email.Stay tuned';
                                                // echo "<script>window.location.href='seller/account.php'</script>" ;
                                                
                                        }
                                        else{
                                            echo '<span style= "color:red;">insertion failed';
                                        }
    
                                    }
                                    // echo "<script>window.location.href='registerdriver.php?name=".$name."&email=".$mail."&contact=".$contact."&pass=".$pass1."&dob=".$dob."&gender=".$gender."&address=".$address."&img=".$image."'</script>" ;
                                }
                               

                            }
                               
                      ?>
                  </form>
            </div>
        </div>
    </div>
  </div>
</div>
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