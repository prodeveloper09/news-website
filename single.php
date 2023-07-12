<?php include 'header.php'; ?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                  <!-- post-container -->

                    <?php 
                    include('admin/config.php');
                    if(isset($_REQUEST['readmore'])){
                        $rcv_id = $_REQUEST['readmore'];
                   

                    $pst_select = "SELECT * FROM post WHERE id='$rcv_id'";
                    $query_set =  mysqli_query($db_connect,$pst_select);
                    if(!$query_set){
                        echo "database and table not connect";
                    }

                    $count = mysqli_num_rows($query_set);
                    if($count > 0){
                        while($row = mysqli_fetch_assoc($query_set)){
                            $id = $row['id'];
                            $image = $row['image'];
                            $title = $row['title'];
                            $description = $row['description'];
                            $category = $row['category'];
                            $date = $row['date'];
                            $author = $row['author'];
                            ?>

                            <div class="post-container">
                            <div class="post-content single-post">
                                <h3><?php echo $title?></h3>
                                <div class="post-information">
                                    <span>
                                        <i class="fa fa-tags" aria-hidden="true"></i>
                                        <?php echo $category?>
                                    </span>
                                    <span>
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <a href='author.php'><?php echo $author?></a>
                                    </span>
                                    <span>
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                        <?php echo $date?>
                                    </span>
                                </div>
                                <img class="single-feature-image" src="admin/images/<?php echo $image?>" alt=""/>
                                <p class="description">
                                <?php echo $description?>
                                </p>
                            </div>
                        </div>


                        <?php
                    }
                    }else{
                        echo "data not found";
                    }
                }
            
                
                ?>
                    
                    <!-- /post-container -->
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
