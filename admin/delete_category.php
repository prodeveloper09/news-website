<?php 
include('config.php');

if(isset($_REQUEST['dlt_id'])){
  $rcv_dlt_id = $_REQUEST['dlt_id'];

  $category_delete = "DELETE FROM `category` WHERE id='$rcv_dlt_id'";
  $query_set = mysqli_query($db_connect,$category_delete);

  if($query_set){
    header('location:category.php');
  }else{
    echo "data nor deleted";
  }
}



?>