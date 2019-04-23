<?php include "includes/header.php"?>







<div class="container-fluid">
    <?php include "includes/upr_navigation.php"?>
    <div class="row">

        <div class="col-sm-8 col-xs-8">
            <br>
            
            <?php
    $per_page = 5;
            if(isset($_GET['page'])){
                
                $page = $_GET['page'];
            }else{
                $page = "";
            }
            
            if($page == "" || $page == 1){
                $page_1 = 0;
            }else{
                $page_1 = ($page * $per_page) - $per_page;
            }


            ?>
   
            
            <?php 
    
     $post_query_count = "SELECT * FROM post";
    $find_count = mysqli_query($connection,$post_query_count );
 $count = mysqli_num_rows($find_count);
$count = ceil($count / 5);
    
    
    $query = "SELECT * FROM post LIMIT $page_1,$per_page";
    $select_post = mysqli_query($connection,$query);
    while($row=mysqli_fetch_assoc($select_post)){
                                 
    $post_id = $row['post_id'];        
    $post_author = $row['post_author'];
    $post_title = $row['post_title'];  
    $post_cat_id = $row['post_cat_id'];  
    $post_date = $row['post_date'];          
    $post_img = $row['post_img'];          
    $post_content = substr($row['post_content'],0,100);          
    $post_tag = $row['post_tag'];          
    $post_comment_count = $row['post_comment_count'];          
    $post_status = $row['post_status']; 
        
        if($post_status == 'published'){
            
        
        ?>



            <h2>
                <?php echo $post_title ?>
                
            </h2>
            <p>By <a href="author_post.php?author=<?php echo $post_author?>&p_id=<?php echo $post_id; ?>"><?php echo $post_author; ?></a></p>
            <?php   $query = "SELECT * FROM categories WHERE cat_id='$post_cat_id'";
                    $select_categories_id = mysqli_query($connection,$query);
                            while($row=mysqli_fetch_assoc($select_categories_id)){
                                $cat_id = $row['cat_id'];
                                  $cat_title = $row['cat_title'];   
                                   }?>

            <div class="card">
                

                <img class="card-img-top" src="admin/images/<?php echo $post_img; ?>" alt="" width="auto" height="450px">

                <div class='card-body'>
                    <td>
                        <?php echo $cat_title ; ?>
                    </td>
                    <p class='card-text'>
                        <?php echo $post_content ;?>
                    </p>
                    <a href="post.php?p_id=<?php echo $post_id ;?>" target="_blank" class='btn btn-primary'>Read more ...</a>





                </div>



            </div>
            <?php } ?>
            <?php } ?>

        </div>



        <div class="col-sm-4 col-xs-4">





            <hr>
            <?php include "includes/sidebar.php"; ?>
        </div>










        <!-- main row ending here -->
    </div>

    <!--   main container ending here  -->
</div>


<div><br>
    <nav aria-label="...">
  <ul class="pagination">
    <li class='page-item'><a class='page-link' href="index.php?page=<?php echo $page-1; ?>">Previous</a></li>
    <?php
   
      for($i =1; $i <=$count; $i++) {
          
      
          echo "<li class='page-item'><a href='index.php?page=$i' class='page-link'>$i</a></li>";
      }
      
      
      ?>
      <li class='page-item'><a class='page-link' href="index.php?page=<?php echo $page+1; ?>">Next</a></li>
  </ul>
      
</nav>
    
</div>
<?php include "includes/footer.php"?>