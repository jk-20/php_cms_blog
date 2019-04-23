


<?php include "includes/header.php";?>
<?php include "includes/upr_navigation.php";?>
<br>


       
       <div class="container">
           <div class="row">
               <div class="col-sm-4">
                   
                   
                   
               </div>
                <div class="col-sm-4">
                   <h4>Welcome Admin</h4><br>
                     <form action="includes/login.php" method="post" enctype="multipart/form-data">

            <div class="form-group">
            
            
        <input type="text" name="username" class="form-control" placeholder="enter username">
            </div>
            <div class="input-group">
                <input name="password" placeholder="enter password" type="password" class="form-control">
                <span class="input-group-btn">

                    <button class="btn btn-primary" name="login" type="submit">
                     Login
                    </button>
                </span>
            </div>

        </form>
                   
               </div>
               
               
           </div>
       </div>
       
       
       
       
<?php include "includes/footer.php";?>


