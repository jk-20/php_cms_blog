

<?php 
    if(isset($_POST['create_post'])){
       
        $post_title = escape($_POST['post_title']);
        $post_author = escape($_POST['post_author']);
        $post_category_id = escape($_POST['post_category']);
        $post_status = escape($_POST['post_status']);
        $post_image = escape($_FILES['image']['name']);
        $post_image_temp = escape($_FILES['image']['tmp_name']);
       
        
        $post_tag = escape($_POST['post_tag']);
        $post_content = escape($_POST['post_content']);
        $post_date = date('d-m-y');
        $post_comment_count = 0;
        
      
        move_uploaded_file($post_image_temp,"images/$post_image");
        
$query = "INSERT INTO post(post_cat_id,post_title,post_author,post_date,post_img,post_content,post_tag,post_comment_count,post_status) ";
$query .= "VALUES('$post_category_id','$post_title','$post_author',now(),'$post_image','$post_content','$post_tag','$post_comment_count','$post_status') ";
        $create_post_query = mysqli_query($connection,$query);
        
        
     confirm($create_post_query);
        
        echo "<h5 class='text-success'>post Add succesfully</h5><a href='post.php'>view post</a>";
    
       
    }



?>
   

   
   
   
   <form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        
        <label for="">Post Title</label>
        <input type="text" class="form-control" name="post_title">
        
    </div>
   <div class="form-group">
        <label for="">Category</label><br>
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
       <label for="">Author</label><br>
        
       <select name="post_author" id="">
           <?php 
           
               
                $query = "SELECT * FROM users";
                    $select_categories = mysqli_query($connection,$query);
           confirm($select_categories);
                            while($row=mysqli_fetch_assoc($select_categories)){
                                $user_id = $row['user_id'];
                                  $username = $row['username'];
                                
                                echo "<option value='$username'>$username</option>";
           
                            }
               
           
          
           ?>
           
           
       </select>
        
    </div>
     <div class="form-group">
        
       <select name="post_status" id="">
           <option value="draft">Post Status</option>
           <option value="draft">Draft</option>
           <option value="published">published</option>
           
       </select>
        
    </div>
    <div class="form-group">
        
        <label for="">Post Image</label>
        <input type="file" class="form-control" name="image">
        
    </div>
    <div class="form-group">
        
        <label for="">Post Tag</label>
        <input type="text" class="form-control" name="post_tag">
        
    </div>
    <div class="form-group">
        
    
        <label for="">Post Content</label>
        <textarea class="form-control" name="post_content" id="editor" cols="30" row="10"></textarea>
    

    </div>
        <script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
  <div class="form-group">
        
        
        <input class="btn btn-primary" type="submit"  name="create_post" value="publish post">
        
    </div>

</form>