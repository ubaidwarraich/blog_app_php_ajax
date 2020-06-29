<?php

$host="localhost";
$username="root";
$password="";
$dbname="test";

$conn=mysqli_connect($host,$username,$password,$dbname);
if(!$conn){
    echo mysqli_error();
}