<?php 
    include 'include/adminauth.php';
    include 'include/connection.php';
    $id = $_REQUEST['id'];
    $query1 = "select * from products where p_id = $id ";
    $table1=mysqli_query($con,$query1);
    $row1 = mysqli_fetch_array($table1);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Access</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="include/style.css" rel="stylesheet" />
  <link href="include/style2.css" rel="stylesheet" />
  <link href="include/style3.css" rel="stylesheet" />

  <style>
    
    .but{
        height: 64px;
        text-align: center;
        width : 100%;
        
    }
    .but1{
        padding-left:10%;
    }
    .p{
        font-family: Arial Black;
        font-weight:300;
        font-size:1.2rem;
    }
    .item_name{
        font-weight: 1000;
        font-size:1.4rem;
    }
    b{
        font-size:1.07rem;
    }
    .im{
        padding-left:8%;
        margin-top:4%;
    }
    .share{
        padding-top:5%;
    }
    .pname{
    font-family:Arial Black;
    font-size:100%;
    }

    *{
    margin: 0;
    padding: 0;
}
.rate {
    float: left;
    height: 46px;
    padding: 0 0px;
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}

  </style>    
</head>
<body>
<div class="b">
     <?php include 'include/navbar.php' ?>
</div>
<div class="content-area prodcuts">
    <div class="container">
        <ol class="breadcrumb breadcrumb1">
            <li><a href="account.php"><pre class="pname"> Home ||</pre></a></li>
            <li><a href="products.php"> <pre class="pname">  Products ||</pre> </a></li>
            <li class="active"><pre class="pname">  <?php echo $row1['name'];?></pre> </li>
        </ol>
        <div class="single-product">
            <div class="row" id="">
                <div class="col-md-6 single-top-left">  
                    <div class="flexslider">
                        <ul class="slides">
                            <div class="row">
                              
                                <div class="col-md-9">
                                        <img src=""  height ="350" width = "400" alt="">
                                </div>
                                
                            </div>
                            <div class="row im">
                                <div class="col-md-4">
                                   <button class="btn btn-primary" onclick="previousimage()">previous image</button>
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-primary" onclick = "nextimage()">next image</button>
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 single-top-right">
                    <h3 class="item_name"><?php echo $row1['name'];?></h3>
                    <p class="p">Processing Time: Item will be shipped out within 2-3 working days.</p>
                    <div class="single-rating">
                        <ul>
                            
                            <li><b>Price : <?php echo $row1['price'];?></b></li> 
                            <li><b>Sid : <?php echo $row1['s_id'];?></b></li>        
                            <li><b><span class="off">10% OFF</span></b></li> 
                            <li><b>Ends on: June,5th</b></li>
                            <li><b><a href="#"> Coupon</a></b></li>
                            <li class="rating"><b> 20 reviews</b></li>
                            <!-- <li><b><a href="add_review.php?id=<?php echo $id;?>">Add your review</a></b></li> -->
                            <li>
                            <div class="rate">
                                    <input type="radio" id="star5" name="rate" value="5" />
                                    <label for="star5" title="text">5 stars</label>
                                    <input type="radio" id="star4" name="rate" value="4" />
                                    <label for="star4" title="text">4 stars</label>
                                    <input type="radio" id="star3" name="rate" value="3" />
                                    <label for="star3" title="text">3 stars</label>
                                    <input type="radio" id="star2" name="rate" value="2" />
                                    <label for="star2" title="text">2 stars</label>
                                    <input type="radio" id="star1" name="rate" value="1" />
                                    <label for="star1" title="text">1 star</label>
                            </div>
                            </li>
                        </ul> 
                    </div>
                    <div class="single-price">
                        <ul>
                            
                        </ul>   
                    </div> 
                    <br>
                    <div class="">
                        <p class="p"><?php echo $row1['description'];?> </p>
                    </div>
                    <form action="#" method="post">
                        <input type="hidden" name="cmd" value="_cart" />
                        <input type="hidden" name="add" value="1" /> 
                        <input type="hidden" name="w3ls_item" value="Snow Blower" /> 
                        <input type="hidden" name="amount" value="540.00" /> 
                        <div class="row">
                            <div class="col-md-4 but1">
                                <a style= "text-decoration: none; color:white;" href="block_products.php" class="btn btn-danger  but">delete this product</a>
                            </div>
                            <div class="col-md-4 but1">
                                <a  style= "text-decoration: none; color:white;" href="massagetoseller.php?id=<?php  echo $row1['s_id'];?>&pid=<?php  echo $row1['p_id'];?>" class="btn btn-primary but">massage to the seller</a>
                            </div>
                           
                        </div>
                    </form>
                    
                </div>
                <div class="clearfix"> </div>  
            </div>
            <div class="share">
                <div class="single-page-icons social-icons ic"> 
                            <h4 class="row"> 
                                <div class= "col-sm-2">
                                    Share on
                                </div> 
                                <div class= "col-sm-10">
                                    <a href="#" class="fa fa-facebook-square icon facebook"> </a>
                                    <a href="#" class="fa fa-twitter-square icon twitter"> </a>
                                    <a href="#" class="fa fa-google-plus-square icon googleplus"> </a>
                                    <a href="#" class="fa fa-rss-square icon rss"> </a> 
                                </div>
                            </h4>    
                </div>

            </div>
            <div class="single-product-everything des">

                <div class="single-extra-div">
                    <a data-toggle="collapse" class="pointer main" aria-expanded="true" data-target="#productDescriptionCollapse" aria-controls="#productDescriptionCollapse">
                        <span class="pull-left title-sidebar des1"><i class="fa fa-info-circle"></i> Product Description</span>

                        <span class="pull-right"><i class="fa fa-plus"></i></span>
                        <span class="pull-right"><i class="fa fa-minus"></i></span>
                        <div class="clearfix"></div>
                    </a>
                    <div id="productDescriptionCollapse" class="collapse in collapseDiv">
                        <p><?php echo $row1['description'];?></p>
                    </div>
                </div> 

                <div class="single-extra-div">
                    <a data-toggle="collapse" class="pointer main" aria-expanded="true" data-target="#productReviewCollapse" aria-controls="#productReviewCollapse">
                        <span class="pull-left title-sidebar des1"> <i class="fa fa-check-square-o"></i>
                            Product Reviews <span class="badge">2</span>
                        </span>

                        <span class="pull-right"><i class="fa fa-plus"></i></span>
                        <span class="pull-right"><i class="fa fa-minus"></i></span>
                        <div class="clearfix"></div>
                    </a>
                    <div id="productReviewCollapse" class="collapse collapseDiv">
                        <div class="review">
                             <?php $sql = "select * from review where p_id = $id";

                                   $table = mysqli_query($con,$sql);
                                   while($row=mysqli_fetch_array($table)){
                                     $cid = $row['c_id'];
                                     $sql2 = "select * from customers where c_id = $cid";
                                     $table2 = mysqli_query($con,$sql2);
                                     $row2=mysqli_fetch_array($table2);
                                     ?>
                                            <h4><?php echo $row2['name'];?></h4>
                                            <p> <?php echo $row['review'];?></p>
                               <?php  } ?>
                        </div>
                    </div>
                </div>

                <div class="single-extra-div">
                    <a data-toggle="collapse" class="pointer main" aria-expanded="true" data-target="#productHelpCollapse" aria-controls="#productHelpCollapse">
                        <span class="pull-left title-sidebar des1"> <i class="fa fa-question-circle"></i> Help </span>

                        <span class="pull-right"><i class="fa fa-plus"></i></span>
                        <span class="pull-right"><i class="fa fa-minus"></i></span>
                        <div class="clearfix"></div>
                    </a>
                    <div id="productHelpCollapse" class="collapse collapseDiv">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                </div> 
                 <br>
                 <br>
                <!-- <div class="row">
                    <div class="col-sm-6">
                        <a href="product_report.php?id=<?php echo $id;?>">Report This Product</a>
                    </div>

                </div> -->
            </div> 
        </div>
    </div>
    </div>
    </div>
</div>
</div>
</div> 
<div class="bot">
    <?php include 'include/footer.php' ?>
</div>
<?php 
      $js = "<script> var photo = [];"; 
      // include 'connection.php';
      $query2 = "select * from images where p_id = $id";
      $table2=mysqli_query($con,$query2);
      while($row2 = mysqli_fetch_array($table2)){ 
          $js = $js."photo.push('".$row2['image']."');";
      }
      
      $js = $js. "console.log(photo); </script>";
      echo $js;
 ?>
<script>
    var imgtag = document.querySelector("img");
    var img = 0;
    imgtag.src='../images/'+photo[img];
    var l = photo.length;
    function previousimage(){
        img--;
        if(img==-1){
            img = l-1;
        }
        imgtag.src='../images/'+photo[img];
    }
    function nextimage(){
        img = img+1;
        if(img==l){
            img = 0;
        
        }
        imgtag.src='../images/'+photo[img];
    }
</script>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/webslidemenu.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>