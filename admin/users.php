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
                   
  if(isset($_GET['source'])){
      
    $source =  escape($_GET['source']);  
  }else
  {
    $source = '';
}
switch($source){
        
        case 'add_user';
        include "includes/add_user.php";
        break;
        
        case 'edit_user';
        include "includes/edit_user.php";
        break;
        
   
    default:
        include "includes/view_all_users.php";
        break;
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
