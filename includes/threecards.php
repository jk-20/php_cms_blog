<div class="container three-card">
    <div class="row">
    <div class="col-sm-12">
    
    <div class="row">
    <?php
    $per_page = 3;
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
            
            if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin'){
            
   $post_query_count = "SELECT * FROM post ";
            
        }else{
            
            
    $post_query_count = "SELECT * FROM post WHERE post_status = 'published'";
        }
            
     
    $find_count = mysqli_query($connection,$post_query_count );
 $count = mysqli_num_rows($find_count);
            
            if($count < 1){
                echo "<h5 class='text-center'>NO POST AVAILABLE</h5> ";
                
            }else{
       
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
    $post_content = substr($row['post_content'],0,70);          
    $post_tag = $row['post_tag'];          
    $post_comment_count = $row['post_comment_count'];          
    $post_status = $row['post_status']; 
        
        
            
        
        ?>
    <div class="col-sm-4">
    <?php   $query = "SELECT * FROM categories WHERE cat_id='$post_cat_id'";
                    $select_categories_id = mysqli_query($connection,$query);
                            while($row=mysqli_fetch_assoc($select_categories_id)){
                                $cat_id = $row['cat_id'];
                                  $cat_title = $row['cat_title'];   
                                   }?>
      <a href="post/<?php echo $post_id ;?>" target="_blank">                            
    <div class="card bg-dark text-white">
  <img src="admin/images/<?php echo $post_img; ?>" class="card-img " alt="...">
  <div class="card-img-overlay">
    <h5 class="card-title"><?php echo "<span class='badge badge-primary text-wrap'>$cat_title</span>" ; ?>
    <p style="font-size:12px;"><?php echo $post_date; ?></p>
    </h5>
    <p class="card-text"><?php echo $post_title  ;?></p>
    <p class="card-text"></p>
  </div>
</div></a><br>
    
    </div>
                                  <?php }} ?>
    
    
    </div>
    
    </div>
    
    </div>
    
    
    </div>
    
    <br>
    <br>
    <br>