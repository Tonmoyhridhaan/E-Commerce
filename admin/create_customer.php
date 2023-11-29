<?php include 'include/adminauth.php' ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Access </title>
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
   .fot{
     padding-top:3%;
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
                    <h2 class="text-center">Create Customer's</h2>
                        <br>
                        <form method="post" class="cmxform"  action="create_customer.php" enctype="multipart/form-data" id="signUpForm" name = "theform">
                            
                                <div class="mb-3 mt-3">
                                    <label for="name">Name:</label>
                                    <input type="text" name="name" onkeyup="checkform()" class="form-control" id="name" placeholder="Write your name" name="name" minlength="2" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email">Email:</label>
                                    <input type="email" name="email" onkeyup="checkform()" class="form-control email" id="email" placeholder="write your email address" required>
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="contact">Contact:</label>
                                    <input type="text" name="contact" onkeyup="checkform()" class="form-control" id="contact" placeholder="018********" required>
                                </div>
                                <!-- <div class="mb-3">
                                    <label for="image">Image:</label>
                                    <input type="file" name="image" class="form-control" id="files" placeholder="">
                                </div> -->
                                <div class="mb-3 mt-3">
                                    <label for="address">Address:</label>
                                    <input type="text" name="address" onkeyup="checkform()" class="form-control" id="address" placeholder="write your address" required>
                                </div>
                                <div class="mb-3">
                                    <label for="gender">Gender:</label>
                                    <select name="gender" class="form-control" id="Gender" type="text" placeholder="Enter your gender" >
                                            <option value="NULL">Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female"> Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="dob">Date:</label>
                                    <input type="date" class="form-control" name="dob" id="dob" placeholder="Enter Birthdate">
                                </div>
                                <div class="mb-3">
                                    <label for="pass1">Password:</label>
                                    <input type="password" name="pass1" onkeyup="checkform()" class="form-control" id="pass1" placeholder="Enter password" required>
                                </div>
                                <div class="mb-3">
                                    <label for="pass2">Confirm Password:</label>
                                    <input type="password" class="form-control" name="pass2" onkeyup="checkform()" id="pass2" placeholder="Same password previously entered" required>
                                </div>
                                <br>
                                <div class = "row">
                                    <div class = "col-sm-6 update" >
                                    <button type="submit"  name ="submit" class="btn btn-success" >create</button>
                                    </div>
                                    <div class = "col-sm-6">
                                    <a class="btn btn-danger" href = "customers.php">back</a> 
                                </div>
                            <div>
                            </div>
                            <?php
                                include 'include/connection.php';
                                if(isset($_POST['submit'])){
                                    $name =   $_POST['name'];
                                    $mail = $_POST['email'];
                                    $address = $_POST['address'];
                                    $contact = $_POST['contact'];
                                    $pass1 = $_POST['pass1'];
                                    $pass2 =  $_POST['pass2']; 
                                    $dob = $_POST['dob'];
                                    $gender = $_POST['gender'];
                                    // $img = $_FILES['image']['name'];

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
                                    //     move_uploaded_file($_FILES['image']['tmp_name'],"images/$image");
                                    // }
                                    // echo '<br>';
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
                                            $query="SELECT * FROM customers WHERE email = '$mail'"; 
                                            $table = mysqli_query($con,$query);
                                            $row = mysqli_fetch_array($table);
                                            if($row['email']== $mail){  
                                                echo '<span style= "color:red;">already assigned a customers!!!';                                                       
                                            }
                                            else{
                                                //$query1 = "INSERT INTO customers(name,email,address,dob,gender, mobile,pass,img,status)
                                               // VALUES('$name','$mail','$address','$dob','$gender','$contact','$pass1','$image','1')";
                                               if(mysqli_query($con,"CALL insert_customers('$name','$mail','$address','$dob','$gender','$contact','$pass1','null','1')")){
                                                        echo '<span style= "color:green;">Successfully inserted';
                                                        echo "<script>window.location.href='customers.php'</script>" ;
                                                        // echo "<script>window.location.href='profile.php?email=".$mail."&pass=".$pass1."'</script>" ;
                                                        
                                                }
                                                else{
                                                    echo '<span style= "color:red;">insertion failed';
                                                }

                                            } 
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<div class="fot">
   <?php include 'include/footer.php' ?>
</div>

</body>
</html>