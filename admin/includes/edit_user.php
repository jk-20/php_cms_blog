<?php 

if(isset($_GET['edit_user'])){
    
 $the_user_id = $_GET['edit_user'];
    
$stmt = mysqli_prepare($connection,"SELECT user_id,username,user_password,user_firstname,user_lastname,user_email,user_image,user_role FROM users WHERE user_id = ? ");
    
    mysqli_stmt_bind_param($stmt,"i",$the_user_id);
    mysqli_stmt_execute($stmt);
     mysqli_stmt_bind_result($stmt, $user_id, $username, $user_password, $user_firstname, $user_lastname, $user_email, $user_image, $user_role);
    
 confirm($stmt);
while(mysqli_stmt_fetch($stmt)):
    
      
endwhile;
mysqli_stmt_close($stmt);
    
}


    if(isset($_POST['edit_user'])){
        $user_password = $_POST['user_password'];
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_role = $_POST['user_role'];
        $username = $_POST['username'];
        $user_email = $_POST['user_email'];
        //$user_image = $_FILES['user_image']['name'];
        
       
        //$post_date = date('d-m-y');
        
        if(!empty($user_password)){
            
            $stmt = mysqli_prepare($connection,"SELECT user_password FROM users WHERE user_id = ? ");
            mysqli_stmt_bind_param($stmt,'i',$the_user_id);
             mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt,$user_password);
            
            confirm($stmt);
            while(mysqli_stmt_fetch($stmt)):
            $db_user_password = 'user_password';
            endwhile;
            mysqli_stmt_close($stmt);
        
//            
//            $row = mysqli_fetch_array($get_user_query);
//            $db_user_password = $row['user_password'];
        }

        if($db_user_password != $user_password){
            
            
        $crypt_password = password_hash($user_password,PASSWORD_BCRYPT,[10]);
        }


       // move_uploaded_file($post_image_temp,"images/$post_image");
        
        
            
$stmt = mysqli_prepare($connection,"UPDATE users 
SET user_firstname=?,user_lastname=?,user_role=?,username=?,user_email=?,user_password=? WHERE user_id = ? ");
    
 mysqli_stmt_bind_param($stmt,"ssssssi", $user_firstname, $user_lastname, $user_role, $username, $user_email, $user_password, $the_user_id);
    mysqli_stmt_execute($stmt);
//     mysqli_stmt_bind_result();
    
 confirm($stmt);
        
        mysqli_stmt_close($stmt);
    }


?>
   
   <form action="" method="post" enctype="multipart/form-data">
    
    
    
   
     <div class="form-group">
        
        <label for="">First Name</label>
        <input type="text" value="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname">
        
    </div>
     <div class="form-group">
        
        <label for="">Last Name</label>
        <input type="text" value="<?php echo $user_lastname; ?>" class="form-control" name="user_lastname">
        
    </div>
    <div class="form-group">
        
       <select name="user_role" id="">
           <option value="<?php echo $user_role;?>"><?php echo $user_role;?></option>
           
           <?php
        if($user_role == 'admin'){
            echo "<option value='visitor'>visitor</option>";
        }else{
            echo "<option value='admin'>admin</option>";
        }
        
        
        
        ?>
       </select>
        
    </div>
    <div class="form-group">
        
        <label for="">E-mail</label>
        <input type="email" value="<?php echo $user_email; ?>" class="form-control" name="user_email">
        
    </div>
    <div class="form-group">
        
        <label for="">Username</label>
        <input type="text" value="<?php echo  $username; ?>" class="form-control" name="username">
        
    </div>
     <div class="form-group">
        
        <label for="">Password</label>
        <input type="password" value="<?php echo  $user_password; ?>"  class="form-control" name="user_password">
        
    </div>
   
   
   
    
  <div class="form-group">
        
        
        <input class="btn btn-primary" type="submit"  name="edit_user" value="Update">
        
    </div>

</form>