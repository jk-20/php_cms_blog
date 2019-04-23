<?php ob_start(); ?> 
<?php session_start(); ?>
 
 <?php include "../includes/db.php"?>
 <?php include "function.php"?>
 <?php
//if(isset($_SESSION['user_role'])){
   // if($_SESSION['user_role'] !=='admin'){
        //header("Location: ../index.php");
    //}
//}

confirm_login();


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/admin_pannel.css" class="css">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>
   

    

    <title></title>
    


    <!--  -->

    <style>

    </style>


</head>

<body>