<?php 
   include 'include/customerauth.php';
  // session_start();
   
   
    
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
                        <h2 class="text-center">My Shopping Cart</h2>
                        <br>
                        <table class="table table-striped" id = "cartproducts1">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Product Name</th>
                            <th>Brand</th>
                            <th>Size</th>
                            <th>Qunatiy</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            //include 'inlude/navbar.php';
                            include 'include/connection.php';
                            $tprice = 0;
                            if(isset($_SESSION['cart'])){
                            foreach($_SESSION['cart'] as $key=>$value){ 
                                $vprice = $value['price']*$value['quantity']; 
                                $tprice+=$vprice;              
                        ?>
                        <tr>
                        <td></td>
                                <td><?php echo $value['name']; ?></td>
                                <td><?php echo $value['brand'];?></td>
                                <td><?php echo $value['size'];?></td>
                                <td><?php echo $value['quantity'];?></td>
                                <td>$<?php echo $vprice;?></td>
                                
                                <td>                                
                                    <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModal<?php echo $value['id'];?>">Remove</a>
                                <div class="modal" id="myModal<?php echo $value['id'];?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Remove Confirmation!</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                       Do you want to remove <b><?php echo $value['name'];?></b> from your cart?
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <a class = "btn btn-primary" href ="remove_cart.php?id=<?php echo $value['id'];?>">yes</a>
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                                    </div>

                                    </div>
                                    </div>
                                    </div>
                                </td>
                                                       
                            </tr>
                            <?php } ?>
                            <tr>
                                <td colspan='4'></td>
                                <td><b> Total Price</b></td>
                                <td><b>$<?php echo $tprice ?></b></td>
                                
                            </tr>
                            <tr>
                                <td colspan='3'></td> 
                                <td colspan='2'><a  href="payment.php" class="btn btn-success but">Proceed to Success</a></td>
                                <td colspan='1'></td>
                                <td colspan='1'><button type="button" class="btn btn-warning"  data-bs-toggle="modal" data-bs-target="#allModal">Clear All</button>
                                <div class="modal" id="allModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Clear Cart Confirmation!</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                      <b> Do you want to clear your cart? </b>?
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <a class = "btn btn-primary" href ="remove_cart.php?id=-1">yes</a>
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                                    </div>

                                    </div>
                                    </div>
                                    </div>
                            
                                </td> 
                               
                            </tr>
                        </tbody>
                        <?php } ?>
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
                    'targets': [0,5], 
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