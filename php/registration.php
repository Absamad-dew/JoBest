<?php
require_once 'connection.php';
$link = mysqli_connect($host,$user,$password,$database)
   or die("Ошибка ". mysqli_error($link));
   $result = mysqli_query($link, "SELECT * FROM people");
$name = htmlentities(mysqli_real_escape_string($link, $_POST['Name']));
$surname = htmlentities(mysqli_real_escape_string($link, $_POST['Surname']));
$password = htmlentities(mysqli_real_escape_string($link, $_POST['Password']));
echo " $name, $surname, $password";
$result = mysqli_query($link, "INSERT INTO people (Name, Surname, Password) VALUES ('$name','$surname','$password')");
?>