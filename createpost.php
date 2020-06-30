<?php
if(isset($_GET['heading'])){
    require 'config.php';
    $heading=$_GET['heading'];
    $text=$_GET['text'];
    $image=$_GET['image'];
    
    $sql="INSERT INTO posts (heading,text,image) VALUES(?,?,?);";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
      echo 'record not added sql error';
      exit();
    }
    else{
      mysqli_stmt_bind_param($stmt,"sss",$heading,$text,$image);
      if(mysqli_stmt_execute($stmt)){
         mysqli_stmt_store_result($stmt);
         if(mysqli_stmt_num_rows($stmt) == 1){
            mysqli_stmt_close($stmt);
           }
        }
    }
}