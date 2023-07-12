<?php include "header.php"; ?>
<div id="admin-content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php 
        include('config.php');
        
        if(isset($_REQUEST['submit'])){
          $hidden_id = $_REQUEST['category_hidden_id'];
          $category_name = $_REQUEST['category_name'];

          $update_category = "UPDATE `category` SET `category`='$category_name' WHERE id='$hidden_id'";

          $update_query = mysqli_query($db_connect,$update_category);
          if($update_query){
            header('location:category.php');
          }else{
            echo "data not updated";
          }

        }
        ?>
        <h1 class="adin-heading"> Update Category</h1>
      </div>
      <div class="col-md-offset-3 col-md-6">

        <?php 
        if(isset($_REQUEST['edit_id'])){
          $rcv_edit_id = $_REQUEST['edit_id'];

          $select_category = "SELECT * FROM `category` WHERE id='$rcv_edit_id'";
          $query_set = mysqli_query($db_connect,$select_category);
          $count = mysqli_num_rows($query_set);

          if($count > 0){

            while($row = mysqli_fetch_assoc($query_set)){
              $category_id = $row['id'];
              $category = $row['category'];
            }

          }else{
            echo "data not found";
          }


        }
        
        
        
        
        
        
        
        ?>


        <form action="" method="POST">
          <div class="form-group">
            <input type="hidden" name="category_hidden_id" class="form-control" value="<?php echo $category_id?>" placeholder="">
          </div>
          <div class="form-group">
            <label>Category Name</label>
            <input type="text" name="category_name" class="form-control" value="<?php echo $category?>" placeholder="Add Category" required>
          </div>
          <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
        </form>
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>