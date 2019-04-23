<?php  
if(isset($_POST['checkboxArray'])){
    
    foreach($_POST['checkboxArray'] as $PostValueId){
        $bulkoptions = $_POST['bulkoptions'];
        
        switch($bulkoptions){
                
            case 'published' :
                $query = "UPDATE post SET post_status = '$bulkoptions' WHERE post_id ='$PostValueId' ";
                $update_to_published_status = mysqli_query($connection,$query);
                confirm($update_to_published_status);
                echo "<h6 class='text-success text-center'>Post Published successfully.</h6>";
                break;
                
            case 'draft' :
                $query = "UPDATE post SET post_status = '$bulkoptions' WHERE post_id ='$PostValueId' ";
                $update_to_draft_status = mysqli_query($connection,$query);
                confirm($update_to_draft_status);
                echo "<h6 class='text-success text-center'>Post Draft successfully.</h6>";
                break;
                
                case 'delete' :
                $query = "DELETE FROM post WHERE post_id ='$PostValueId' ";
                $update_to_delete_status = mysqli_query($connection,$query);
                confirm($update_to_delete_status); 
                echo "<h6 class='text-success text-center'>Post Delete successfully.</h6>";
                break;
                  
            
                
        }
    }
    
}


?>
       
       
       
       <form action="" method="post">
        <div class="row">
         <div id="blukoptions" class="col-xs-4">
             
             <select class="form-control" name="bulkoptions" id="">
                  <option value="">Select options</option>
                  <option value="published">publish</option>
                  <option value="draft">Draft</option>
                  <option value="delete">Delete</option>
                 
                 
             </select></div> 
             <div class="col-xs-4">
                 <input type="submit" name="submit" class="btn btn-success" value="apply">
                 <a href="post.php?source=add_post" class="btn btn-primary">Add New</a>
                 
             </div>
             
         </div>           
                    
               <br>       
                       
 <table class="table table-bordered table-hover">

    
                     <thead>
                         <tr>
                            <th><input id="SelectAllBox" type="checkbox"></th>
                             <th>Id</th>
                             <th>Author</th>
                             <th>Title</th>
                             <th>Category</th>
                             <th>Date</th>
                             <th>Image</th>
                             <th>Content</th>
                              <th>Tag</th>
                             <th>Comments</th>
                             <th>Status</th>
                             <th>View Post</th>
                             <th>Edit</th>
                             <th>Delete</th>
                             <th>Views</th>
                   
                     </thead>
                 
                  <tbody>
                     
    <?php 
    $query = "SELECT * FROM post";
    $select_post = mysqli_query($connection,$query);
    while($row=mysqli_fetch_assoc($select_post)){
                                 
    $post_id = $row['post_id'];        
    $post_author = $row['post_author'];
    $post_title = $row['post_title'];  
    $post_cat_id = $row['post_cat_id'];  
    $post_date = $row['post_date'];          
    $post_img = $row['post_img'];          
    $post_content = substr($row['post_content'],0,50);          
    $post_tag = $row['post_tag'];          
    $post_comment_count = $row['post_comment_count'];          
    $post_status = $row['post_status'];          
    $post_views_count = $row['post_views_count'];          
    
     
    echo "<tr>";
        
        ?>
        
<td><input type="checkbox" class="checkBoxes" name="checkboxArray[]" value="<?php echo $post_id; ?> "></td>
        <?php
    echo "<td>$post_id</td>";
    echo "<td>$post_author</td>";
    echo "<td>$post_title</td>";
        
        
      $query = "SELECT * FROM categories WHERE cat_id='$post_cat_id'";
                    $select_categories_id = mysqli_query($connection,$query);
                            while($row=mysqli_fetch_assoc($select_categories_id)){
                                $cat_id = $row['cat_id'];
                                  $cat_title = $row['cat_title'];   
                                    echo "<td>$cat_title</td>";
                                
                                }
        
    
        
                            
        
        
        
        
    echo "<td>$post_date</td>";
    echo "<td><img class='img-responsive' src='images/$post_img' alt='' height='50px' weight='50px'></td>";
    echo "<td>$post_content</td>";
    echo "<td>$post_tag</td>";
        
        $query = "SELECT * FROM comments WHERE comment_post_id = '$post_id' ";
        $send_comment_query = mysqli_query($connection,$query);
        
        
        
        $row = mysqli_fetch_array($send_comment_query);
        $comment_id = $row['comment_id'];
        
        $count_comment = mysqli_num_rows($send_comment_query);
        
    echo "<td> <a href='post_related_comment.php?id=$post_id' target='_blank'>$count_comment</a></td>";
    echo "<td>$post_status</td>";
    echo "<td><a href='../post.php?p_id=$post_id'>View post</a></td>"; 
    echo "<td><a href='post.php?source=edit_post&p_id=$post_id'>Edit</a></td>"; 
    echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete?'); \" href='post.php?delete=$post_id'>Delete</a></td>";  
    echo "<td><a href='post.php?reset=$post_id'>$post_views_count</a></td>";
    echo "</tr>";
    
    ?>
                  
                    
                  </tbody>
                
                  <?php } ?>
                   </table>
                   </form>
 <?php 

if(isset($_GET['delete'])){
    $the_post_id = escape($_GET['delete']);
    
    $query = "DELETE FROM post WHERE post_id='$the_post_id'";
    $delete_query = mysqli_query($connection,$query);
    header("Location: post.php");
     echo "<h6 class='text-success text-center'>Post Delete successfully.</h6>";
    
}

if(isset($_GET['reset'])){
    $the_post_id = escape($_GET['reset']);
    
    $query = "UPDATE post SET post_views_count = 0 WHERE post_id = ".mysqli_real_escape_string($connection,$_GET['reset']) . " ";
    //$query = "UPDATE post SET post_views_count = 0 WHERE post_id = '$the_post_id'";
    $reset_query = mysqli_query($connection,$query);
    header("Location: post.php");
     echo "<h6 class='text-success text-center'>Post Reset successfully.</h6>";
    
}




?>
                  