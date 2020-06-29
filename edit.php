<?php
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $heading=$_GET['heading'];
    $text=$_GET['text'];
    $image=$_GET['image'];
    
    $sql="UPDATE posts SET heading=? text=? image=? where id=?";
    $stmt=
}