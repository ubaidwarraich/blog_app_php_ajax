<?php
if(isset($_GET['id'])){
    require 'config.php';
    $sql = "DELETE FROM posts WHERE id=".$_GET['id']."";

if ($conn->query($sql)) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}
}