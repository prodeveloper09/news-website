<?php 
 include('config.php');

 if(isset($_REQUEST['delete_id'])){
  $rcv_dlt_id = $_REQUEST['delete_id'];

  $dlt_selete = "DELETE FROM `post` WHERE id='$rcv_dlt_id'";
  $query_set = mysqli_query($db_connect,$dlt_selete);

  if($query_set){
    header('location:post.php');
  }else{
    echo "data not delete";
  }


 }

?>