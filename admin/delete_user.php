<?php
include('config.php');

if(isset($_REQUEST['dlt_id'])){

  $rcv_dlt_id = $_REQUEST['dlt_id'];

  $select_dlt_id = "DELETE FROM user WHERE id='$rcv_dlt_id'";

  $query_set = mysqli_query($db_connect,$select_dlt_id);
  if($query_set){
    header('location:users.php');
  }else{
    echo "data not deleted";
  }






}


?>