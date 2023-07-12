<?php 
session_start();
if(!isset($_SESSION['username'])){
  header('location:index.php');
}
?>

<?php include "header.php"; ?>
<div id="admin-content">
  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h1 class="admin-heading">Categories</h1>
      </div>
      <div class="col-md-2">
        <a class="add-new" href="add-category.php">add category</a>
      </div>
      <div class="col-md-12">
        <table class="content-table">
          <thead>
            <th>S.No.</th>
            <th>Category Name</th>
            <th>Edit</th>
            <th>Delete</th>
          </thead>
          <tbody>
          <?php 
          include('config.php');
          $select_category = "SELECT * FROM category";
          $query_set = mysqli_query($db_connect,$select_category);
          
          $count = mysqli_num_rows($query_set);
          if($count > 0){

            while($row = mysqli_fetch_assoc($query_set)){
              $category_id = $row['id'];
              $category = $row['category'];

              ?>

             <tr>
              <td><?php echo $category_id?></td>
              <td><?php echo $category?></td>
              <td><a href='update-category.php?edit_id=<?php echo $category_id?>'><i class='fa fa-edit'></i></a></td>
              <td><a onclick="return confirm('Are you sure')" href="delete_category.php?dlt_id=<?php echo $category_id?>"><i class='fa fa-trash-o'></i></a></td>
            </tr>


              <?php

            }
          }else{
            echo "data not found";
          }
          
          ?>

            

          </tbody>
        </table>
        <ul class='pagination admin-pagination'>
          <li><a href="">prev</a></li>
          <li><a href="">1</a></li>
          <li><a href="">next</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>