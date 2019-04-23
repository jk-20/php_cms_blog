<?php  
if(isset($_POST['checkboxArray'])){
    
    foreach($_POST['checkboxArray'] as $theUserId){
        $bulkoptions = $_POST['bulkoptions'];
        
        switch($bulkoptions){
//                
//            case 'approved' :
//            $query = "UPDATE comments SET comment_status = '$bulkoptions' WHERE comment_id ='$theCommentId' ";
//                $update_approve_status = mysqli_query($connection,$query);
//                break;
//                confirm($update_approve_status);
//                
//                
//        case 'unapproved' :
//        $query = "UPDATE comments SET comment_status = '$bulkoptions' WHERE comment_id ='$theCommentId' ";
//                $update_unapprove_status = mysqli_query($connection,$query);
//                break;
//                confirm($update_unapprove_status);   
//                
            case 'delete' :
            $query = "DELETE FROM users WHERE user_id ='$theUserId' ";
                $update_to_delete_status = mysqli_query($connection,$query);
                confirm($update_to_delete_status); 
                break;
                
                case 'visitor' :
            $query = "UPDATE users SET user_role = '$bulkoptions' WHERE user_id ='$theUserId' ";
                $update_to_visitor_status = mysqli_query($connection,$query);
                confirm($update_to_visitor_status); 
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
                  <!-- <option value="approved">Approve</option> -->
                  <option value="visitor">visitor</option>
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
                             <th>User Id</th>
                             <th>Username</th>
                             <th>First Name</th>
                             <th>Last Name</th>
                             <th>Email</th>
                             <th>Image</th>
                             <th>Role</th>
                              
                              <th>Edit</th>
                              <th>Delete</th>
                             
                   
                     </thead>
                 
                  <tbody>
                     
    <?php 
    $query = "SELECT * FROM users";
    $select_post = mysqli_query($connection,$query);
    while($row=mysqli_fetch_assoc($select_post)){
                                 
    $user_id = $row['user_id'];        
    $username = $row['username'];        
    $user_firstname = $row['user_firstname'];        
    $user_lastname = $row['user_lastname'];        
    $user_email = $row['user_email'];        
    $user_image = $row['user_image'];        
    $user_role = $row['user_role'];        
            
     

    echo "<tr>";
            ?>
<td><input type="checkbox" class="checkBoxes" name="checkboxArray[]" value="<?php echo $user_id; ?> "></td>
<?php 
    echo "<td>$user_id</td>";
    echo "<td>$username</td>";
    echo "<td>$user_firstname</td>";
    echo "<td>$user_lastname</td>";
    

    echo "<td>$user_email</td>";
 echo "<td><img class='img-responsive' src='images/$user_image' alt='' height='50px' weight='50px'></td>";        
    echo "<td>$user_role</td>";
   
    echo "<td><a href='users.php?source=edit_user&edit_user=$user_id'>Edit</a></td>"; 
    echo "<td><a href='users.php?delete=$user_id'>Delete</a></td>";    
    echo "</tr>";
    
    ?>
                  
                    
                  </tbody>
                  
                  <?php } ?>
                   </table>
</form>
 <?php 

if(isset($_GET['delete'])){
    $the_user_id = escape($_GET['delete']);
    
    $query = "DELETE FROM users WHERE user_id='$the_user_id'";
    $delete_user_query = mysqli_query($connection,$query);
    header("Location: users.php");
    
}




?>
                   