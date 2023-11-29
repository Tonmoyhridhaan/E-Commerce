<?php 
   include 'include/customerauth.php';
  // session_start();
  $cid = $_SESSION['id'];  
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Customer Access</title>
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
                padding-top:20%;
            }
            .add{
                padding-left:2.5%;
            }
            /* .but{
                height: 50px;
                width: 300px;
                text-align: center;
                /* padding-left : 100px; */
           /* } */
        </style>
</head>
<body>
<div class="b">
    <?php include 'include/navbar.php' ?>
</div>


<div class="account-page">   
<div class="container-fluid">
<div class="row">
<div class="col-md-2">
    <?php include 'include/sidebar.php' ?>
</div>
    <div class="col-sm-10">
        <div class="mt-1 card">  
            <div class="card bg-light text-dark">
                <div class="row">
                    <!-- <div class="col-md-2"></div> -->
                    <div class="col-md-12 mt-0 mb-5 ml-1">
                        <h2 class="text-center">My All Orders</h2>
                        <br>
                        <table class="table table-striped" id = "cartproducts1">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Order ID</th>
                            <th>Product Name</th>
                            <th>Brand</th>
                            <th>Size</th>
                            <th>Qunatiy</th>
                            <th>Cost</th>
                            <th>Order Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            //include 'inlude/navbar.php';
                            include 'include/connection.php';
                            $query = "select * from customer_order where c_id = $cid";
                            $table = mysqli_query($con,$query);
                            while($row = mysqli_fetch_array($table)){
                                $oid = $row['o_id'];

                                $query2 = "select * from order_line where o_id = $oid";
                                $table2 = mysqli_query($con,$query2);
                                while($row2 = mysqli_fetch_array($table2)){
                                    
                                    $pid = $row2['p_id'];

                                    $query3 = "select * from products where p_id = $pid";
                                    $table3 = mysqli_query($con,$query3);
                                    $row3 = mysqli_fetch_array($table3);

                                    $bid = $row3['b_id'];

                                    $query4 = "select * from brand where b_id = $bid";
                                    $table4 = mysqli_query($con,$query4);
                                    $row4   = mysqli_fetch_array($table4);

                                    $vprice = $row3['price']*$row2['quantity']; 
                                    
                                    ?>
                                    <tr>
                                        <td></td>
                                        <td><?php echo $oid; ?></td>
                                        <td><?php echo $row3['name']; ?></td>
                                        <td><?php echo $row4['name']; ?></td>
                                        <td><?php echo $row3['size'];?></td>
                                        <td><?php echo $row2['quantity'];?></td>
                                        <td><?php echo $vprice;?></td>
                                        <td><?php echo $row['order_date'];?></td>
                                    </tr>
                                    
                               <?php } ?>

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
            $("#cartproducts1").DataTable({
                'columnDefs': [ {
                    'targets': [0], 
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