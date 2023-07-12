<?php include "header.php"; 
 session_start();
?>

    <?php 
      include('config.php');
      if(isset($_REQUEST['submit'])){
        $h_id = $_REQUEST['post_id'];
        $post = $_REQUEST['post_title'];
        $description = $_REQUEST['description'];
        $img_file = $_FILES['new_image'];
        $img_name = $img_file['name'];
        $tmp_name = $img_file['tmp_name'];
        $ctg = $_REQUEST['category'];
      
        if(!empty($img_name)){
      
          $location = "images/".$img_name;
          move_uploaded_file($tmp_name,$location);
      
        }
      
      
        $update ="UPDATE `post` SET `image`='$img_name',`title`='$post',`description`='$description',`category`='$ctg' WHERE id='$h_id'";
      
        $update_query = mysqli_query($db_connect,$update);
        if($update_query){
          header("location:post.php");
        }else{
          echo "data not update";
        }
      }
      

     ?>
<div id="admin-content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="admin-heading">Update Post</h1>
      </div>
      <div class="col-md-offset-3 col-md-6">
      <?php 
      if(isset($_REQUEST['edit_id'])){
        $rcv_edite_id = $_REQUEST['edit_id'];

        $select ="SELECT * FROM post WHERE id='$rcv_edite_id'";
        $edite_query = mysqli_query($db_connect,$select);
        $count = mysqli_num_rows($edite_query);

        if($count > 0){
          while($row = mysqli_fetch_assoc($edite_query)){
            $pst_id = $row['id'];
            $pst_image = $row['image'];
            $pst_title = $row['title'];
            $des = $row['description'];
            $pst_category = $row['category'];

          }
        }else{
          echo "data not update";
        }

      }
      
      
      ?>



        <!-- Form for show edit-->

        <form method="POST" enctype="multipart/form-data" autocomplete="off">
          <div class="form-group">
            <input type="hidden" name="post_id" class="form-control" value="<?php echo $pst_id?>" placeholder="">
          </div>
          <div class="form-group">
            <label for="exampleInputTile">Title</label>
            <input type="text" name="post_title" class="form-control" id="exampleInputUsername" value="<?php echo $pst_title?>" required>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1"> Description</label>
            <textarea name="description" class="form-control" rows="5" required> <?php echo $des?> </textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputCategory">Category</label>
            <select class="form-control" name="category" required>

              <?php 
              $ctg_data = "SELECT * FROM category";
              $query_set_ctg = mysqli_query($db_connect,$ctg_data);
              $count = mysqli_num_rows($query_set_ctg);
              if($count>0){

                while($row = mysqli_fetch_assoc($query_set_ctg)){

                  $ctg_id = $row['id'];
                  $ctg_name = $row['category'];
                  echo "<option value='$ctg_name'>$ctg_name</option>";
                }

              }else{
                echo "data not found";
              }
            
              ?>

               
            </select>

            <input type="hidden" name="old_category" value="">

          </div>
          <div class="form-group">
            <label for="">Post image</label>
            <input type="file" name="new_image">
            <img src="upload/" height="150px" alt="Not found">
            <input type="hidden" name="old_image" value="">
          </div>
          <input type="submit" name="submit" class="btn btn-primary" value="Update" />
        </form>

      </div>
    </div>
  </div>
</div>

<?php include "footer.php"; ?>