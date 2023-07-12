<?php include "header.php"; ?>
<div id="admin-content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="admin-heading">Add New Post</h1>
      </div>
      <div class="col-md-offset-3 col-md-6">
        <?php 
         include('config.php');
         session_start();

         if(isset($_REQUEST['submit'])){
          $pst_title = $_REQUEST['post_title'];
          $description = $_REQUEST['description'];
          $category = $_REQUEST['category'];
          $date = date('d-m-y');
          $author = $_SESSION['username'];

          $img_file = $_FILES['fileToUpload'];
          $img_name = $img_file['name'];
          $tmp_name = $img_file['tmp_name'];

          if(!empty($img_name)){

            $location = "images/".$img_name;
            move_uploaded_file($tmp_name,$location);
          }

          $pst_insert ="INSERT INTO `post`(`image`, `title`, `description`, `category`, `date`, `author`) VALUES ('$img_name','$pst_title','$description','$category','$date','$author')";

          $query_set = mysqli_query($db_connect,$pst_insert);
          if($query_set){
            // echo "data insert";
            header('location:post.php');
          }else{
            echo " data not insert";
          }



         }
        
        
        ?>








        <!-- Form -->
        <form method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="post_title">Title</label>

            <input type="text" name="post_title" class="form-control" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1"> Description</label>
            <textarea name="description" class="form-control" rows="5" required></textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Category</label>
            <select name="category" class="form-control" required>
              <option disabled selected>Select your catagory</option>
              <?php 
                include('config.php');
                $select_category = "SELECT * FROM category";
                $query_set = mysqli_query($db_connect,$select_category);
                
                $count = mysqli_num_rows($query_set);
                if($count > 0){

                  while($row = mysqli_fetch_assoc($query_set)){
                    $category_id = $row['id'];
                    $category = $row['category'];
                   echo "<option value='$category'>$category</option>";


                  }
                }else{
                  echo "data not found";
                }
                
                ?>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Post image</label>
            <input type="file" name="fileToUpload" required>
          </div>
          <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
        </form>
        <!--/Form -->
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>