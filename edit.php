<?php
if(isset($_GET['id'])){
    require 'config.php';
    $id=$_GET['id'];
    $heading=$_GET['heading'];
    $text=$_GET['text'];
    $image=$_GET['image'];
    
    $sql="UPDATE posts SET heading='".$heading."' ,text='".$text."', image='".$image."' where id='".$id."';";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
      } else {
        echo "Error updating record: " . $conn->error;
      }
}