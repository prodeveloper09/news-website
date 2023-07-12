<?php include ("header.php"); ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Add User</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <?php 
                include('config.php');
                if(isset($_REQUEST['submit'])){

                    $fname = $_REQUEST['fname'];
                    $lname = $_REQUEST['lname'];
                    $user = $_REQUEST['user'];
                    $pass = $_REQUEST['password'];
                    $role = $_REQUEST['role'];

                    $verify_user = "SELECT * FROM `user` WHERE username='$user'";
                    $user_query = mysqli_query($db_connect,$verify_user);
                    $count = mysqli_num_rows($user_query);
                    if($count > 0){
                        echo "Yourname alreay exist";
                    }else{
                        $insert_query = "INSERT INTO `user`(`fname`, `lname`, `username`, `pass`, `role`) VALUES ('$fname','$lname','$user','$pass','$role')";
                    }
                    $query_set = mysqli_query($db_connect,$insert_query);
                    if(!$query_set){
                        echo "database and table not connect";
                    }
                    if($query_set){
                        header('location:users.php');
                    }else{
                        echo "data not insert";
                    }

                }
                
                
                ?>
                <!-- Form Start -->
                <form action="" method="POST">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                    </div>
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" name="user" class="form-control" placeholder="Username" required>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label>User Role</label>
                        <select class="form-control" name="role">
                            <option value="0">Moderator</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Add" required />
                </form>
                <!-- Form End-->
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>