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
        <h1 class="admin-heading">Users Data</h1>
      </div>
      <div class="col-md-2">
        <a class="add-new" href="add-user.php">add user</a>
      </div>
        <div class="col-md-12">
          <table class="content-table">
            <thead>
              <th>DB ID</th>
              <th>Full Name</th>
              <th>User Name</th>
              <th>Role</th>
              <th>Edit</th>
              <th>Delete</th>
            </thead>
            <tbody>             
            <?php 
                include('config.php');
                $select_user = "SELECT * FROM user";
                $query_set = mysqli_query($db_connect,$select_user);
                $count = mysqli_num_rows($query_set);
                if($count > 0){
                  while ($row = mysqli_fetch_assoc($query_set)) {

                    $user_id = $row['id'];
                    $fname = $row['fname'];
                    $lname = $row['lname'];
                    $username = $row['username'];
                    $role = $row['role'];
                ?>
    
                    <tr>
                      <td class='id'><?php echo $user_id?></td>
                      <td><?php echo $fname ." ". $lname?></td>
                      <td><?php echo $username?></td>
                      <td>
                        <?php
                        if($role == '1'){
                          echo "Admin";
                        }else{
                          echo "Modarator";
                        }
                        
                        
                        ?>
                      </td>
                      <td class='edit'><a href='update-user.php?edit_id=<?php echo  $user_id?>'><i class='fa fa-edit'></i></a></td>
                      <td class='delete'><a onclick="return confirm('Are you sure?')" href='delete_user.php?dlt_id=<?php echo $user_id?>'><i class='fa fa-trash-o'></i></a></td>
                    </tr>
    
                <?php
                  }
                } else {
                  echo "data not found";
                }
    
    
                ?>
            </tbody>
          </table>

        <ul class='pagination admin-pagination'>
          <li><a href="">Prev</a></li>
          <li class=''><a href=''>1</a></li>
          <li><a href="">Next</a></li>
        </ul>
        </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>