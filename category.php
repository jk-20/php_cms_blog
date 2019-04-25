

 <?php include "includes/header.php"?>

           
 
        
        <div class="container-fluid">
           <?php include "includes/upr_navigation.php"?>
            <div class="row">  
              
          <div class="col-sm-8 col-xs-8">
                <br>
                <?php 
    
    if(isset($_GET['category'])){
        
        $post_cat_id = $_GET['category'];
        
   if(is_login(){
            
$stmt1 = mysqli_prepare($connection,
"SELECT post_id,post_author,post_title,post_date,post_img,post_content FROM post WHERE post_cat_id = ?");
            
        }else{
            
$stmt2 = mysqli_prepare($connection,"SELECT post_id,post_author,post_title,post_date,post_img,post_content                                      FROM post WHERE post_cat_id = '?' AND post_status = ? ");
      
                         $published = 'published';
        }
        if(isset($stmt1)){
            mysqli_stmt_bind_param($stmt1,"i",$post_cat_id);
            mysqli_stmt_execute($stmt1);
     mysqli_stmt_bind_result($stmt1,$post_id,$post_author,$post_title,$post_date,$post_img,$post_content);
            $stmt = $stmt1;
            
        }else{
            
    mysqli_stmt_bind_param($stmt2,"is",$post_cat_id,$published);
            mysqli_stmt_execute($stmt2);
     mysqli_stmt_bind_result($stmt2,$post_id,$post_author,$post_title,$post_date,$post_img,$post_content);
            $stmt = $stmt2;
        }
    
    

    $select_post = mysqli_query($connection,$query);
        
        if(mysqli_num_rows($stmt) === 0){
            
             echo "<h5 class='text-center'>NO POST AVAILABLE</h5> ";
        }
        
        
    while(mysqli_stmt_fetch($stmt)):
                                 
              
        
        ?>
        <h2><?php echo $post_title ?></h2>
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
    <a href="/gen/post/<?php echo $post_id //post.php?p_id=?>" target="_blank" class='btn btn-primary'>Read more ...</a>
        
        
        
        
        
            </div>
              
             
                
                </div>
                 <?php endwhile;
               }else{
        
        header("Location:index.php");
    }?>
                
               </div>
               
               
               
               <div class="col-sm-4 col-xs-4">
                 <br>
                   <div>
                   
                
                    <br>
                      <hr>
                 <?php include "includes/sidebar.php"; ?>
               </div>
              
               
               
               
               
               
               
               
                       
                       
                       
                       <!-- main row ending here -->
                       </div>
                
         <!--   main container ending here  -->                                 
    </div>
         <?php include "includes/footer.php"?>

           
          <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt, animi, vitae. Perferendis placeat assumenda, minus molestias pariatur eius eveniet, quae optio dolores voluptate ullam facere omnis natus, in quos culpa.</p> -->

