

<?php

// comment form
function create_comment_form(){
    global $connection;
    
           if(isset($_POST['create_comment'])){
                   
                   $the_post_id = escape($_GET['p_id']);
                   $comment_author = escape($_POST['comment_author']);
                   $comment_email = escape($_POST['comment_email']);
                   $comment_content = escape($_POST['comment_content']);
                   date_default_timezone_set('Asia/Calcutta');
                   $time = time();
                   $comment_time = strftime("%H:%M:%S",$time);
                   if(!empty($comment_author) && !empty($comment_email) && !empty($comment_content)){
                       
        $query = "INSERT INTO comments(comment_post_id,comment_author,comment_email,comment_content,comment_status,comment_date,comment_time ) ";
$query .= "VALUES('$the_post_id','$comment_author','$comment_email','$comment_content','unapprove',now(),'$comment_time') ";
                   
                   
                   
                   $create_comment_query = mysqli_query($connection,$query);
                   
                   echo "<h5 class='text-success'>comment sent succesfully</h5>";
                       
                   }else{
                       
                       echo "<script>alert('Field can not be empty')</script>";
                   }
                   
                   

                   
                
                   
                   
                   //  query for increase comment count.........
            
            //$query_for_comment_count = "UPDATE post SET post_comment_count = post_comment_count + 1 ";
            //$query_for_comment_count .= "WHERE post_id = $the_post_id";
            //$update_comment_count = mysqli_query($connection,$query_for_comment_count);
        
        
     //confirm($create_comment_query);
        
               }
}





?>

<?php 

// comments show query
function show_comment(){
    
    
    
    global $connection;
    
    
    $the_post_id = $_GET['p_id'];
    $query = "SELECT * FROM comments WHERE comment_post_id= $the_post_id ";
        $query .= "AND comment_status = 'approved' ";
        $query .= "ORDER BY comment_id DESC";
        $select_comment_query = mysqli_query($connection,$query);
        if(!$select_comment_query){
            die('Query failed'.mysqli_error($connection));
        }
        while($row=mysqli_fetch_array($select_comment_query)){
            
            $comment_date = $row['comment_date'];
            $comment_content = $row['comment_content'];
            $comment_author = $row['comment_author'];
            $comment_time = $row['comment_time'];



   echo " <div class='card-header'><h5><i class='fas fa-user-tie text-primary'></i>
                      $comment_author ";
                    echo "<small>  $comment_date  </small>"; 
                    echo " <small> $comment_time </small>";
                     
                    echo "</h5>";
                      echo "<i class='fas fa-comments text-success'></i>";
                       echo  $comment_content ."</div>"; 
                   
                   
                   }
                   
                     }
    
    

?>
<?php

function login(){
    
    global $connection;
    
    if(isset($_SESSION['user_role'])){
    if($_SESSION['user_role'] !=='admin'){
        header("Location: /gen/");
    }else{
        header("Location: ../admin/");
    }
}
    
}


?>





<?php






?>
 
 





