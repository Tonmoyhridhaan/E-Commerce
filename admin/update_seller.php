<?php 
     include 'include/adminauth.php';
     // session_start();
    include 'include/connection.php';
    $id =  $_REQUEST['id'];
    $query = "select * from sellers where s_id = $id";
    $result = mysqli_query($con,$query);
    $row = mysqli_fetch_array($result);
    $name = $row['name'];
    $contact = $row['mobile'];
    $email = $row['email'];
    $address = $row['address'];
    $dob = $row['dob'];
    $gender = $row['gender'];      
    $pass = $row['pass']; 
    $trade = $row['trade_licence'];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Access</title>
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
    padding-top: 5%;
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
                        <h2 class="text-center"><?php echo " $name's " ?> Account</h2>
                        <br>
                        <form method="post" class="cmxform" action="" id="signUpForm">

                            <div class="mb-3 mt-3">
                                <label for="name"> Name:</label>
                                    <input type="text" name="name" class="form-control" id="name"  name="name"  value = '<?php echo $name?>'  minlength="2" >
                            </div>
                    
                            <div class="mb-3 mt-3">
                                <label for="email">Email:</label>
                               
                                    <input type="email" name="email" class="form-control email" id="email" value=<?php echo $email ?> >
                            </div>

                            <div class="mb-3 mt-3">
                                <label for="address">Address</label>
                               
                                    <input type="text" name="address" class="form-control" id="address" value = '<?php echo $address ?>'>
                                
                            </div>

                            <div class="mb-3 mt-3">
                                <label for="Address">Gender :</label>
                                <input class="form-control" id="gender" name="gender" type="text" value = <?php echo $gender ?>  />
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="contact">Contact</label>
                                <input type="text" name="contact" class="form-control" id="contact" value = <?php echo  $contact ?> >
                            </div>

                            <div class="mb-3 mt-3">
                                <label for="dob" class="col-sm-2 form-control-label">BirthDate:</label>
                                    <input type="date" name="dob" class="form-control"  id="dob"  value = <?php echo $dob ?>  >
                                
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="tradelicence">Trade_licence :</label>
                                <input type="text" name="tradelicence" class="form-control" id="tradelicence" value = <?php echo $trade ?>>
                            </div>

                            <div class = "row">
                                <div class = "col-sm-6 update" >
                                <input type="submit" name = "submit" class="btn btn-primary" id="submitForm" value="update" />
                                </div>
                                <div class = "col-sm-6">
                                <a class="btn btn-danger" href = "sellers.php">back</a> 
                            </div>

                            <?php                
                                if(isset($_POST['submit'])){
                                $name = $_POST['name'];
                                $mail = $_POST['email'];
                                $dob = $_POST['dob'];
                                $address = $_POST['address'];
                                $contact = $_POST['contact']; 
                                $gender = $_POST['gender'];
                                $trade = $_POST['tradelicence'];
                                $query1 = "update sellers set name = '$name',  email='$mail' ,address= '$address',dob= '$dob', gender='$gender',mobile='$contact' ,trade_licence= $trade where s_id = $id";
                                        if(mysqli_query($con,$query1)){
                                            $var = 'sellers.php';
                                            echo "<script>window.location.href='".$var."'</script>"; 
                                            echo '<span style= "color:green;">Successfully updated';
                                        }
                                        else{
                                            echo '<span style= "color:red;"> updated failed!!!';
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
<div class = "bot">
    <?php include 'include/footer.php' ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>