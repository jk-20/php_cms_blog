 <?php 

    if(isset($_GET['p_id'])){
     $the_post_id = escape($_GET['p_id']);
    }

$stmt= mysqli_prepare($connection,"SELECT post_id,post_author,post_title,post_cat_id,post_date,post_img,post_content,post_tag,post_comment_count,post_status  FROM post WHERE post_id= ?");

mysqli_stmt_bind_param($stmt, "i",$the_post_id);
        
        mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $post_id, $post_author, $post_title,$post_cat_id, $post_date, $post_img, $post_content,$post_tag,$post_comment_count,$post_status);

     confirm($stmt);

     while(mysqli_stmt_fetch($stmt)):
endwhile;
mysqli_stmt_close($stmt);


    
    
    if(isset($_POST['update_post'])){
        
    $post_author = escape($_POST['post_author']);
    $post_title = escape($_POST['post_title']);  
    $post_cat_id = escape($_POST['post_category']);   
    $post_image = escape($_FILES['image']['name']); 
    $post_tmp_image = escape($_FILES['image']['tmp_name']);
    $post_content = escape($_POST['post_content']);          
    $post_tag = escape($_POST['post_tag']);         
    $post_status = escape($_POST['post_status']); 
        
    move_uploaded_file($post_tmp_image, "images/$post_image"); 
        
    

        $query = "UPDATE post SET ";
        $query .="post_author='$post_author', ";
        $query .="post_title='$post_title', ";
        $query .="post_cat_id='$post_cat_id', ";
        $query .="post_img='$post_image', ";
        $query .="post_date= now(), ";
        $query .="post_content='$post_content', ";
        $query .="post_tag='$post_tag', ";
        $query .="post_comment_count='$post_comment_count', ";
        $query .="post_status='$post_status' ";
        $query .="WHERE post_id='$the_post_id'";
        
        $update_post = mysqli_query($connection,$query);
        
       
        
        
           confirm($update_post);
        
echo "<h5 class='text-success'>post updated succesfully</h5>" ."<a href='../post.php?p_id=$the_post_id'>View live post</a> OR <a href='post.php'>Admin view post</a>";
        
        if(empty($post_image)){
            
            $query = "SELECT * FROM post WHERE post_id='$the_post_id'";
            $select_image = mysqli_query($connection,$query);
            while($row=mysqli_fetch_array($select_image)){
                $post_image = $row['post_img'];
            }
        }
        
        }

    ?>
     
      
       
        
          <form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        
        <label for="">Post Title</label>
        <input value="<?php echo $post_title; ?>" type="text" class="form-control" name="post_title">
        
    </div>
     <div class="form-group">
        
       <select name="post_category" id="">
           <?php 
           
           $query = "SELECT * FROM categories";
                    $select_categories = mysqli_query($connection,$query);
           confirm($select_categories);
                            while($row=mysqli_fetch_assoc($select_categories)){
                                $cat_id = $row['cat_id'];
                                  $cat_title = $row['cat_title'];
                                
                                echo "<option value='$cat_id'>$cat_title</option>";
           
                            }
           ?>
           
           
       </select>
        
    </div>
     <div class="form-group">
        
        <label for="">Post Author</label>
        <input value="<?php echo $post_author; ?>" type="text" class="form-control" name="post_author">
        
    </div>
       <div class="form-group">
        
       <select name="post_status" id="">
           <option value="draft">Draft</option>
           <option value="published">published</option>
           
       </select>
        
    </div>
    <div class="form-group">
        <img width="100px" src="images/<?php echo $post_image; ?>" alt="">
      
        
    </div>
    <div class="form-group">
        
        <input type="file" class="form-control" name="image">
        
    </div>
    <div class="form-group">
        
        <label for="">Post Tag</label>
        <input value="<?php echo $post_tag; ?>" type="text" class="form-control" name="post_tag">
        
    </div>
    <div class="form-group">
        
        <label for="">Post Content</label>
        <textarea class="form-control" name="post_content" id="editor" cols="30" row="10">
        <?php echo $post_content; ?></textarea>
        
    </div>
            <script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
  <div class="form-group">
        
        
        <input class="btn btn-primary" type="submit"  name="update_post" value="update post">
        
    </div>

</form>