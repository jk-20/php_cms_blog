<?php 
    if(isset($_POST['add_user'])){
       
        $user_name = escape($_POST['user_name']);
        $user_password = escape($_POST['user_password']);
        $user_firstname = escape($_POST['user_firstname']);
        $user_lastname = escape($_POST['user_lastname']);
        $user_email = escape($_POST['user_email']);
        $user_image = escape($_FILES['user_image']['name']);
        $user_role = escape($_POST['user_role']);
       
        //$post_date = date('d-m-y');

       // move_uploaded_file($post_image_temp,"images/$post_image");
         
    $user_name = mysqli_real_escape_string($connection,$user_name);
    $user_email = mysqli_real_escape_string($connection,$user_email);
    $user_password = mysqli_real_escape_string($connection,$user_password);
    
       $crypt_password = password_hash($user_password,PASSWORD_BCRYPT,[10]);
        
        
$stmt = mysqli_prepare($connection,"INSERT INTO users(username,user_password,user_firstname,user_lastname,user_email,user_image,user_role) VALUES(?,?,?,?,?,?,?) ");
        
mysqli_stmt_bind_param($stmt, "sssssss",$user_name,$crypt_password,$user_firstname,$user_lastname,$user_email,$user_image,$user_role);
        
        mysqli_stmt_execute($stmt);
        
        
     confirm($stmt);
        
        
        
echo "<h5 class='text-success'>user created successfully.</h5>" . " " . "<a href='users.php'>view user</a>";
        
           mysqli_stmt_close($stmt);
    }



?>
   
   <form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        
        <label for="">Username</label>
        <input type="text" class="form-control" name="user_name">
        
    </div>
     <div class="form-group">
        
        <label for="">Password</label>
        <input type="password" class="form-control" name="user_password">
        
    </div>
   
     <div class="form-group">
        
        <label for="">First Name</label>
        <input type="text" class="form-control" name="user_firstname">
        
    </div>
     <div class="form-group">
        
        <label for="">Last Name</label>
        <input type="text" class="form-control" name="user_lastname">
        
    </div>
    <div class="form-group">
        
        <label for="">E-mail</label>
        <input type="email" class="form-control" name="user_email">
        
    </div>
    <div class="form-group">
        
        <label for="">Image</label>
        <input type="file" class="form-control" name="user_image">
        
    </div>
   
   <div class="form-group">
        
       <select name="user_role" id="">
           <option value="admin">admin</option>
           <option value="user">user</option>
           <option value="visitor">visitor</option>
       </select>
        
    </div>
    
  <div class="form-group">
        
        
        <input class="btn btn-primary" type="submit"  name="add_user" value="Add User">
        
    </div>

</form>