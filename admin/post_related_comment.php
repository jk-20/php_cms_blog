<?php include "includes/admin_header.php"?>
<?php include "includes/admin_upr_navigation.php"?>


        <div class="container-fluid">
            <div class="row">  
               <!-- side navbar  -->
            <?php include "includes/admin_navigation.php"?>
             <!--   sidenav bar end -->
               
               
               <!-- main area of starting here -->
               
               <div class="col-sm-10 col-xs-10">
                   <h2 class="page-header">
                     Welcome to Admin
                 </h2>
                 <hr>





<?php  
if(isset($_POST['checkboxArray'])){
    
    foreach($_POST['checkboxArray'] as $theCommentId){
        $bulkoptions = $_POST['bulkoptions'];
        
        switch($bulkoptions){
                
            case 'approved' :
            $query = "UPDATE comments SET comment_status = '$bulkoptions' WHERE comment_id ='$theCommentId' ";
                $update_approve_status = mysqli_query($connection,$query);
                break;
                confirm($update_approve_status);
                
                
        case 'unapproved' :
        $query = "UPDATE comments SET comment_status = '$bulkoptions' WHERE comment_id ='$theCommentId' ";
                $update_unapprove_status = mysqli_query($connection,$query);
                break;
                confirm($update_unapprove_status);   
                
            case 'delete' :
            $query = "DELETE FROM comments WHERE comment_id ='$theCommentId' ";
                $update_to_delete_status = mysqli_query($connection,$query);
                confirm($update_to_delete_status); 
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
                  <option value="approved">Approve</option>
                  <option value="unapproved">Unapprove</option>
                  <option value="delete">Delete</option>
                 
                 
             </select></div> 
             <div class="col-xs-4">
                 <input type="submit" name="submit" class="btn btn-success" value="apply">
                 
                 
             </div>
             
         </div>           
                
                      
     <table class="table table-bordered table-hover">
                     <thead>
                         <tr>
                            <th><input id="SelectAllBox" type="checkbox"></th>
                             <th>Id</th>
                             <th>Author</th>
                             <th>E-mail</th>
                             <th>comment</th>
                             <th>Status</th>
                             <th>Date</th>
                             <th>Time</th>
                             <th>Inreponse to</th>
                             
                            <th>Approve</th>
                            <th>Unapprove</th>
                             <th>Delete</th>
                             
                   
                     </thead>
                 
                  <tbody>
                     
    <?php 
                      
$query = "SELECT * FROM comments WHERE comment_post_id =". mysqli_real_escape_string($connection,$_GET['id']) .""; 
    $select_comment = mysqli_query($connection,$query);
                      
    while($row=mysqli_fetch_assoc($select_comment)) {
                                 
    $comment_id = $row['comment_id'];  
    $comment_post_id = $row['comment_post_id'];    
    $comment_author = $row['comment_author'];
    $comment_email = $row['comment_email']; 
    $comment_content = substr($row['comment_content'],0,50); 
    $comment_status = $row['comment_status']; 
    $comment_date = $row['comment_date'];          
    $comment_time = $row['comment_time'];          
   
    
     
    echo "<tr>"; ?>
    <td><input type="checkbox" class="checkBoxes" name="checkboxArray[]" value="<?php echo $comment_id; ?> "></td>  <?php 
    echo "<td>$comment_id</td>";
    echo "<td>$comment_author</td>";
    echo "<td> $comment_email</td>";
        
        
   //   $query = "SELECT * FROM categories WHERE cat_id='$post_cat_id'";
                 //   $select_categories_id = mysqli_query($connection,$query);
                           // while($row=mysqli_fetch_assoc($select_categories_id)){
                               // $cat_id = $row['cat_id'];
                             //     $cat_title = $row['cat_title'];   
                                    //echo "<td>$cat_title</td>";
                              //  }
 
     echo "<td>$comment_content</td>"; 
         echo "<td>$comment_status</td>";
    echo "<td>$comment_date</td>";
 echo "<td>$comment_time</td>";
    //inresponse to
$query = "SELECT * FROM post WHERE post_id ='$comment_post_id' ";
$select_post_id_query = mysqli_query($connection,$query);
        while($row=mysqli_fetch_assoc($select_post_id_query)){
            
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
             
            
            echo "<td><a href='../post.php?p_id=$post_id' target='_blank'>$post_title</a></td>";}
 //query for approve comments....................................
        if(isset($_GET['approve'])){
            
            $the_comment_id = escape($_GET['approve']);
 $query = "UPDATE comments SET comment_status= 'approved' WHERE comment_id =$the_comment_id ";
            $approve_comment_query= mysqli_query($connection,$query);
            
            header("Location:post_related_comment.php?id=" .$_GET['id'] ."");
        }
        
        
        
         echo "<td><a href='post_related_comment.php?approve=$comment_id&id=" .$_GET['id']. "'>approve</a></td>"; 
        
//query for unapprove comments............
        
        if(isset($_GET['unapprove'])){
            
            $the_comment_id = escape($_GET['unapprove']);
 $query = "UPDATE comments SET comment_status= 'unapproved' WHERE comment_id =$the_comment_id ";
            $unapprove_comment_query= mysqli_query($connection,$query);
            
            header("Location:post_related_comment.php?id=" .$_GET['id'] ."");
        }
        
        
         echo "<td><a href='post_related_comment.php?unapprove=$comment_id&id=" .$_GET['id']. "'>unapprove</a></td>"; 
   
   // echo "<td><a href='post.php?source=edit_post&p_id=$post_id'>Edit</a></td>"; 
    echo "<td><a href='post_related_comment.php?delete=$comment_id&id=" .$_GET['id']. "'>Delete</a></td>";    
    echo "</tr>";
    
    ?>
                  
                    
                  </tbody>
                  
                  <?php } ?>
                   </table>
</form>
 <?php 

if(isset($_GET['delete'])){
    $the_comment_id = escape($_GET['delete']);
    
    $query = "DELETE FROM comments WHERE comment_id='$the_comment_id'";
    $delete_query = mysqli_query($connection,$query);
    header("Location: post_related_comment.php?id=" .$_GET['id'] ."");
    
}




?>
                   
               </div>
                  <!-- main area of ending here -->     
     
                       <!-- main row ending here -->
                       </div>
                
         <!--   main container ending here  -->                                 
    </div>
    
     <!-- footer starting -->
     
     <?php include "includes/admin_footer.php"?>
