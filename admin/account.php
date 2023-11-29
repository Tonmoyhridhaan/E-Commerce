<?php include 'include/adminauth.php' ;
include 'include/connection.php';
$id=$_SESSION['id'];
// $name = $_SESSION['name'];
// $email = $_SESSION['email'];
$query= "select * from admin where a_id=$id";
$table = mysqli_query($con,$query);
$row = mysqli_fetch_array($table);
$mobile =$row["mobile"];
$address = $row["address"];
$name = $row["name"];
$email = $row["email"];
$gender=$row["gender"];?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Access</title>
  <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="include/style.css" rel="stylesheet" />
  <style>
  </style>
</head>
<body>
<div class="b">
               <?php include 'include/navbar.php' ?>
         </div>
<div class="account-page">
         
        <div class="container-fluid">
       
           <div class="row">
            <div class="col-sm-3">
               <?php include 'include/sidebar.php' ?>
            </div>
            <div class="col-sm-9">
                <h2>Account Control Panel</h2>
                <strong>Hello<?php echo "    ";
                            echo $name;?></strong><br />
                <p>From your account control panel, you can access all of your recent activites, orders, save products and you can edit your personal information and other details.</p>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="well">
                            <h3>Contact Information</h3>
                            <p>Name : <?php echo $name?></p>
                            <p>Email : <?php echo $email?></p>
                            <p><a href="account_change_email.php">Change Email</a> | <a href="account_change_password.php">Change Password</a></p>
                            <p class="pull-right"><a href="account_information.php"><i class="fa fa-edit"></i> Edit</a></p>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6">
                        <div class="well">
                            <h3>News Letters</h3>
                            <p>Do you want to get the latest product news and promotion offers then make it on otherwise off it.so,you can buy anything from this website.Do you want to get the latest.Do you want to get the latest product news and promotion.</p>
                            <p class="pull-right"><a href="account_newsletter.php"><i class="fa fa-edit"></i> Edit</a></p>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                 </div>
                  <div class = "row">
                    <div class="col-md-6 col-sm-6">
                        <div class="well">
                            <h3>Default Address</h3>
                            <address class="address">
                                <strong>Name:</strong>  <?php echo $name?> <br />
                                <strong>Email:</strong>  <?php echo $email?> <br />
                                <strong>Contact No:</strong>  <?php echo $mobile?><br />
                            </address>
                            <p class="pull-right"><a href="#"><i class="fa fa-edit"></i> Edit</a></p>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6">
                        <div class="well">
                        <h3>Default  Address</h3>
                            <address class="address">
                                <strong>Name:</strong>  <?php echo $name?> <br />
                                <strong>Email:</strong>  <?php echo $email?> <br />
                                <strong>Contact No:</strong>  <?php echo $mobile?><br />
                            </address>
                            <p class="pull-right"><a href="#"><i class="fa fa-edit"></i> Edit</a></p>
                            <div class="clearfix"></div>
                        </div>
                    </div>


                </div>
            </div>
        </div> <!--End Row-->

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<?php include 'include/footer.php' ?>
</body>
</html>