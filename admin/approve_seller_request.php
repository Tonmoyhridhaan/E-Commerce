<!-- <?php 
include 'include/adminauth.php';
include 'include/connection.php';
$id = $_REQUEST['id'];
$query = "update sellers set status=1 where s_id =$id ";
mysqli_query($con,$query);
header('Location: seller_request.php');

// $query1 = "select * from request_sellers where rs_id = '$id' ";
// $table1 = mysqli_query($con,$query1);
// $row1 = mysqli_fetch_array($table1);
// $name =   $row1['name'];
//  $mail = $row1['email'];
//  $address = $row1['address'];
//  $contact = $row1['mobile'];
//  $pass1 = $row1['pass'];
//  $dob = $row1['dob'];
//  $gender = $row1['gender'];
//  $img = $row1['img'];
//  $trade = $row1['trade_licence'];
//  $experience = $row1['experience'];
//  $cv = $row1['cv'];
//  echo  $name;
// echo '<br>';
// echo   $mail;
// echo '<br>';
// echo  $address;
// echo '<br>';
// echo  $contact;
// echo '<br>';
// echo  $pass1 ;
// echo '<br>';
// echo  $dob ;
// echo '<br>';
// echo  $gender;
// echo '<br>';
// echo  $experience ;
// echo '<br>';
// echo   $trade ;
// echo '<br>';
//  $query2 = "INSERT INTO `sellers` (`name`, `email`, `trade_licence`, `experience`, `cv`, `address`, `dob`, `gender`, `mobile`, `pass`)
// VALUES('$name','$mail','$trade','$experience','$cv','$address','$dob','$gender','$contact','$pass1')";
// if(mysqli_query($con,$query2)){
//     echo '<span style= "color:green;">Successfully inserted';
//     // echo '<span style= "color:blue;">your registration confirm by admin via email.Stay tuned';
//     // echo "<script>window.location.href='seller/account.php'</script>" ;

// }
// else{
//     echo '<span style= "color:red;">insertion failed';
// }
// $query = "delete from request_sellers where rs_id = $id ";
// mysqli_query($con,$query);
// header('Location: seller_request.php');
?> -->