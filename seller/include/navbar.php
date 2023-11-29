
<nav class="navbar navbar-expand-lg navbar-light ">
  <div class="container-fluid">
    <a class="navbar-brand" href="account.php">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Shop By Brand
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
              <select name = "brand" id ="brand" class="form-control" required>
                  <option value="">--choose brand--</option>
                  <?php 
                   include 'connection.php';
                  $query = "select * FROM brand";
                  $result = mysqli_query($con,$query);
                  
                  while($row = mysqli_fetch_array($result)){
                  ?>
                      <option value="<?php echo $row['b_id'];?>"><?php echo $row['name'];?></option>
                  
                  <?php } ?>
              </select>
          </ul>
        </li>


        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Shop By Department
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
             <select name = "category" id ="category" class="form-control" required>
                  <option value="">--choose category--</option>
                  <?php 
                  include 'connection.php';
                  $query = "select * FROM category";
                  $result = mysqli_query($con,$query);
                  while($row = mysqli_fetch_array($result)){
                  ?>
                      <option value="<?php echo $row['cat_id'];?>"><?php echo $row['name'];?></option>
                      
                    <?php } ?>
              </select>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Shop By Sub-category
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                  <select name = "sub_category" id ="sub_category" class="form-control" required> 
                  </select>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="warningmsg.php">massage</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../logout.php">logout</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function (){
        $("#category").change(function(){
            var cat =  $("#category").val();
            $.ajax({
                url:"find_subcategory.php",
                dataType:"json",
                data : {
                    "cat_id" : cat
                },
                success: function(res){
                    $("#sub_category").html("<option value=''>--choose sub_category--</option>");   
                    for(var i=0;i<res.length;i++){
                        var x = "<option value="+res[i].sub_id+">"+res[i].name+"</option>";
                        $("#sub_category").append(x);
                    }
                }
            });
        });
    });
</script>
<script>
  var d  = document.querySelector("select[name=brand]");
  d.addEventListener("change",function myfnc(e){
        console.clear();
       // console.log(e.target.value);
       var brnd = e.target.value;
       //document.write(brnd);
       var url = "products.php?b_id="+brnd;
       window.location=url;
                                   
  })
  var subd  = document.querySelector("select[name=sub_category]");
  subd.addEventListener("change",function myfnc(e){
        console.clear();
       // console.log(e.target.value);
       var sub = e.target.value;
       //document.write(brnd);
       var url = "products.php?sub_id="+sub;
       window.location=url;
                                   
  })
</script>

