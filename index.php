
<?php include "includes/header.php"; ?>

<?php include "includes/slider.php" ?>
    <!--   *************************  slider end ******************** -->
    
     <!--   *************************  three cards starting******************** -->
    
  <?php include "includes/threecards.php"; ?>
    
     <!--   *************************  three cards end******************** -->
     <h5 class="text-center">What's New And popluar</h5>
     <div class="container">
        <div class="row">
            <div class="col-sm-8">
             <div class="row">
     <?php
    $per_page = 8;
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
    <a href="post/<?php echo $post_id ;?>" target="_blank">
    
              <div class="col-sm-6">
               <div class="card-group">
                  <?php   $query = "SELECT * FROM categories WHERE cat_id='$post_cat_id'";
                    $select_categories_id = mysqli_query($connection,$query);
                            while($row=mysqli_fetch_assoc($select_categories_id)){
                                $cat_id = $row['cat_id'];
                                  $cat_title = $row['cat_title'];   
                                   }?>
             
               <img src="admin/images/<?php echo $post_img; ?>" class="card-img-top" alt="...">
               
               
               <div class="card-img-overlay">
               
    <h5 class="card-title text-white"><?php echo"<span class='badge badge-primary text-wrap'>$cat_title</span>"  ; ?>
    <p style="font-size:12px;"><?php echo $post_date; ?></p>
    </h5>
    
    </div>
                 
  <div class="card">
  
    <div class="card-body p-tag">
    <a href="post/<?php echo $post_id ;?>" target="_blank">
      <h5 class="card-title post-title">  <?php echo $post_title ?></h5></a>
     
      <!-- <p class="card-text">By <a href="author_post.php?author=<?php echo $post_author?>&p_id=<?php echo $post_id; ?>"><?php echo $post_author; ?></a> </p> -->
      <?php   $query = "SELECT * FROM categories WHERE cat_id='$post_cat_id'";
                    $select_categories_id = mysqli_query($connection,$query);
                            while($row=mysqli_fetch_assoc($select_categories_id)){
                                $cat_id = $row['cat_id'];
                                  $cat_title = $row['cat_title'];   
                                   }?>
                                    <p class="card-text">
                                    
                        <?php echo $post_content ;?>
                    </p>
                
      <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
      <a href="/post/<?php echo $post_id ;?>" target="_blank"></a>
    </div>
  </div> 
  
  
</div><br>
               </div>
                </a>
               
        
        
  <?php }
  
  } ?>       
        <br>
        <br>    
        
     
         </div>
           </div>
            <br>
            <br>
             
            <div class="col-sm-4"><!--   *************************  side row start******************** -->
             <div class="row">
            <div class="col-sm-12"> <!--   **********  side row profile part****** -->
                    <div class="card" style="width: 18rem;">
  <div class="card-body">
   <img src="images/bg_1.jpg"  class="rounded-circle mx-auto d-block" alt="" height="132px" width="155px">
    <h5 class="card-title">Jogindra Kumar</h5>
    <h6 class="card-subtitle mb-2 text-muted">Learner</h6>
    <p class="card-text">I started this blog as a passion about technology .Here at tech_Blog , I cover all the aspects of tech Top Gadgets,Tech News,Latest trends and How the stuff work etc. </p>
    <!-- <button class="btn btn-primary btn-center"><a href="http://www.jogindrakumar.com" class="text-white">Read my bio</a></button><br> <br> -->
    <p> <a href="https://www.facebook.com/joginderkumar20"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        <a href="https://twitter.com/Joginde10665855"><i class="fa fa-twitter" aria-hidden="true"></i></a>
        <a href="https://www.instagram.com/joginder_20/"><i class="fa fa-instagram" aria-hidden="true"></i></a> 
    
    
    </p>
    <p></p>
  </div>
</div><br>
             <br>
              </div><!--   **********  side row profile part end****** --> <hr>
              <h5 class="text-center">popluar post</h5><hr>
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

              <div class="col-sm-12"><!--   **********  side row popluar post****** -->
                   <div class="row">
                       <div class="col-sm-4"> <!--   ***  side row popluar post image part** -->
<img src="admin/images/<?php echo $post_img; ?>" class="card-img-top" alt="" height="120px" width="150px">
                          
                       </div>
                       <div class="col-sm-8"><!--   ***  side row popluar post text part part** -->
                       <a href="post/<?php echo $post_id ;?>" target="_blank" ><p><?php echo $post_title ?></p></a>             
                       </div>
                   </div><br>
              </div><!--   **********  side row popluar post end****** -->
              <!--   **********  side row popluar post end****** -->
    <?php }
    } ?>
              <!--   **********  side row popluar post end****** -->
              <h5 class="text-center">Category</h5>
              <?php 
        $query = "SELECT * FROM categories";
        $select_categories_sidebar = mysqli_query($connection,$query);         
        ?>
               <div class="col-sm-12"><!--   **********  side row popluar category post****** -->
                   <div class="row">
                       <div class="col-sm-12"> <!--   ***  side row popluar post category 1 part** -->
                       <ul class="list-unstyled">

<?php 

while($row = mysqli_fetch_assoc($select_categories_sidebar )) {
$cat_title = $row['cat_title'];
$cat_id = $row['cat_id'];

echo "<li><a href='category/$cat_id'>{$cat_title}</a></li>";//category.php?category=
echo "<br>";

}

            ?>

</ul>
                       </div>
                        
                        
                        
                   </div><br>
              </div>
              
              
              
              </div>
            </div><!--   *************************  side row end******************** -->
        </div>
    </div>
    
    
<br>
<br>


<nav aria-label="...">
  <ul class="pagination">
    <!-- <li class='page-item'><a class='page-link' href="index.php?page=<?php echo $page-1; ?>">Previous</a></li> -->
    <?php
   
      for($i =1; $i <=$count; $i++) {
          
      
          echo "<li class='page-item'><a href='index.php?page=$i' class='page-link'>$i</a></li>";
      }
      
      
      ?>
     <!--  <li class='page-item'><a class='page-link' href="index.php?page=<?php echo $page+1; ?>">Next</a></li> -->
  </ul>
      
</nav>
    
    
    
    
    
    
    
    <?php include "includes/footer.php"; ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>