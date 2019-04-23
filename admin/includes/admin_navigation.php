 <?php   

$dashboard_class = '';
$view_all_post_class = '';
$Categories_class = '';
$pagename = basename($_SERVER['PHP_SELF']);
$dashboard = 'index.php';
$Categories = 'categories.php';
$view_all_post = './post.php';
if($pagename == $dashboard){
   $dashboard_class = 'active';
} else if($pagename == $view_all_post){
    
    $view_all_post_class = 'active';
}else if($pagename == $Categories){
    
    $Categories_class = 'active';
}

?>

                   
             <!-- side navigation bar starting --> 
                    
                   <div class="col-sm-2 col-xs-2">
                    
                    <ul class="navbar-nav nav nav-pills nav-stacked" id="side-menu">
                        <li class="nav-item $dashboard_class">
                            <a class=" nav-link" href="index.php"><i class="fas fa-th-list"></i>Dashboard <span class="sr-only">(current)</span></a>
                        </li>
            
<li class="nav-item">
      <a href="javascript:;"  data-toggle="collapse" data-target="#post_dropdown">
          <i class="fas fa-vote-yea"></i>Post<i class="fas fa-caret-down"></i>
        </a>
        <ul id="post_dropdown" class="collapse">
            <li class="<?php $view_all_post_class?>"><a href="./post.php"><i class="far fa-eye"></i>View all post</a></li>
            <li><a href="post.php?source=add_post"><i class="fas fa-plus"></i>Add post</a></li>
            <li><a href="post.php?source=add_book_post"><i class="fas fa-plus"></i>Add Book post</a></li>
            
            
        </ul>
        </li>


                        <li class="nav-item <?php echo Categories_class; ?>">
                            <a class="nav-link" href="categories.php"><i class="fas fa-tags"></i>Categories</a>
                        </li>
                       
                        <li class="nav-item">
                            <a class="nav-link" href="comments.php"><i class="far fa-comment"></i>Comments</a>
                        </li>
                        <li class="nav-item">
      <a href="javascript:;"  data-toggle="collapse" data-target="#user_dropdown">
      <i class="fas fa-users"></i>User<i class="fas fa-caret-down"></i>
        </a>
        <ul id="user_dropdown" class="collapse">
            <li><a href="users.php"><i class="far fa-eye"></i>View all User</a></li>
            <li><a href="users.php?source=add_user"><i class="fas fa-plus"></i>Add User</a></li>
            
            
        </ul>
        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="../includes/logout.php"><i class="fas fa-sign-out-alt"></i>Log Out</a>
                        </li>

                    </ul>
                </div>
                <!-- side navigation bar starting -->  