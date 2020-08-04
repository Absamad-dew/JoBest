<?php
session_start();
require_once 'connection.php';
$link = mysqli_connect($host,$user,$password,$database)
   or die("Ошибка ". mysqli_error($link));
   $result = mysqli_query($link, "SELECT * FROM response");
$text_response   = htmlentities(mysqli_real_escape_string($link, $_POST['message']));
$email = htmlentities(mysqli_real_escape_string($link, $_POST['email']));
$login = $_SESSION['login'];
$login_response = htmlentities(mysqli_real_escape_string($link, $_POST['login_vacancy']));
$result = mysqli_query($link, "INSERT INTO `response` ( `response`, `email`, `login`, `response_login`) VALUES ( '$text_response ', '$email', '$login_response', '$login' )");

?>
<?php
        header("location:../reg.php");
        