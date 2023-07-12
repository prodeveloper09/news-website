<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>ADMIN Panel</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="../css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <!-- HEADER -->
    <div id="header-admin">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-2">
                    <a href="post.php"><img class="logo" src="images/news.jpg"></a>
                </div>
                <!-- /LOGO -->
                <!-- LOGO-Out -->
                <div class="col-lg-10">
                    <p class="text-right"><a href="log_out.php" class="admin-logout">logout</a></p>
                </div>
                <!-- /LOGO-Out -->
            </div>
        </div>
    </div>
    <!-- /HEADER -->
    <!-- Menu Bar -->
    <div id="admin-menubar">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <center>

                        <ul class="admin-menu">

                            <?php

                            if ($_SESSION['role'] == 0) {
                                echo '<li><a href="post.php">Post</a></li>';
                            }elseif($_SESSION['role'] == 1){
                                echo '<li><a href="post.php">Post</a></li>';
                                echo '<li><a href="category.php">Category</a></li>';
                                echo '<li><a href="users.php">Users</a></li>';

                            }



                            ?>

                            <!-- <li><a href="post.php">Post</a></li>

                            <li>
                                <a href="category.php">Category</a>
                            </li>
                            <li>
                                <a href="users.php">Users</a>
                            </li> -->

                        </ul>


                        <center>
                </div>
            </div>
        </div>
    </div>
    <!-- /Menu Bar -->