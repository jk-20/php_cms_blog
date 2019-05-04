<?php function confirm($result){
    global $connection;
    
       if(!$result){
            die("Query Failed..!".mysqli_error($connection));
        }
}


?>
 

 <?php function insert_category() {
  
    global $connection;
      if(isset($_POST['submit'])){
                          $cat_title = $_POST['cat_title'];
                            if($cat_title == "" || empty($cat_title)){
                              echo "This field should not be empty";
                          }else{
    $stmt = mysqli_prepare($connection,"INSERT INTO categories(cat_title) VALUES(?) ");
                                
                    mysqli_stmt_bind_param($stmt , 's',$cat_title);  
                                mysqli_stmt_execute($stmt);
                            
                              
                              if(!$stmt){
                                  die('query failed'.mysqli_error($connection));
                                  
                              }
                          }
                      }
                     
}


?>
<?php function delete_category(){
    global $connection;
    
    if(isset($_GET['delete'])){
                                 $cat_id = $_GET['delete'];
                    $query = "DELETE FROM categories WHERE cat_id='$cat_id'";
                        $delete_query = mysqli_query($connection,$query);
                        header("Location: categories.php");
                                
                                 
                             }
}

?>

 



<?php function find_all_categories(){
    
    global $connection;
        $query = "SELECT * FROM categories";
                    $select_categories = mysqli_query($connection,$query);
                             while($row=mysqli_fetch_assoc($select_categories)){
                                 
                                 $cat_id = $row['cat_id'];
                                  $cat_title = $row['cat_title'];
                                 
                                 echo "<tr>";
                                 echo "<td>{$cat_id}</td>";
                                  echo "<td>{$cat_title}</td>";
          echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
                                echo " </tr>";
                                 
                             }
                             
}



?>
  <?php   function user_online(){
     global $connection;
     if(isset($_GET['onlineuser'])){
         
         if(!$connection)
         {
             session_start();
             include("../includes/db.php");
             
             
 $session = session_id();
$time = time();
$time_out = 10;
$time_out = $time - $time_out;

$query = "SELECT * FROM useronline WHERE session = '$session'";
$send_query = mysqli_query($connection,$query);
$count = mysqli_num_rows($send_query);
if($count == NULL){
    mysqli_query($connection, "INSERT INTO useronline(session,time) VALUES('$session','$time') ");
}else
{
        mysqli_query($connection, "UPDATE useronline SET time = '$time' WHERE session = '$session' ");
        }
    $user_online_query = mysqli_query($connection,"SELECT * FROM useronline WHERE time > '$time_out' ");
    echo $count_users = mysqli_num_rows($user_online_query);
             
         }
    
    
   

         }// online user ending get request
                    }
user_online();
?>



<?php 
// data secure
function escape($string){
    global $connection;
    return mysqli_real_escape_string($connection, trim($string));
    
}


?>




<?php 
// count function on index.php 
function recordCount($table){
    global $connection;
    
$query = "SELECT * FROM " . $table;
$select_all_post = mysqli_query($connection,$query);
$result = mysqli_num_rows($select_all_post);
    confirm($result);
    return $result;
}



?>
<?php 

// check status diagram 
function checkStatus($table,$column,$status){
    global $connection;
       $query = "SELECT * FROM $table WHERE $column = '$status' ";
        $result = mysqli_query($connection,$query);
    confirm($result);
        return mysqli_num_rows($result );
}


?>
<?php  function login(){
    global $connection;

if(isset($_SESSION['user_role'])){
    if($_SESSION['user_role'] =='admin'){
        return true;
    }
}

}

function confirm_login(){
    global $connection;
    if(!login()){
         echo  "Login Required !";
        header("Location: ../admin.php");
    }
}




?>



