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
                   if(isset($_SESSION['username'])){
                        $username = escape($_SESSION['username']);
                       
                       $query = "SELECT * FROM users WHERE username = '$username' ";
                       
                       $select_profile_query = mysqli_query($connection,$query);
                       
                       while($row = mysqli_fetch_array( $select_profile_query)){
                           
    $user_id = $row['user_id'];        
    $username = $row['username'];        
    $user_firstname = $row['user_firstname'];        
    $user_lastname = $row['user_lastname'];        
    $user_email = $row['user_email'];        
    $user_image = $row['user_image'];        
    $user_role = $row['user_role'];  
                           
                           
                       }
                       
                       
                   }
                   
                   
                   ?>
                   <?php
                   
                    if(isset($_POST['edit_user'])){
       
        
        $user_password = escape($_POST['user_password']);
        $user_firstname = escape($_POST['user_firstname']);
        $user_lastname = escape($_POST['user_lastname']);
        $user_role = escape($_POST['user_role']);
        $username = escape($_POST['username']);
        $user_email = escape($_POST['user_email']);
        //$user_image = $_FILES['user_image']['name'];
        
       
        //$post_date = date('d-m-y');

       // move_uploaded_file($post_image_temp,"images/$post_image");
        
 $query = "UPDATE users SET ";
        $query .="user_firstname='$user_firstname', ";
        $query .="user_lastname='$user_lastname', ";
        $query .="user_role='$user_role', ";
        $query .="username='$username', ";
        $query .="user_email='$user_email', ";
        $query .="user_password='$user_password' ";
       
        $query .="WHERE username='$username'";
        
        $edit_user_query = mysqli_query($connection,$query);
        
           confirm($edit_user_query);
        
    
        
        
        
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
           <option value="">select options</option>
           <option value="admin">admin</option>
           <option value="user">user</option>
           <option value="visitor">visitor</option>
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
        <input type="password"  class="form-control" name="user_password">
        
    </div>
   
   
   
    
  <div class="form-group">
        
        
        <input class="btn btn-primary" type="submit"  name="edit_user" value="Update profile">
        
    </div>

</form>
             
             
             
             
               </div>
                  <!-- main area of ending here -->     
     
                       <!-- main row ending here -->
                       </div>
                
         <!--   main container ending here  -->                                 
    </div>
    
     <!-- footer starting -->
     
     <?php include "includes/admin_footer.php"?>
