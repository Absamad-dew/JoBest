<?php
require_once 'connection.php';
$link = mysqli_connect($host,$user,$password,$database)
   or die("Ошибка ". mysqli_error($link));
   $result = mysqli_query($link, "SELECT * FROM vacancy");
$position   = htmlentities(mysqli_real_escape_string($link, $_POST['Position']));
$salary_from   = htmlentities(mysqli_real_escape_string($link, $_POST['Salary_from']));
$salary_up_to = htmlentities(mysqli_real_escape_string($link, $_POST['Salary_up_to']));
$descripton = htmlentities(mysqli_real_escape_string($link, $_POST['Descripton']));
$name_company = htmlentities(mysqli_real_escape_string($link, $_POST['Name_company']));
$adress = htmlentities(mysqli_real_escape_string($link, $_POST['Adress']));
$email = htmlentities(mysqli_real_escape_string($link, $_POST['Email']));

echo " $position,$salary_from,$salary_up_to,$descripton,$name_company,$adress";
$result = mysqli_query($link, "INSERT INTO vacancy ( Title, Start, End, Description, Name, Location ) VALUES ($position,$salary_from,$salary_up_to,$descripton,$name_company,$adress)");
?>