<?php include "header.php"; ?>
<div id="admin-content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="admin-heading">Add New Category</h1>
      </div>
      <div class="col-md-offset-3 col-md-6">
      <?php 
        include('config.php');
        if(isset($_REQUEST['submit'])){
          $category = $_REQUEST['category_name'];

          $select_ctg = "SELECT * FROM `category` WHERE category='$category'";
          $query_set = mysqli_query($db_connect,$select_ctg);
          $count = mysqli_num_rows($query_set);
          if($count > 0){
            echo "category name exist";
          }else{
            $category_insert = "INSERT INTO `category`(`category`) VALUES ('$category')";
            $insert_query = mysqli_query($db_connect,$category_insert);
            if(!$insert_query){
              echo "database and table not connect";
            }

            if($insert_query){
              header('location:category.php');
            }else{
              echo "data not insert";
            }
          }


        }



        ?>
        <!-- Form Start -->
        <form action="" method="POST">
          <div class="form-group">
            <label>Category Name</label>
            <input type="text" name="category_name" class="form-control" placeholder="Category Name" required>
          </div>
          <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
        </form>
        <!-- /Form End -->
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>