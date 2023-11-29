<?php 
   include 'include/customerauth.php';
   include 'include/connection.php';
   $sql = "select * from invoice ORDER BY invc_id DESC";
   $result = mysqli_query($con,$sql);
   $row  = mysqli_fetch_array( $result);
   if($row){
    $id = $row['invc_id'];
   }
   else{
     $id = 0;
   }
   $cid = $_SESSION['id'];
   
   //echo $cid;
   $sql1 = "select * from customers where c_id = $cid";
   $result1 = mysqli_query($con,$sql1);
   $row1  = mysqli_fetch_array( $result1);
   $name = $row1['name'];
   $email = $row1['email'];
   $contact = $row1['mobile'];
   $date=date("Y-m-d");
 
  // echo $id;
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>#Invoice<?php echo $id;?><br>
            <div class="row">
                <div class="col-md-6">
                        <pre class="details">     Name  : <?php echo $name;?></pre>
                        <pre class="details">     Email : <?php echo $email;?></pre> 
                        <pre class="details">     Date  : <?php echo $date;?></pre>
                        <pre class="details">     Contact  : <?php echo $contact;?></pre>  
                </div>
            </div>

         </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
        <link href="include/style.css" rel="stylesheet" /> 
        <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet" /> 
        <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" /> 
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
            .details{
                font-family: Arial Black;
                font-weight:250;
                font-size:1rem;
            }
            .detail{
                font-family: Arial Black;
                font-weight:300;
                font-size:1.2rem;
            }
            .invc{
                padding-left:10%;
            }
            .bame{
                padding-left:18%;
            }
            .pay{
                color:green;
                font-size:3rem;
            }
        </style>
</head>
<body>
<div class="b">
    <?php include 'include/navbar.php' ?>
</div>


<div class="account-page">   
<div class="container">
<div class="row">
    <div class="bame">
    <div class="col-sm-11">
          <div class="pay text-center">
                <strong>Thanks For Your Payment</strong>
            </div>
            <br>
        <div class="mt-1 card">  
            <div class="card bg-light text-dark ml-3">

           
                <div class="row">
                    <!-- <div class="col-md-2"></div> -->
                    <div class="col-md-12 mt-0 mb-5 ml-1">
                        <h2 class="text-center">ClickAndCollect</h2>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                 <pre class="detail">     Invoice For</pre>
                                 <pre class="details">     Name  : <?php echo $name;?></pre>
                                 <pre class="details">     Email : <?php echo $email;?></pre>   
                            </div>
                            <div class="col-md-6 invc">
                                <pre class="details">   #Invoice<?php echo $id;?></pre>
                                <pre class="details">   Date  : <?php echo $date;?></pre>
                                <pre class="details">   Contact  : <?php echo $contact;?></pre>
                            </div>
                        </div>
                        <br>
                        <br>
                        <table class="table table-striped" id = "cartproduct">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Product Name</th>
                            <th>Brand</th>
                            <th>Size</th>
                            <th>Qunatity</th>
                            <th>Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            //include 'inlude/navbar.php';
                            $tprice = 0;


                            $query = "select * from customer_order where c_id = 1";
                            $table = mysqli_query($con,$query);
                            while($row = mysqli_fetch_array($table)){
                                $oid = $row['o_id'];
                            }
                                

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
                                    $tprice+=$vprice;              
                        ?>
                        <tr>
                        <td></td>
                                <td><?php echo $row3['name']; ?></td>
                                <td><?php echo $row4['name'];?></td>
                                <td><?php echo $row3['size'];?></td>
                                <td><?php echo $row2['quantity'];?></td>
                                <td>$<?php echo $vprice;?></td>
                                                 
                            </tr>
                            <?php } ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><b> Total Price</b></td>
                                <td><b>$<?php echo $tprice;?></b></td>
                                
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><b> Paid Amount</b></td>
                                <td><b>$0</b></td>
                                
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><b> Due</b></td>
                                <td><b>$<?php echo $tprice;?></b></td>
                                
                            </tr>
                        </tbody>
                    </table>
                    <div class="class text center">
                        <a href=""></a>
                    </div>
                    </div>
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
<script src = "https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src = "https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src = "https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src = "https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src = "https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src = "https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script>
        $(document).ready(function(){
            $("#cartproduct").DataTable({
                searching: false, paging: false, info: false,
                dom: 'Bfrtip',
        buttons: [
            'print','pdf'
        ],bSort : false
            });
        })
</script>
<div class="bot">
   <?php include 'include/footer.php' ?>
</div>
</body>
</html>