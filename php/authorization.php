<?php
require_once 'connection.php';
$link = mysqli_connect($host,$user,$password,$database)
   or die("Ошибка ". mysqli_error($link));
   $result = mysqli_query($link, "SELECT * FROM vacancy");
   $test_result = mysqli_query($link, "SELECT * FROM people");
   $uname = mysqli_real_escape_string($link,$_POST['Name'] );
   $pass = mysqli_real_escape_string($link,$_POST['Password'] );
   $sql = "SELECT * FROM people WHERE Name = '$uname' AND Password = '$pass'";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
        header("location:../reg.php");
    } else {
        die('Не правильно введен логин или пароль, попробуйте еще раз ');
    }
?> 