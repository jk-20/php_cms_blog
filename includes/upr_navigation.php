
             

             <!-- upper navigation bar starting -->
              
              <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="#"><img  src="../images/finalLogo.PNG" alt="" height="65px" width="150px"></a>
    <img  src="images/finalLogo.PNG" alt="" height="65px" width="150px">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="/gen/">HOME <span class="sr-only">(current)</span></a>
      </li>
    <?php   $query = "SELECT * FROM categories ";
       global $connection;
                        $select_category = mysqli_query($connection,$query);
                             while($row=mysqli_fetch_assoc($select_category)){
                                $cat_id = $row['cat_id'];
                                  $cat_title = $row['cat_title'];  
                                   ?>
    <li class="nav-item">
    <a class="nav-link" href="/gen/category/<?php echo $cat_id ; ?>"><?php echo $cat_title; ?></a>
      </li>
      <?php } ?>
      <!-- <li class="nav-item">
        <a class="nav-link" href="/gen/registration">Registration</a>
      </li> -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="/gen/contact">Contact</a>
      </li> -->
       <li class="nav-item">
        <a class="nav-link" href="/gen/admin">Admin</a>
      </li>
      
    </ul>
<!--                <form method="post">
                <table>
                     
                       <tr>
                         <div class="form-group">
                          <td><input class="form-control" type="text" name="text" id="" placeholder="Enter email">
               
                          </td></div>
                          <div class="form-group">
                          <td><input class="form-control" type="password" name="password" id="" placeholder="Password">
               
                          </td></div>
                          <td><button class="btn btn-primary">Log In</button></td>
                      </tr>
                     
                       <tr>
                          <td>
               
                          </td>
                          <td>
               <a href="Forgotten account?">Forgotten account?</a>
                          </td>
                      </tr>
                  </table>
                     </form> -->
    
  </div>
</nav>
            <?php   
$registration_class = '';
$pagename = basename($_SERVER['PHP_SELF']);
$registration = 'registration.php';
if($pagename == $registration){
    $registration_class = 'active';
}

?>
             
              
              <!-- upper navigation bar ending -->
                   