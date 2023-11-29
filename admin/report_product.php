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
                padding-top:8%;
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
                        <h2 class="text-center">All  Report Products List</h2>
                        <br>
                        <table class="table table-striped" id = "reportproducts">
                        <thead>
                        <tr>
                            <th></th>
                            <th>ID</th>
                            <th>Produsct Name</th>
                            <th>Report Category</th>
                            <th>Customer Name</th>
                            <th>Massage</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            //include 'inlude/navbar.php';
                            include 'include/connection.php';
                            $query = "select * from report_product";
                            $table = mysqli_query($con,$query);
                            while($row = mysqli_fetch_array($table)){                  
                        ?>
                        <tr>
                        <td></td>
                                <td><?php echo $row['rp_id'];?></td>
                                <?php 
                                    $pid =  $row['p_id'];
                                    $query1 = "select * from products where p_id=$pid";
                                    $table1 = mysqli_query($con,$query1);
                                    $row1 = mysqli_fetch_array($table1)
                                ?>
                                <td><?php echo $row1['name'];?></td>
                                <?php 
                                    $rid =  $row['report_id'];
                                    $query3 = "select * from report_category where report_id= $rid";
                                    $table3 = mysqli_query($con,$query3);
                                    $row3 = mysqli_fetch_array($table3);
                                ?>
                                <td><?php echo $row3['name'];?></td>

                                <?php 
                                    $cid =  $row['c_id'];
                                    $query3 = "select * from customers where c_id= $cid";
                                    $table3 = mysqli_query($con,$query3);
                                    $row3 = mysqli_fetch_array($table3);
                                ?>
                                <td><?php echo $row3['name'];?></td>

                                <td><?php echo $row['massage'];?></td>

                                <td>                                
                                    <a class = "btn btn-primary" href ="report_product_single.php?id=<?php  echo $row['p_id']?>">Take Action</a>
                                    <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModal<?php echo $row['p_id'];?>">Remove</a>
                                <div class="modal" id="myModal<?php echo $row['p_id'];?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Remove Confermation!</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                       Do you want to Remove <b><?php echo $row1['name'];?></b>?
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <a class = "btn btn-primary" href ="block_producta.php?id=<?php  echo $row['p_id']?>">yes</a>
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                                    </div>

                                    </div>
                                    </div>
                                    </div>
                                </td>
                                <?php } ?>                       
                            </tr>
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
            $("#reportproducts").DataTable({
                'columnDefs': [ {
                    'targets': [0,6], 
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