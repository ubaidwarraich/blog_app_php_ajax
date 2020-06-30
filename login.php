<?php

if(isset($_POST['login'])){
    if($_POST['username']=='admin' && $_POST['password']=='admin'){
        header('Location: index.php');
        exit();
    }
    else{
        header("Location: login.php?userNotfound");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      form{
          /* border:black 1px solid; */
          margin:auto;
          display:flex;
          flex-direction:column;
          align-items:center;
          justify-content:center;
          width:20%;
          height:50%;
      }
      input{
          font-size:23px;
      }
    </style>
    <title>login page</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
    <input type="text" placeholder="enter username" name="username">
    <input type="password" placeholder="enter password" name="password">
    <input type="submit" name="login" value="login">
    </form>
</body>
</html>