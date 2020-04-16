

 <?php include "includes/cat_header.php"?>

           
 
        
<div class="container">
   
    <div class="row">  
      
  <div class="col-sm-12">
    <div class="row">
    <?php 

if(isset($_GET['category'])){

$post_cat_id = $_GET['category'];

if(isset($_SESSION['user_role'])=='admin'){
    
$stmt1 = mysqli_prepare($connection,
"SELECT post_id,post_author,post_title,post_date,post_img,post_content FROM post WHERE post_cat_id = ? ");
}
else{        
$stmt2 = mysqli_prepare($connection,"SELECT post_id,post_author,post_title,post_date,post_img,post_content                                      FROM post WHERE post_cat_id = ? AND post_status = ? ");

                 $published = 'published';
                   
}
if(isset($stmt1)){
    mysqli_stmt_bind_param($stmt1,"i",$post_cat_id);
    mysqli_stmt_execute($stmt1);
mysqli_stmt_bind_result($stmt1, $post_id, $post_author, $post_title, $post_date, $post_img, $post_content);
    $stmt = $stmt1;
    
}else{
    
mysqli_stmt_bind_param($stmt2, "is", $post_cat_id,$published);
    mysqli_stmt_execute($stmt2);
mysqli_stmt_bind_result($stmt2,  $post_id, $post_author, $post_title, $post_date, $post_img, $post_content);
    $stmt = $stmt2;
}





// if(mysqli_stmt_num_rows($stmt) === 0){
    
//      echo "<h5 class='text-center'>NO POST AVAILABLE</h5> ";
// }



while(mysqli_stmt_fetch($stmt)):
                         

?>
      <div class="col-sm-4">
        <br>
        


<div class="card-group">
                 
                  <img class="card-img-top" src="../images/<?php echo $post_img; ?>" alt="">
                  <div class="card-img-overlay">
                  
    <h5 class="card-title text-white"><?php echo"<span class='badge badge-primary text-wrap'>$cat_title</span>"  ; ?></h5></div>
    <div class="card">  
<div class='card-body p-tag'>
<h5 class="card-title post-title">  <?php echo $post_title ?></h5>
 
<p class='card-text'><?php echo substr($post_content,0,70) ;?> </p> 
<a href="/nxtgenmove/post/<?php echo $post_id //post.php?p_id=?>" target="_blank" class='btn btn-primary'>Read more ...</a>





    </div>
    </div> 
     
        
        </div>
        </div>
         <?php endwhile;
       
}else{

header("Location:index.php");

}?>

        </div>
       </div>
       
       
       
       
        
 <!--   main container ending here  -->                                 
</div>
 <?php include "includes/footer.php"?>

   
  <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt, animi, vitae. Perferendis placeat assumenda, minus molestias pariatur eius eveniet, quae optio dolores voluptate ullam facere omnis natus, in quos culpa.</p> -->

