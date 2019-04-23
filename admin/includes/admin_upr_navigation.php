<?php   
$registration_class = '';
$pagename = basename($_SERVER['PHP_SELF']);
$registration = 'registration.php';
if($pagename == $registration){
    $registration_class = 'active';
}

?>
             

             <!-- upper navigation bar starting -->
              
              <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="#"><img  src="../images/finalLogo.PNG" alt="" height="60px" width="130px"></a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../index.php" target="_blank">Blog</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../registration.php">Registration</a>
      </li>
      
      
      
      
    </ul>
    <li class="nav-item">
        <a class="nav-link" href="profile.php"><i style="font-size:40px;" class="fas fa-user-circle"></i>profile   <i class="fas fa-edit"></i></a>
                       
                       
                       <p>hello<span style="color:green;font-size:22px;"><?php echo $_SESSION['username'] ; ?></span></p>
                        </li>
                        <!-- <li class="nav-item text-success">Online users <?php //echo user_online() ; ?></li> -->
                         <li class="nav-item text-success">Online users<span class="useronline"></span></li> 
                        <!-- <li class="nav-item"><?php //echo user_online(); ?></li> -->
    <!-- 
     <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> -->
    
  </div>
</nav>
             
              
              <!-- upper navigation bar ending -->
                   