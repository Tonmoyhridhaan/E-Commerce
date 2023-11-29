<?php include 'include/sellerauth.php';
include 'include/connection.php';
if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
}
else if(isset($_REQUEST['mid'])){
    $id=  $_REQUEST['mid'];
}
$sellerid = $_SESSION['id'];
$query ="select * from products where p_id=$id"; 
$table=mysqli_query($con,$query);
$row = mysqli_fetch_array($table);
$name =   $row['name'];
$bid = $row['b_id'];
$sid = $row['sub_id'];

$query1 ="select * from brand where b_id=$bid"; 
$table1=mysqli_query($con,$query1);
$row1 = mysqli_fetch_array($table1);
$brand = $row1['name'];

$query2 ="select * from sub_category where sub_id=$sid"; 
$table2=mysqli_query($con,$query2);
$row2 = mysqli_fetch_array($table2);
$sub_category = $row2['name'];
$cid = $row2['cat_id'];

$query3 ="select * from category where cat_id=$cid"; 
$table3=mysqli_query($con,$query3);
$row3 = mysqli_fetch_array($table3);

$category = $row3['name'];

$description = $row['description'];
$quantity =  $row['quantity']; 
$price = $row['price'];
$size = $row['size'];



// echo $name;
// echo '<br>';
// echo $brand;
// echo '<br>';
// echo $category ;
// echo '<br>';
// echo $sub_category ;
// echo '<br>';
// echo $description ;
// echo '<br>';
// echo $quantity ; 
// echo '<br>';
// echo $price;
// echo '<br>';
// echo $size ;
 ?>

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
                        <h2 class="text-center">Update Product</h2>
                        <br>
                        <form method="post" class="cmxform"  id="signUpForm">

                        <div class="mb-3 mt-3">
                            <label for="name">Product Name : </label>
                            
                                <input class="form-control" id="name" name="name" type="text" placeholder=" enter the name of product" value = '<?php echo $name?>'/>
                         
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="choose brand">choose brand</label>
                            
                            <select name = "brand" id ="brand1" class="form-control" >
                                <option value="<?php echo $bid?>"><?php echo $brand?></option>
                                <?php 
                                
                                $query = "select * FROM brand";
                                $result = mysqli_query($con,$query);
                                
                                while($row = mysqli_fetch_array($result)){
                                ?>
                                    <option value="<?php echo $row['b_id'];?>"><?php echo $row['name'];?></option>
                                
                                <?php } ?>
                            </select>
                           
                        </div>

                        <div class="mb-3 mt-3">
                            <label for="Choose category">Choose category: </label>
                            
                            <select name = "category" id ="category1" class="form-control" >
                                <?php 
                                $query = "select * FROM category";
                                $result = mysqli_query($con,$query);
                                
                                while($row = mysqli_fetch_array($result)){
                                ?>
                                    <option value="<?php echo $row['cat_id'];?>"<?php if($row['cat_id']==$cid){ echo "selected";}?>><?php echo $row['name'];?></option>
                                    
                                    <?php } ?>
                            </select>
                       
                        </div>

                        <div class="mb-3 mt-3">
                            <label for="Choose sub_category">Choose sub_category : </label>
                            
                            <select name = "sub_category" id ="sub_category1" class="form-control"> 
                            </select>
                        </div>


                        <div class="mb-3 mt-3">
                            <label for="size">Size : </label>
                            
                            <input name = "size" id ="size" class="form-control" value = '<?php echo $size?>'> 
                     
                           
                        </div>

                        <div class="mb-3 mt-3">
                            <label for="Description">Description : </label>
                            
                                <textarea name="description" id="" cols="20" rows="7" class="form-control"><?php echo $description?></textarea>
                           
                        </div>

                        <div class="mb-3 mt-3">
                            <label for="Quantity">Quantity :</label>
                            
                                <input class="form-control" id="quantity" name="quantity" type="number" placeholder="write the number of amount" value = '<?php echo $quantity?>'/>
                        </div>



                        <div class="mb-3 mt-3">
                            <label for="Price">Price :</label>
                            
                                <input class="form-control" id="price" name="price" type="number" placeholder="write the price of products" value = '<?php echo $price;?>' />
                           
                        </div>
                 
                        <div class = "row">
                                <div class = "col-sm-6 update" >
                                <input type="submit" name = "submit" class="btn btn-primary" id="submitForm" value="update" />
                                </div>
                                <div class = "col-sm-6">
                                <?php 
                                   if(isset($_REQUEST['id'])){?>
                                     <a class="btn btn-danger" href = "allproducts.php">back</a> 
                                  <?php }
                                  else if (isset($_REQUEST['mid'])){?>
                                     <a class="btn btn-danger" href = "warningmsg.php">back</a> 
                                 <?php }
                                ?>
                                
                        </div>
                 

                        <?php
                            if(isset($_POST['submit'])){
                                $name =   $_POST['name'];
                                $brand = $_POST['brand'];
                                $category = $_POST['category'];
                                $sub_category = $_POST['sub_category'];
                                $description = $_POST['description'];
                                $quantity =  $_POST['quantity']; 
                                $price = $_POST['price'];
                                $size = $_POST['size'];

                                // echo "name = ".$name;
                                // echo '<br>';
                                // echo "brand = ".$brand;
                                // echo '<br>';
                                // echo "sub_cat = ".$sub_category ;
                                // echo '<br>';
                                // echo "description = ".$description ;
                                // echo '<br>';
                                // echo "quantity = ".$quantity ; 
                                // echo '<br>';
                                // echo "price = ".$price;
                                // echo '<br>';
                                // echo "size = ".$size ;

                                 $query5 = "UPDATE  products set name='$name',b_id = $brand,sub_id = $sub_category ,size = '$size' ,description = '$description',price= $price,quantity = $quantity where p_id = $id and s_id=$sellerid";
                                if(mysqli_query($con,$query5)){
                                     echo  "<script>alert('Data updated successfully!');</script>";
                                }
                                else{
                                    echo  "<script>alert('update failed!');</script>";
                                }

                                // $query2 = "UPDATE  products set name='$name',b_id = $brand,sub_id = $sub_category ,size = '$size' ,description = '$description',price= $price,quantity = $quantity where p_id = $id)";
                                // if(mysqli_query($con,$query2)){
                                //      echo  "<script>alert('Data updated successfully!');</script>";
                                // }
                                // else{
                                //     echo  "<script>alert('update failed!');</script>";
                                // }
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<?php 
    $sub = "<script> var sub_cat = []; var sub_cat_name = [];"; 
    $sub = $sub."var sid=".$sid.";";
    //$sub = $sub."alert(sid);";
    // include 'connection.php';
    $query4 ="select * from sub_category where cat_id=$cid"; 
    $table4 = mysqli_query($con,$query4);
    while($row4 = mysqli_fetch_array($table4)){ 
        $sub = $sub."sub_cat.push('".$row4['sub_id']."');";
        $sub = $sub."sub_cat_name.push('".$row4['name']."');";
    }  
     $sub = $sub."console.log(sub_cat);";
    $sub = $sub."</script>";
    echo $sub;
  
?>
<script>   
    
    $("#sub_category1").html("<option value=''>--choose sub category--</option>");  
    for(var i=0;i<sub_cat.length;i++){
        var x = "<option value="+sub_cat[i];
        if(sid==sub_cat[i]) {x+=" selected ";}
        x+=">"+sub_cat_name[i]+"</option>";
        $("#sub_category1").append(x);
    }

</script>

<script>
    $(document).ready(function (){
        $("#category1").change(function(){
            var cat =  $("#category1").val();
            $.ajax({
                url:"find_subcategory1.php",
                dataType:"json",
                data : {
                    "cat_id" : cat
                },
                success: function(res){
                    $("#sub_category1").html("<option value=''>--choose sub_category--</option>");   
                    for(var i=0;i<res.length;i++){
                        var x = "<option value="+res[i].sub_id+">"+res[i].name+"</option>";
                        $("#sub_category1").append(x);
                    }
                }
            });
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<div class="fot">
   <?php include 'include/footer.php' ?>
</div>

</body>
</html>