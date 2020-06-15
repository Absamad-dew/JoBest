<?php
session_start();
require_once 'connection.php';
$link = mysqli_connect($host,$user,$password,$database)
   or die("Ошибка ". mysqli_error($link));
   $result = mysqli_query($link, "SELECT * FROM vacancy");
   $test_result = mysqli_query($link, "SELECT * FROM people");
   $uname = mysqli_real_escape_string($link,$_POST['Name'] );
   $pass = mysqli_real_escape_string($link,$_POST['Password'] );
   $login = mysqli_real_escape_string($link,$_POST['Login'] );
   $test = "SELECT * FROM people WHERE Login = '$login'";
   
    $result = $link->query($test);
    $new_result = mysqli_fetch_assoc($result);
    $base_people = mysqli_fetch_assoc($test_result);
    $base_password = $new_result['Password'];
    $testing = password_verify($pass, $base_password);
    $_SESSION['login'] = $login;
    $_SESSION['password'] = $pass;
    $_SESSION['points'] = $base_people['Points'];
    $_SESSION['name'] = $uname;
    if($testing) {
        header("location:../reg.php");
    } else {
        die('Не правильно введен логин или пароль, попробуйте еще раз ');
    }
    
?> 