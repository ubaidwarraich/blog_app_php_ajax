<?php

$file=$_FILES['file'];
$fileName=$_FILES['file']['name'];
$fileTmpName=$_FILES['file']['tmp_name'];
$fileSize=$_FILES['file']['size'];
$fileError=$_FILES['file']['error'];
$fileType=$_FILES['file']['type'];

$fileExt=explode('.',$fileName);
$fileActualExtension=strtolower(end($fileExt));
$allowedExt=array('jpg','jpeg','gif','png','pdf');
if(in_array($fileActualExtension,$allowedExt)){
    //check the possibility of errors
    if($fileError==0){
        if($fileSize<7000000)
        {
            $fileNameNew=uniqid('',true).'.'.$fileActualExtension;
            $fileDestination='images/'.$fileName;
          //   moving file from temporary destination to permannent destination in uploads folder
            move_uploaded_file($fileTmpName,$fileDestination);
            header('Location: index.html?success');
        }
        else{
            echo 'your file is too big';
        }
    }
    else{
        echo 'this file has a problem please try again';
    }
}
else{
    echo 'file is not an image';
}