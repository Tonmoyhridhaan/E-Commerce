<?php include 'include/adminauth.php' ?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Access</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="include/style.css" rel="stylesheet" />
  <link href="include/style2.css" rel="stylesheet" />
  <style>
    .pro{
        padding-left:15%;
    }

    .bot{
     padding-top:22%;
   }
  </style>
    
</head>
<body>
<div class="b">
    <?php include 'include/navbar.php' ?>
</div>
<div class="content-area">

    <div class="account-page">
        <div class="container-fluid">

          <div class="row">
            <div class="col-sm-3">
                <?php include 'include/sidebar.php' ?>
            </div>
            <div class="col-sm-9">
                <h2>Account Newsletter</h2>
                <div class="row">

                    <div class="col-md-6 col-sm-6">
                        <div class="well">
                            <h3>News Letters</h3>
                            <p>Do you want to get the latest product news and promotion offers then make it on otherwise off it.</p>
                            <p class="pull-right"><a href="#"><i class="fa fa-edit"></i> Edit</a></p>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div> <!--End Row-->

    </div>
</div> <!--End Account page div-->

</div> <!-- End content Area class -->

<div class="bot">
   <?php include 'include/footer.php'?>
</div>

</body>
</html>