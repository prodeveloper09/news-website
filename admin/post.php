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
        <h1 class="admin-heading">Users Posts</h1>
      </div>
      <div class="col-md-2">
        <a class="add-new" href="add-post.php">add post</a>
      </div>
      <div class="col-md-12">
        <table class="content-table">
          <thead>
            <th>S.No.</th>
            <th>Image</th>
            <th>Title</th>
            <th>Category</th>
            <th>Date</th>
            <th>Author</th>
            <th>Edit</th>
            <th>Delete</th>
          </thead>
          <tbody>

          <?php 
          include('config.php');
          $select_pst = "SELECT * FROM post";
          $query_set = mysqli_query($db_connect,$select_pst);
          if(!$query_set){
            echo "database and table not connect";
          }
          $count = mysqli_num_rows($query_set);
          if($count > 0){
            while($row = mysqli_fetch_assoc($query_set)){
              $pst_id = $row['id'];
              $pst_image = $row['image'];
              $pst_title = $row['title'];
              $pst_category = $row['category'];
              $pst_date = $row['date'];
              $pst_author = $row['author'];




              ?>
              <tr>
              <td class='id'><?php echo $pst_id?></td>
              <td><img src="images/<?php echo $pst_image?>" alt="" width="100" height="100"></td>
              <td><?php echo $pst_title?></td>
              <td><?php echo $pst_category?></td>
              <td><?php echo $pst_date?></td>
              <td><?php echo $pst_author?></td>

              <td class='edit'><a href='update-post.php?edit_id=<?php echo $pst_id?>'><i class='fa fa-edit'></i></a></td>
              <td class='delete'><a onclick=" return confirm('Are You Sure')" href='delete_post.php?delete_id=<?php echo $pst_id?>'><i class='fa fa-trash-o'></i></a></td>
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
          <li><a href="">Prev</a></li>
          <li><a href="">1</a></li>
          <li><a href="">Next</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>

<?php include "footer.php"; ?>