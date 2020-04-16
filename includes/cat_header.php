
<?php session_start(); ?>
<?php include "db.php"; ?>
<?php include "function.php"; ?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Stylish&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Noto+Sans&display=swap" rel="stylesheet">
<!-- <script src="https://kit.fontawesome.com/5033a2fd8c.js"></script> -->

    <title>tech_blog</title>
    <style>
    h1{
      font-family: 'Stylish', sans-serif;
    }
    body{
      font-family: 'Noto Sans', sans-serif;
      font-size: 19px;
            letter-spacing:0.7px;
      
    }
    .vl {
  border-left: 1px solid skyblue;
  height: 1000px;
 .three-card{
   

  font-size:22px;
  font-weight: bold;

 }
 .datetime {
   font-size:2px;
 }
 .post-title{
  font-weight: bold;
  font-size:25px;
 }
 .p-tag p{
  font-size:18px;
 }
 
 
 
    
    
    </style>
  </head>
  <body><br>
  <div class="container">
        <div class="row justify-content-md-center">
            <div>
                 <h1 class="text-center"><span class="text-primary">tech</span><span class="text-danger">blog</span></h1>
                
            </div>
        </div>
    </div>
  
<!--   *************************  starting nav bar ******************** -->
            <div class="row justify-content-md-center">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#"></a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="../">Home <span class="sr-only">(current)</span></a>
      </li>
      <?php   $query = "SELECT * FROM categories ";
       global $connection;
                        $select_category = mysqli_query($connection,$query);
                             while($row=mysqli_fetch_assoc($select_category)){
                                $cat_id = $row['cat_id'];
                                  $cat_title = $row['cat_title'];  
                                   ?>
      <li class="nav-item">
        <a class="nav-link" href="../category/<?php echo $cat_id ; ?>"><?php echo $cat_title; ?></a>
      </li>
      <?php } ?>
      
    </ul>
<!--
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
-->
  </div>
</nav>
    </div>
          <hr>
           <!--   *************************  Ending  nav bar ******************** -->
            
     
    <!--   *************************  slider start ******************** -->
    
      



 
  <script>
    InlineEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
 