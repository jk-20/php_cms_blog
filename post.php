
 <?php include "includes/header.php"?>
           

           
 
        
        <div class="container-fluid">
           <?php include "includes/upr_navigation.php"?>
            <div class="row">  
              
          <div class="col-sm-8 col-xs-8">
                <br>
                <?php 
    if(isset($_GET['p_id'])){
        
        $the_post_id = $_GET['p_id'];
        
    
$view_count_query = "UPDATE post SET post_views_count = post_views_count + 1 WHERE post_id = '$the_post_id'";
$send_query = mysqli_query($connection,$view_count_query);
if(!$send_query){
    
    die("Query failed!");
}
        if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin'){
            $query = "SELECT * FROM post WHERE post_id = $the_post_id";
            
        }else{
            
            $query = "SELECT * FROM post WHERE post_id = $the_post_id AND post_status = 'published' ";
        }

    
    $select_post = mysqli_query($connection,$query);
        
         if(mysqli_num_rows($select_post) < 1){
            
             echo "<h5 class='text-center'>NO POST AVAILABLE</h5> ";
        }else{
        
    while($row=mysqli_fetch_assoc($select_post)){
                                 
    $post_id = $row['post_id'];        
    $post_author = $row['post_author'];
    $post_title = $row['post_title'];  
    $post_cat_id = $row['post_cat_id'];  
    $post_date = $row['post_date'];          
    $post_img = $row['post_img'];          
    $post_content = $row['post_content'];          
    $post_tag = $row['post_tag'];          
    $post_comment_count = $row['post_comment_count'];          
    $post_status = $row['post_status'];          
        
        ?>
 <h2><a href="post/<?php echo $post_id ?>"><?php echo $post_title ?></a></h2>
        <?php   $query = "SELECT * FROM categories WHERE cat_id='$post_cat_id'";
                    $select_categories_id = mysqli_query($connection,$query);
                            while($row=mysqli_fetch_assoc($select_categories_id)){
                                $cat_id = $row['cat_id'];
                                  $cat_title = $row['cat_title'];   
                                   }?>
    
   <div class="card">
                          <img class="card-img-top" src="/gen/admin/images/<?php echo $post_img; ?>" alt="" width="800px" height="450px">
               
        <div class='card-body'>
         <td><?php echo $cat_title  ?></td>
       <p class='card-text'><?php echo $post_content ?> </p> 
    <!-- <a href='#' class='btn btn-primary'>Read more ...</a> -->
        
        
        
        
        
            </div>
           
                
            </div>
    <?php } }
        
    }else{
        header("Location: /gen/");
    } ?>
             <br>
            
            
            <div class="card">
               <div class="card-body">
                   
                <?php 
                   
                   $query = "SELECT * FROM comments WHERE comment_post_id= $the_post_id ";
        $query .= "AND comment_status = 'approved' ";
        $query .= "ORDER BY comment_id DESC";
        $select_comment_query = mysqli_query($connection,$query);
        if(!$select_comment_query){
            die('Query failed'.mysqli_error($connection));
        }
        while($row=mysqli_fetch_array($select_comment_query)){
            
            $comment_date = $row['comment_date'];
            $comment_content = $row['comment_content'];
            $comment_author = $row['comment_author'];
            $comment_time = $row['comment_time'];
            
            
            
            
                   ?>
                   
                   <div class="card-header"><h5><i class="fas fa-user-tie"></i>
                     <?php echo $comment_author;  ?>
                     <small> <?php echo $comment_date ; ?></small>
                     <small> <?php echo $comment_time ; ?></small>
                     
                     </h5>
                      <i class="fas fa-comments"></i>
                       <?php echo $comment_content; ?>
                   </div>
                   
                   
                   
                   <?php  } 
                   
                   
    
                   
                   ?>
                   
               </div>
                
             
             
           
              
             
                
                </div>
                 <?php// } ?>
                   <!-- form for comments -->
                   <?php 
         create_comment_form();
              
              
              
              
              
              ?>
                   
                   
             
           <div class="card-body">
               <h5 class="">comments below</h5>
   
   <form action="" method="post" enctype="multipart/form-data">
  
     <div class="form-group">
        <label for="">Name</label>
        <input type="text" class="form-control" name="comment_author">
    </div>
     <div class="form-group">
        <label for="">Email</label>
        <input type="email" class="form-control" name="comment_email">
    </div>

    <div class="form-group">
        
        <label for="">Comments</label>
        <textarea type="text" class="form-control" name="comment_content" id="editor" cols="30" row="10"></textarea>
        
    </div>
  <div class="form-group">
        
        
        <input class="btn btn-primary" type="submit"  name="create_comment" value="send">
        
    </div>

</form>  
               
           </div>
                
               </div>
               
               
               
               <div class="col-sm-4 col-xs-4">
                 <br>
                   <div>
                      <img src="" alt="">
                <div class="card">        
              <h4>Blog</h4>
<div class="card-body">
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> </div>
                     
                       
                </div> 
                    <br>
                      <hr>
                 <?php include "includes/sidebar.php"; ?>
               </div>
              
               
               
               
               
               
               
               
                       
                       
                       
                       <!-- main row ending here -->
                       </div>
                
         <!--   main container ending here  -->                                 
    </div>
         <?php include "includes/footer.php"?>

           
          

