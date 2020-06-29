<?php
session_start();
require_once 'connection.php';
$link = mysqli_connect($host,$user,$password,$database)
   or die("Ошибка ". mysqli_error($link));
    $login = $_SESSION['login'];
   $test = "SELECT * FROM people WHERE Login = '$login'";
   $points = $_SESSION['points'] + 10;
   $result = mysqli_query($link, "UPDATE `people` SET `Points` = '$points' WHERE `people`.`Login` = '$login'"); 

   
    $result = $link->query($test);
    $new_result = mysqli_fetch_assoc($result);
    $base_password = $new_result['Password'];
    $testing = password_verify($pass, $base_password);
   
    $_SESSION['password'] = $pass;
    $_SESSION['points'] = $points;
    $_SESSION['name'] = $uname;
    header("location:../reg.php");

    
?> 