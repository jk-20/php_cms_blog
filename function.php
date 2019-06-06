<?php 
// data secure
function escape($string){
    
    global $connection;
    return mysqli_real_escape_string($connection, trim($string));
    
}




?>

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

/******************* helper functions *******************/

function clean($string){
    return htmlentities($string);
}
 
function redirect($location){
return header("Location: {$location}");
     
}

function set_message($message){
    if(!empty($message)){
        $_SESSION['message'] = $message;
    }else{
        $message = "";
    }
}

function display_message(){
  if(isset($_SESSION['message'])){
        echo $_SESSION['message'];
      unset($_SESSION['message']);
  }
}


function token_generator(){
    $token = $_SESSION['token'] = md5(uniqid(mt_rand(),true));
    return $token;
}

?>
<?php 

     /********************Form validation****/

function validation_error($error_message){
    $error_message = <<<DELIMITER
    <div class="alert alert-danger" role="alert">$error_message</div>
  
DELIMITER;
    return  $error_message;
}
/*************************** Validation user function *******************/
function validate_user_registration(){
    $error = [];
    $min = 3;
    $max = 20;
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        
  
        $username   = clean($_POST['username']);
        $email      = clean($_POST['email']);
        $password   = clean($_POST['password']);
      
        if(email_exits($email)){
            $error[] = "E-mail already exits try with other one";
        }
        
         if(strlen($email)<$max){
        $error[] = "E-mail should be 20 character long";
    }
          if(strlen($username)<$min){
        $error[] = "Username can not be less than 3 character";
    }
         if(strlen($username)>$max){
        $error[] = "Username can not be greater than 20 character";
    }
        if(username_exits($username)){
            $error[] = "Username already exits try with other one";
        }
    if(!empty($error)){
        foreach($error  as $error){
            echo validation_error($error);
        }
    }else{
        if(register_user($username,$email,$password)){
        set_message("User registered successfully! check your Inbox or Spam folder to activation link ");
            redirect("index.php");
        }else{
             set_message("Sorry!! we couldn't register the user");
            redirect("index.php");
        }
    }
    
}
    
}


function email_exits($email){
    $sql = "SELECT id FROM users WHERE email = '$email'";
    $result = query($sql);
    if(row_count($result)==1){
        return true;
    }else{
        return false;
    }
}
function username_exits($username){
    $sql = "SELECT id FROM users WHERE username = '$username'";
    $result = query($sql);
    if(row_count($result)==1){
        return true;
    }else{
        return false;
    }
}



function send_email($email,$subject,$msg,$header){
    
    return mail($email,$subject,$msg,$header);
    
}
/*************************** Register user function *******************/

function register_user($username,$email,$password){
    $username = escape($username);
    $email = escape($email);
    $password = escape($password);
    
    if(email_exits($email)){
        return false;
    }elseif(username_exits($username)){
        return false;
    }else{
        
        $password = md5($password);
        $validation_code = md5($username + microtime());
       
        
        $sql = "INSERT INTO users(username,email,password,validation,active) ";
    $sql.= "VALUES('$username','$email','$password','$validation_code','0')";
        
        $result = query($sql);
        confirm($result);
        
         $subject = "Activate Account";
$msg = "please click on link below to activate account 
http://localhost/loginsystem/activate.php?email=$email&validation=$validation_code";
        $header = "From:noreply@nxtgenmove.com";
        
send_email($email,$subject,$msg,$header);
        
        return true;
        

        
    }
    
    
    
}
/*************************** activate  user function *******************/

function activate_user(){
 
 
 if($_SERVER['REQUEST_METHOD'] == "GET"){
     if(isset($_GET['email'])){
          $email = clean($_GET['email']);
          $validation_code = clean($_GET['validation']);

$sql= "SELECT id FROM users WHERE email= '".escape($_GET['email'])."' AND validation = '".escape($_GET['validation'])."' ";
        $result = query($sql);
        confirm($result);
            
         if(row_count($result) == 1){
             
             $sql2 = "UPDATE users SET active= 1 ,validation= 0 WHERE email='".escape($email)."' AND validation='".escape($validation_code)."' ";
             $result2 = query($sql2);
             confirm($result2);
             set_message("<p class='text-success text-center'>Your account has been activated please login<p>");
             redirect("login.php");
     
         }
         else{
            set_message("<p class='text-danger text-center'>Sorry!! account couldn't be active now<p>");
             redirect("login.php");
         }
         
     }
 }
 
 }







?>
 
 





