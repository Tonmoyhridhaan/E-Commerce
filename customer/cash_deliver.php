<?php 
         session_start();
         include 'include/connection.php';
        $idcus = $_SESSION['id'];
        $date=date("Y-m-d");
        $address = $_SESSION['cart']['address'];                                                                                                                                                                              
        $sql = "insert into customer_order(c_id,Delivery_address,order_date) values($idcus,'$address','$date')";
        $result = mysqli_query($con,$sql);
        if($result){
            //echo "data succefully inserted into customer_order table";
        }
        else{
            echo "error".mysqli_error($con);
        }

        $last_o_id = mysqli_insert_id($con);
        if(isset($_SESSION['cart'])){
            $aa = $_SESSION['cart']['id'][0];
            echo $aa;
            foreach($_SESSION['cart'] as $key=>$value){ 
                $pid=$value['id']; 
                $sql2 = "select * from products where p_id = $pid";
                $result2 = mysqli_query($con,$sql2);
                $row2 = mysqli_fetch_array($result2);
                $stored = $row2['quantity'];
                $quantity=$value['quantity'];
                if($stored>$quantity) { 
                    $stored = $stored-$quantity;
                    $sql10 = "update products set quantity = $stored where p_id = $pid";
                    $result10 = mysqli_query($con,$sql10);
                    $sql1 = "insert into order_line(o_id,p_id,quantity) values($last_o_id,$pid,$quantity)";
                    $result1 = mysqli_query($con,$sql1);
                    if($result1){
                        //$fg = 1;
                    }
                    else{
                        //echo "error".mysqli_error($con);
                    }
                }  
                         
            }
        } 


        $sql2 = "insert into cash_on_delivary(o_id,status) values( $last_o_id,'0')";
        $result2 = mysqli_query($con,$sql2);
        if($result2){
            //echo "data succefully inserted into customer_order table";
        }
        else{
            echo "error".mysqli_error($con);
        }



        $sql3 = "insert into invoice(o_id) values($last_o_id)";
        $result3 = mysqli_query($con, $sql3);
        if(!$result3){
            echo "error".mysqli_error($con);
        }
        else{
            if(isset($_SESSION['cart'])){
                unset($_SESSION['cart']);

                echo "<script>window.location.href='invoice2.php'</script>" ;
            }
        
        }

?>