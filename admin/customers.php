<?php include 'include/adminauth.php';
      include 'include/connection.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin Access</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
        <link href="include/style.css" rel="stylesheet" /> 
        <style>
            .pad{
            padding-right :5%;
            } 
            .bot{
                padding-top:0%;
            }
            .add{
                padding-left:2.5%;
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
        <div class="mt-1 card">  
            <div class="card bg-light text-dark">
                <div class="row">
                    <!-- <div class="col-md-2"></div> -->
                    <div class="col-md-12 mt-0 mb-5 ml-1">
                        <h2 class="text-center">All Customers</h2>
                        <br>
                        <div class="row">
                            <div class="col-sm-3 add">
                                <a class="btn btn-primary" href="create_customer.php" >create</a>
                            </div>
                            <br>
                            <br>
                        </div>
                        <table class="table table-striped" id = "table">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Date of Birth</th>
                            <th>Gender</th>
                            <th>Contact</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            //$query = "select * from customers where status =1";
                           // $table = mysqli_query($con,$query);
                            $table = mysqli_query($con,"CALL read_data_customers()");
                            while($row = mysqli_fetch_array($table)){                   
                        ?>
                        <tr>
                        <td></td>
                                <td><?php echo $row['c_id'];?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['email'];?></td>
                                <td><?php echo $row['address'];?></td>
                                <td><?php echo $row['dob'];?></td>
                                <td><?php echo $row['gender'];?></td>
                                <td><?php echo $row['mobile'];?></td>
                                <td>
                                <!-- <a class="btn btn-primary" href="edit.php?<?php echo $row['c_id'];?>">Edit</a> -->
                                <a class = "btn btn-primary" href ="update_customer.php?id=<?php  echo $row['c_id']?>">Edit</a>
                                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModal<?php echo $row['c_id'];?>">Block</a>
                                <div class="modal" id="myModal<?php echo $row['c_id'];?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Block Confermation!</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                       Do you want to Block <b><?php echo $row['name'];?></b>?
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <a class = "btn btn-primary" href ="block_customer.php?id=<?php  echo $row['c_id']?>">yes</a>
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                                    </div>

                                    </div>
                                    </div>
                                    </div>
                                    </td>                            
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    </div>
                </div> 
            </div>
        </div> 

    </div>
</div> 

</div>
</div>
<script src = "https://code.jquery.com/jquery-3.5.1.js"></script>
<script src = "https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
        $(document).ready(function(){
            $("#table").DataTable({
                'columnDefs': [ {
                    'targets': [0,8], 
                    'orderable': false, 
                }]
            });
        })
</script>
<div class="bot">
   <?php include 'include/footer.php' ?>
</div>
</body>
</html>