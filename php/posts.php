<?php
session_start();
require_once 'connection.php';
$link = mysqli_connect($host,$user,$password,$database)
   or die("Ошибка ". mysqli_error($link));
   $result = mysqli_query($link, "SELECT * FROM vacancy");


?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/grid.min.css">
    <link rel="stylesheet" href="../sass/index.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
</head>
<body>

    <div class="header">
        <div class="container">
            <div class="row header-row">
            <a href="../index.php" class="col-lg-3 logo">
                    JoBest
            </a>
                <div class="col-lg-2 header-categories">Соискателям</div>
                <div class="col-lg-2 header-categories">Работодателям</div>
                <div class="col-lg-2 header-categories">Hr журнал</div>
                <div class="col-lg-1"></div>
                <button onclick="log_in()"  class="col-lg-2 header-categories header-button">Вход на сайт</button>
            </div>
        </div>
    </div>



    <div class="container main-grey-vacancy ">
<div class="" id="authorization">
    <form action="new_posts.php" method="POST" class="authorization">
    <div class="row">
        <div class="authorization-title col-lg-12">Введите данные вакансии</div>
        <input type="text" class="col-lg-12" placeholder="Должность" name="Position">
        <div class=" authorization-width col-lg-12 flex">
        <input type="text" class="authorization-input-left " placeholder="Зп от " name="Salary_from">
        <input type="text" class="authorization-input-right " placeholder="Зп до" name="Salary_up_to">
        </div>
        <input type="text" class="col-lg-12 description" placeholder="Описание " name="Descripton">
        <input type="text" class="col-lg-12 description" placeholder="Название компании " name="Name_company">
        <input type="text" class="col-lg-12 description" placeholder="Адресс" name="Adress">
        <input type="text" class="col-lg-12 description" placeholder="Эл. адресс" name="Email">
        </div>
        <input type="submit" class="authorization-input-submit" value="Добавить">
    </form>

    </div>
</div>

</body>
<script src="js/index.js"></script>
</html>