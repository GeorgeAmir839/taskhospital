<?php
session_start();
$host="localhost";
$username="root";
$password="";
$db="taskhospital";
$connect = mysqli_connect($host,$username,$password,$db);
if(!$connect){
    die('error: '.mysqli_connect_error());
}
?>