
<div id="sidebar" class="col-md-4">
    <!-- search box -->
    <div class="search-box-container">
        <h4>Search</h4>
        <form class="search-post" action="search.php" method ="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search .....">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-danger" name="submit">Search</button>
                </span>
            </div>
        </form>
    </div>
    <!-- /search box -->
    <!-- recent posts box -->
           <div class="recent-post-container">
           <h4>Recent Posts</h4>

            <?php 
                include('admin/config.php');

                $pst_select = "SELECT * FROM post";
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
                        $category = $row['category'];
                        $date = $row['date'];
                        ?>
                            
                            <div class="recent-post">
                        <a class="post-img" href="">
                            <img src="admin/images/<?php echo $image?>" alt=""/>
                        </a>
                        <div class="post-content">
                            <h5><a href="single.php"><?php echo $title?></a></h5>
                            <span>
                                <i class="fa fa-tags" aria-hidden="true"></i>
                                <a href='category.php'><?php echo $category?></a>
                            </span>
                            <span>
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                <?php echo $date?>
                            </span>
                            <a class="read-more" href="single.php?readmore=<?php echo $id?>">read more</a>
                        </div>
                    </div>

                    

                        <?php
                        }


                    }else{
                        echo "data not found";
                    }
                    ?>
    </div> 
    <!-- /recent posts box -->
</div>

