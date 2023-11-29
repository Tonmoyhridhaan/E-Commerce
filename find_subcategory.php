<?php
    include 'connection.php';
    $cat_id = $_REQUEST['cat_id'] ;
    $query = "SELECT * FROM sub_category where cat_id = $cat_id";
    $result = mysqli_query($con,$query);
    $data = [];
    while($row = mysqli_fetch_array($result)){
        $data[] = $row;
    }

    echo json_encode($data);
?>