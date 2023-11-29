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
<div class="container mt-3">
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
                        <h2 class="text-center">Add Product</h2>
                        <br>
                        <form method="post" class="cmxform" action="add_products.php" enctype="multipart/form-data" id="signUpForm">

                        <div class="mb-3 mt-3">
                            <label for="name">Product Name : </label>
                            
                                <input class="form-control" id="name" name="name" type="text" placeholder=" enter the name of product" required/>
                         
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="choose brand">choose brand</label>
                            
                            <select name = "brand" id ="brand" class="form-control" required>
                                <option value="">--choose brand--</option>
                                <?php 
                                include 'include/connection.php';
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
                            
                            <select name = "category" id ="category1" class="form-control" required>
                                <option value="">--choose category--</option>
                                <?php 
                                $query = "select * FROM category";
                                $result = mysqli_query($con,$query);
                                
                                while($row = mysqli_fetch_array($result)){
                                ?>
                                    <option value="<?php echo $row['cat_id'];?>"><?php echo $row['name'];?></option>
                                    
                                    <?php } ?>
                            </select>
                       
                        </div>

                        <div class="mb-3 mt-3">
                            <label for="Choose sub_category">Choose sub_category : </label>
                            
                            <select name = "sub_category" id ="sub_category1" class="form-control" required> 
                            </select>
                         
                        </div>


                        <div class="mb-3 mt-3">
                            <label for="size">Size : </label>
                            
                            <input name = "size" id ="size" class="form-control" required> 
                     
                           
                        </div>

                        <div class="mb-3 mt-3">
                            <label for="Description">Description : </label>
                            
                                <textarea name="description" id="" cols="20" rows="7" class="form-control" required></textarea>
                           
                        </div>

                        <div class="mb-3 mt-3">
                            <label for="Quantity">Quantity :</label>
                            
                                <input class="form-control" id="quantity" name="quantity" type="number" placeholder="write the number of amount" required/>
                        
                        </div>



                        <div class="mb-3 mt-3">
                            <label for="Price">Price :</label>
                            
                                <input class="form-control" id="price" name="price" type="number" placeholder="write the price of products" required />
                           
                        </div>

                        <div class="mb-3 mt-3">
                            <label for="image">Image :</label>
                            
                                <input class="form-control" type="file" id="image" name="files[]" multiple  required />
                          
                        </div>

                 
                        <div class = "row">
                                <div class = "col-sm-6 update" >
                                <input type="submit" name = "submit" class="btn btn-success" id="submitForm" value="add" />
                                </div>
                                <div class = "col-sm-6">
                                <a class="btn btn-danger" href = "allproducts.php">back</a> 
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


                                $query2 = "INSERT INTO products(name,b_id,sub_id,size,description,price,quantity,status)
                                VALUES('$name','$brand','$sub_category','$size','$description','$price','$quantity',1)";
                                if(mysqli_query($con,$query2)){
                                        echo '<span style= "color:green;">Successfully inserted';
                                }
                                else{
                                    echo '<span style= "color:red;">insertion failed';
                                }


                                
                                $directory = 'images';
                                $i=1;
                                $pid=0;
                                $query = "SELECT *  FROM Products where 1";
                                $table = mysqli_query($con,$query);
                                while( $row = mysqli_fetch_array($table)){
                                    $pid = $row['p_id'];
                                }
                                foreach($_FILES['files']['tmp_name'] as $key => $value){
                                    $tmpname = $_FILES['files']['tmp_name'][$key];
                                    $img = $_FILES['files']['name'][$key];
                                    $separetedimage = explode(".",$img);
                                    $ext = $separetedimage[1];
                                    $date = date("D:M:Y");
                                    $time = date("h:i:s");
                                    $image = md5($date.$time.$i);//MD5 function for encryption
                                    $image = $image.".".$ext;
                                    $i++;
                                    $query1 = "INSERT INTO images(p_id,image)
                                    VALUES('$pid','$image')";
                                    if(mysqli_query($con,$query1)){
                                            echo '<span style= "color:green;">Successfully inserted';
                                            if($image!=NULL){
                                                move_uploaded_file($_FILES['files']['tmp_name'][$key],"../images/$image");
                                            }
                                    }
                                    else{
                                        echo '<span style= "color:red;">insertion failed';
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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