 <?php 
include 'include/adminauth.php';
include 'include/connection.php';
$id = $_REQUEST['id'];
$query = "update products set status=1 where p_id = $id ";
if(mysqli_query($con,$query)){
      header('Location: product_request.php');
}
else{
        echo "approve failed";
}

// echo $id;
// $query ="select * from request_products where rp_id = $id"; 
// $table=mysqli_query($con,$query);
// $row = mysqli_fetch_array($table);

// $name =   $row['name'];
// $brand = $row['b_id'];
// $sub_category = $row['sub_id'];
// $description = $row['description'];
// $quantity =  $row['quantity']; 
// $price = $row['price'];
// $size = $row['size'];

// $query1 ="select * from brand where b_id=$bid"; 
// $table1=mysqli_query($con,$query1);
// $row1 = mysqli_fetch_array($table1);
// $brand = $row1['name'];

// $query2 ="select * from sub_category where sub_id=$sid"; 
// $table2=mysqli_query($con,$query2);
// $row2 = mysqli_fetch_array($table2);
// $sub_category = $row2['name'];
// $cid = $row2['cat_id'];

// $query3 ="select * from category where cat_id=$cid"; 
// $table3=mysqli_query($con,$query3);
// $row3 = mysqli_fetch_array($table3);

// $category = $row3['name'];


// echo $name;
// echo '<br>';
// echo $brand;
// echo '<br>';
// // echo $category ;
// // echo '<br>';
// echo $sub_category ;
// echo '<br>';
// echo $description ;
// echo '<br>';
// echo $quantity ; 
// echo '<br>';
// echo $price;
// echo '<br>';
// echo $size ;
        // $query2 = "INSERT INTO products(name,b_id,sub_id,size,description,price,quantity,status)
        // VALUES('$name',$brand,$sub_category,'$size','$description',$price,$quantity,1)";
        // if(mysqli_query($con,$query2)){
        //         echo '<span style= "color:green;">Successfully inserted';
        // }
        // else{
        //     echo '<span style= "color:red;">insertion failed';
        // }


        
        // $directory = 'images';
        // $i=1;
        // $pid=0;
        // $query = "SELECT *  FROM Products where 1";
        // $table = mysqli_query($con,$query);
        // while( $row = mysqli_fetch_array($table)){
        //     $pid = $row['p_id'];
        // }
        // foreach($_FILES['files']['tmp_name'] as $key => $value){
        //     $tmpname = $_FILES['files']['tmp_name'][$key];
        //     $img = $_FILES['files']['name'][$key];
        //     $separetedimage = explode(".",$img);
        //     $ext = $separetedimage[1];
        //     $date = date("D:M:Y");
        //     $time = date("h:i:s");
        //     $image = md5($date.$time.$i);//MD5 function for encryption
        //     $image = $image.".".$ext;
        //     $i++;
        //     $query1 = "INSERT INTO images(p_id,image)
        //     VALUES('$pid','$image')";
        //     if(mysqli_query($con,$query1)){
        //             echo '<span style= "color:green;">Successfully inserted';
        //             if($image!=NULL){
        //                 move_uploaded_file($_FILES['files']['tmp_name'][$key],"../images/$image");
        //             }
        //     }
        //     else{
        //         echo '<span style= "color:red;">insertion failed';
        //     }
        //}
// $query = "delete from request_products where rp_id = $id ";
// mysqli_query($con,$query);
// header('Location: product_request.php');
?> 