<?php include 'header.php'; ?>
    <div id="main-content">
      <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <?php 
                include('admin/config.php');
                    if(isset($_REQUEST['submit'])){
                        $search = $_REQUEST['search'];
                    }



                ?>
                <div class="post-container">
                  <h2 class="page-heading">Search : <?php echo $search?></h2>
                  <?php 
                include('admin/config.php');

                $pst_select = "SELECT * FROM post WHERE title LIKE '%$search%'";
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
                        
                <div class="post-content">
                        <div class="row">
                            <div class="col-md-4">
                                <a class="post-img" href="single.php"><img src="admin/images/<?php echo $image?>" alt="" /></a>
                            </div>
                            <div class="col-md-8">
                                <div class="inner-content clearfix">
                                    <h3><a href='single.php'><?php echo $title?></a></h3>
                                    <div class="post-information">
                                        <span>
                                            <i class="fa fa-tags" aria-hidden="true"></i>
                                            <a href='category.php'><?php echo $category?></a>
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
                                    <p class="description">
                                    <?php echo $description?>
                                    </p>
                                    <a class='read-more pull-right' href='single.php?readmore=<?php echo $id?>'>read more</a>
                                </div>
                            </div>
                        </div>
                    </div>


                
                        


                        <?php
                    }


                }else{
                    echo "data not found";
                }

            
                
                ?>

                    <ul class='pagination'>
                        <li class="active"><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                    </ul>
                </div><!-- /post-container -->
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
      </div>
    </div>
<?php include 'footer.php'; ?>
