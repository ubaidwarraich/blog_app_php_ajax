<?php 
   require 'config.php';
   $sql="select *from posts";
   $result = $conn->query($sql);

   if (!$result->num_rows > 0) {
       echo 'no data in database';
  }
?>
  <?php include 'header.php';?>
    <div class="wrapper">   
        <?php  while($row = $result->fetch_assoc())
        
        echo '
        <div class="post post-' . $row['id'] . '">
            <div class="heading"><h1>'.$row['heading'].'</h1></div>
            <div class="body">
                <div class="text"><p>'.$row['text'].'
                </p></div>
                <div class="image"><img src="'.$row['image'].'" height="400" width="300" alt=""></div>
            </div>
            <button type="submit" class="edit-btn" name="edit-'.$row['id'].'">EDIT POST</button>
        </div>
        ';
        
        
        ?>
        
    <script src="./script.js"></script>
</body>
</html>