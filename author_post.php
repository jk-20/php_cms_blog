
 <?php include "includes/header.php"?>
           

           
 
        
        <div class="container-fluid">
           <?php include "includes/upr_navigation.php"?>
            <div class="row">  
              
          <div class="col-sm-8 col-xs-8">
                <br>
                <?php 
    if(isset($_GET['p_id'])){
        
        $the_post_id = escape($_GET['p_id']);
        $the_post_author = escape($_GET['author']);
        
    }


    $query = "SELECT * FROM post WHERE post_author = '$the_post_author' ";
    $select_post = mysqli_query($connection,$query);
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
 <h2><a href="post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title ?></a></h2>
        <?php   $query = "SELECT * FROM categories WHERE cat_id='$post_cat_id'";
                    $select_categories_id = mysqli_query($connection,$query);
                            while($row=mysqli_fetch_assoc($select_categories_id)){
                                $cat_id = $row['cat_id'];
                                  $cat_title = $row['cat_title'];   
                                   }?>
    
   <div class="card">
                          <img class="card-img-top" src="admin/images/<?php echo $post_img; ?>" alt="" width="800px" height="450px">
               
        <div class='card-body'>
         <td><?php echo $cat_title  ?></td>
       <p class='card-text'><?php echo $post_content ?> </p> 
    <!-- <a href='#' class='btn btn-primary'>Read more ...</a> -->
        
        
        
        
        
            </div>
           
                
            </div>
             <br>
            
            
           
                 <?php } ?>
                   <!-- form for comments -->
                
                   
                   
             
                
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

           
          

