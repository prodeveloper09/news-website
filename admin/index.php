<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADMIN | Login</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="font/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div id="wrapper-admin" class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-4 col-md-4">
                    <img class="logo" src="images/news.jpg">
                    <h3 class="heading">Admin</h3>
                    <p style="color:red;">
                    <?php 
                    if(isset($_REQUEST['error_msg'])){
                      echo  $_REQUEST['error_msg'];
                    }
                    
                    ?>
                
                </p>

                    <?php 
                    include('config.php');
                    if(isset($_REQUEST['login'])){

                        $username = $_REQUEST['username'];
                        $pass = $_REQUEST['password'];

                        $select_data = "SELECT * FROM user WHERE username='$username' && pass='$pass'";
                        $query_set = mysqli_query($db_connect,$select_data);
                        if(!$query_set){
                            echo 'database and table not connect';
                        }

                        $count = mysqli_num_rows($query_set);

                        if($count > 0){

                            while($row = mysqli_fetch_assoc($query_set)){
                                $id = $row['id'];
                                $role = $row['role'];
                            }
                            session_start();
                            $_SESSION['username']=$username;
                            $_SESSION['role']=$role;
                            
                            if($_SESSION['role'] == 1){
                                header('location:users.php');
                            }else{
                                header('location:post.php');
                            }
                        }else{
                            header('location:index.php?error_msg=Your username and password invalid');
                        }






                    }
                    
                    
                    
                    
                    
                    
                    
                    ?>



                    <!-- Form Start -->
                    <form action="" method="POST">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="" required>
                        </div>
                        <input type="submit" name="login" class="btn btn-primary" value="login" />
                    </form>
                    <!-- /Form  End -->
                </div>
            </div>
        </div>
    </div>
</body>

</html>