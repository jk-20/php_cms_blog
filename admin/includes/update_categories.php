 <form action="" method="post">
                         
                         <div class="form-group">
                           <label for="cat-title">Edit Category</label>
                           
                           
                           <?php
                              if(isset($_GET['edit'])){
                                 $cat_id = escape($_GET['edit']);
                    $stmt = mysqli_prepare($connection,"SELECT cat_id,cat_title FROM categories WHERE cat_id= ?");
        mysqli_stmt_bind_param($stmt ,'i',$cat_id);  
         mysqli_stmt_execute($stmt);
     mysqli_stmt_bind_result($stmt, $cat_id, $cat_title);
                   
                            while(mysqli_stmt_fetch($stmt)):
                               
                                 
                            ?> 
        <input value="<?php if(isset($cat_title)){ echo $cat_title ;} ?>" type="text" class="form-control" name="cat_title">   
                             
                           
                             
               <?php endwhile; 
                              
                              mysqli_stmt_close($stmt);
                              
                              }?>
               
               
               <?php   
                             ////////// update query//////
                             
                             if(isset($_POST['update_category'])){
                                 $the_cat_title = escape($_POST['cat_title']);
 $stmt = mysqli_prepare($connection,"UPDATE  categories SET cat_title= ? WHERE  cat_id= ? ");
        mysqli_stmt_bind_param($stmt , 'si',$the_cat_title,$cat_id);  
         mysqli_stmt_execute($stmt);
                                 
                                 header("Location: categories.php");
                                 if(!$stmt){
                                    die("query failed" . mysqli_error($connection));
                                 }
                                 mysqli_stmt_close($stmt);
                             }
                             ?>
    
                        
                         </div>
                         <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="update_category" value="Update">
                         </div>
                     </form>