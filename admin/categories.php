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
                 <div class="row">
                  
                 <div class="col-sm-6 col-xs-6">
                    
                    <?php insert_category(); ?>
      
                    <!-- Add category form -->
                    
                     <form action="" method="post">
                         
                         <div class="form-group">
                           <label for="cat-title">Add Category</label>
                            <input type="text" class="form-control" name="cat_title">
                         </div>
                         <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="submit" value="Add category">
                         </div>
                     </form>
                     
                    <!--  UPdate category  form -->
                                         
                                         
        <?php // update and include category
                     
             if(isset($_GET['edit'])) {
                 $cat_id = escape($_GET['edit']);
                 include "includes/update_categories.php";
             }       
        ?>
 
                 </div>
                    
                    <div class="col-sm-6 col-xs-6">
                    
                     
                     <table class="table table-bordered table-hover">
                         <thead>
                             <tr>
                                 <th>Id</th>
                                 <th>Category Title</th>
                             </tr>
                         </thead>
                         <tbody>
                              <!-- FIND ALL CATEGORIES -->
                            <?php find_all_categories(); ?>
  
                             <!-- delete querey -->
                    <?php delete_category();?>
                        
                         </tbody>
                     </table>
                 </div>
               
                 </div>
                   
               </div>
                  <!-- main area of ending here -->     
     
                       <!-- main row ending here -->
                       </div>
                
         <!--   main container ending here  -->                                 
    </div>
    
     <!-- footer starting -->
     
     <?php include "includes/admin_footer.php"?>
