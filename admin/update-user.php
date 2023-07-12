<?php include "header.php"; ?>

<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <?php 
            include('config.php');
            if(isset($_REQUEST['submit'])){
                $hidden_id = $_REQUEST['hidden_id'];
                $f_name = $_REQUEST['f_name'];
                $l_name = $_REQUEST['l_name'];
                $username = $_REQUEST['username'];
                $role = $_REQUEST['role'];

                $update = "UPDATE `user` SET `fname`='$f_name',`lname`='$l_name',`username`='$username',`role`='$role' WHERE id='$hidden_id'";
                $update_query = mysqli_query($db_connect,$update);

                if($update_query){
                    header("location:users.php");
                }else{
                    echo "data not update";
                }

            }

            ?>

                <h1 class="admin-heading">Modify User Details</h1>
            </div>
            <div class="col-md-offset-4 col-md-4">
            <?php 
            if(isset($_REQUEST['edit_id'])){
                $rcv_edit_id = $_REQUEST['edit_id'];

                $select = "SELECT * FROM `user` WHERE id='$rcv_edit_id'";

                $edit_query = mysqli_query($db_connect,$select);
                $count = mysqli_num_rows($edit_query);

                if($count > 0){

                    while($row = mysqli_fetch_assoc($edit_query)){
                        $user_id = $row['id'];
                        $f_name = $row['fname'];
                        $l_name = $row['lname'];
                        $username = $row['username'];
                        $role = $row['role'];

                    }

                }else{
                    echo "data not found";
                }

            }
            
            
            ?>




                <!-- Form Start -->
                <form action="" method="POST">
                    <div class="form-group">
                        <input type="hidden" name="hidden_id" class="form-control" value="<?php echo $user_id?>" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="f_name" class="form-control" value="<?php echo $f_name?>" placeholder="First Name" required>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="l_name" class="form-control" value="<?php echo $l_name?>" placeholder="Last Name" required>
                    </div>
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $username?>" placeholder="username" required>
                    </div>
                    <div class="form-group">
                        <label>User Role</label>
                        <select class="form-control" name="role" value="<?php echo $role?>">
                            <?php
                            if($role == '1'){
                                echo  "<option value='0'>Moderator</option>";
                               echo  "<option value='1' selected>Admin</option>";
                            }else{
                                echo  "<option value='0' selected>Moderator</option>";
                               echo  "<option value='1'>Admin</option>";
                            }
                            
                            ?>
                        </select>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Update" />
                </form>
                <!-- /Form -->
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>