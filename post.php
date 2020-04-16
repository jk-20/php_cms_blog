
<?php include "includes/cat_header.php" ;?>
        
           
 
        
        
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
 <!-- <h2><a href="post/<?php echo $post_id; ?>"><?php echo $post_title; ?></a></h2> -->
        <?php   $query = "SELECT * FROM categories WHERE cat_id='$post_cat_id'";
                    $select_categories_id = mysqli_query($connection,$query);
                            while($row=mysqli_fetch_assoc($select_categories_id)){
                                $cat_id = $row['cat_id'];
                                  $cat_title = $row['cat_title'];   
                                   }?>





<div class="container">
        <div class="row justify-content-md-center">
        
       
    <img src="../images/<?php echo $post_img ;?>" alt="" class="d-block w-50 img-thumbnailimg-thumbnail"> 

        </div>
    </div>
    
    <br>
    <hr>
    <h3 class="text-center text-primary"><?php echo $post_title;?>
    <p style="font-size:12px;"><?php echo $post_date; ?></p> </h3>
    
    <hr>
    <br>
    <div class="container">
        <div class="row">
           
               
                  <div class="col-sm-12">
                  
                    
                  <p>
                      <?php echo $post_content; ?>
                  </p>
                   
                   
                      
                   </div>
                  
                 
        
    
    
    </div>
                                 
    </div>

<!--     
   <div class="card">
                          <img class="card-img-top" src="/gen/admin/images/<?php echo $post_img; ?>" alt="" width="800px" height="450px">
               
        <div class='card-body'>
         <td><?php echo $cat_title  ?></td>
       <p class='card-text'><?php echo $post_content ?> </p> 
    <!-- <a href='#' class='btn btn-primary'>Read more ...</a> -->
        
        
        
        
        
          
    <?php } }
        
    }else{
        header("Location:index");
    } ?>
             <br>
            
            
           
                
                   
                   
                  
           
                
             
             
           
              
             
               
               
              
               
               
               
               
               
               
               
                       
                       
                       
                       <!-- main row ending here -->
                 
                
         <!--   main container ending here  -->   
         <br>                              
         <br>                              
         <br>                              
         <br>                              
         <br>                              
         <br>                              
         <br>                              
         <br>                              
         <br>                              
         <br>                              
         <br>                              
         <br>                              
         <br>                              
         <br>                              

         <?php include "includes/footer.php"?>

           
          

