<?php
require_once 'php/connection.php';
$link = mysqli_connect($host,$user,$password,$database)
   or die("Ошибка ". mysqli_error($link));
   $result = mysqli_query($link, "SELECT * FROM vacancy");
   $test_result = mysqli_query($link, "SELECT * FROM people");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/grid.min.css">
    <link rel="stylesheet" href="sass/index.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
</head>
<body>
<div class="container row">
<div class="authorization-visible" id="authorization">
    <form action="" method="POST" class="authorization">
    <div class="row">
        <div class="authorization-title col-lg-12">Войти</div>
        <input type="text" class="col-lg-12" placeholder="Эл. адресс" name="adress">
        <input type="password" class="col-lg-12" placeholder="Пароль" name="password">
        </div>
        <input type="submit" class="authorization-input-submit" value="Далее">
    </form>
    <form action="php/registration.php" method="POST" class="authorization">
    <div class="row">
        <div class="authorization-title col-lg-12">Регистрация</div>
        <div class="col-lg-12 row">
        <div class=" authorization-width col-lg-12 flex">
        <input type="text" class="authorization-input-left " placeholder="Имя" name="Name">
        <input type="text" class="authorization-input-right " placeholder="Фамилия" name="Surname">
        </div>
        </div>
        <input type="password" class="col-lg-12" placeholder="Новый пароль" name="Password">
        </div>
        <input type="submit" class="authorization-input-submit" value="Далее">
    </form>
    </div>
</div>
    <div class="header">
        <div class="container">
            <div class="row header-row">
            <div class="col-lg-3 logo">
                    JoBest
                </div>
                <div class="col-lg-2 header-categories">Здраствуйте <?php $_POST['Name'] ?></div>
                <div class="col-lg-2 header-categories">Соискателям</div>
                <div class="col-lg-2 header-categories">Hr журнал</div>
                <div class="col-lg-1"></div>
                <a href="php/posts.php" class="col-lg-2 header-categories header-button">Добавить вакансию</a>
            </div>
        </div>
    </div>
    <main>
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="main-search align-middle col-lg-12">
                    <div class="row align-middle">
                        <div class="col-lg-2  flex">
                            <div class="main-icon"><div class="main-icon-search"> </div></div>
                            <input type="text" value="Поиск работы" class="main-input">
                        </div>
                        <div class="col-lg-1"></div>
                        <div class="col-lg-2 main-search-text">в Москве</div>
                        <div class="col-lg-3"></div>
                        <div class="col-lg-1"><div class="main-search-hr "></div></div>
                        <div class="col-lg-3 flex">
                            <div class="main-icon"><div class="main-icon-people"> </div></div>
                            <div class="main-search-text ">Создать резюме</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row -->

            <!-- start row -->
            <div class="row text-align-center ">
                <div class="col-lg-5 main-row-title">
                Вакансии в Москве
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-2 main-row-subtitle-one">Два вас</div>
                <div class="col-lg-2 main-row-subtitle-two">Рядом</div>
                <div class="col-lg-2 main-row-subtitle-two">Новые</div>
            </div>
            <!-- end row -->
            <div class="row">
            <div class="col-lg-12 main-row-hr"><div class="pink"></div></div>
            </div>
            
        </div>
            <!-- main-container -->
        <div class="main-container container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="day-vacancy">
                        <div class="day-vacancy-pink">
                        <div class="main-icon">
                        <div class="main-container-icon"></div>
                        </div>
                        <div class="day-vacancy-title">Вакансия дня</div>
                        </div>
                    </div>
                    <!-- end pink -->
                    <div class="main-vacancy">
                        <div class="main-vacancy-title">Веб-разработчик</div>
                        <div class="main-vacancy-subtitle">От 45000р до 150000р за месяц</div>
                        <div class="main-vacancy-description">MegaLid - Успешно развивающаяся компания.Основное направление
 разработка и продвижение сервисов кредитования, интернет реклама.
Приглашаем на работу Web - разработчика на проект по созданию
 ( сервиса по подбору кредитов и займов )</div>
                        <div class="row">
                            <div class="col-lg-3 check">
                            <div class="main-vacancy-check flex">
                            <div class="main-vacancy-check-description">Опыт от года</div>
                            <input type="checkbox">
                            </div>
                            </div>

                            <div class="col-lg-3 check">
                            <div class="main-vacancy-check flex">
                            <div class="main-vacancy-check-description">Java Script</div>
                            <input type="checkbox">
                            </div>
                            </div>

                            <div class="col-lg-3 check">
                            <div class="main-vacancy-check flex">
                            <div class="main-vacancy-check-description">Less, Sass</div>
                            <input type="checkbox">
                            </div>
                            </div>

                            <div class="col-lg-3 check">
                            <div class="main-vacancy-check flex">
                            <div class="main-vacancy-check-description">React</div>
                            <input type="checkbox">
                            </div>
                            </div>
                        </div>
                        <!-- row -->
                        <div class="row">
                            <div class="col-lg-3 main-vacancy-conditions">Неполный день</div>
                            <div class="col-lg-3 main-vacancy-conditions">Удаленная работа</div>
                        </div>
                        <div class="main-vacancy-location-title">World Nails</div>
                        <div class="main-vacancy-location-subtitle">г. Москва, Планетная улица </div>
                        <div class="main-vacancy-actions">
                        <div class="row">
                            <button class="col-lg-4 main-vacancy-actions-item">Откликнуться</button>
                            <button class="col-lg-4 main-vacancy-actions-item">Подробнее</button>
                        </div>
                    </div>
                    </div>
                    <?php
                       if($result)
                       {
                           $rows = mysqli_num_rows($result);
                           for($i = 0; $i < $rows; ++$i)
                           {
                               $row = mysqli_fetch_row($result);
                               echo "<div class=\"main-grey-vacancy\">
                               <div class=\"main-vacancy-title\">$row[1]</div>
                               <div class=\"main-vacancy-subtitle\">От $row[2]р до $row[3]р за месяц</div>
                               <div class=\"main-vacancy-description\">$row[4]</div>
                               <!-- row -->
                               <div class=\"main-vacancy-location-title\">$row[7]</div>
                               <div class=\"main-vacancy-location-subtitle\">$row[8]</div>
                               <div class=\"main-vacancy-actions\">
                               <div class=\"row\">
                                   <a href=\"$row[9]\" class=\"col-lg-4 main-vacancy-actions-item\">Откликнуться</a>
                                   <a href=\"$row[10]\" class=\"col-lg-4 main-vacancy-actions-item\">Подробнее</a>
                               </div>
                           </div>
                           </div>";
                           }
                           
                       }
                       ?>
                   
                </div>
                <!-- sidebar -->
                <!-- <div class="col-lg-1"></div> -->
                <div class="col-lg-3 sidebar">
                    <div class="sidebar-title">Район для поиска</div>
                    <input type="text" value="Москва" class="sidebar-citi-input">
                    <div class="flex">
                        <div class="">Ищу не далее </div>
                        <div class=" sidebar-zp ">15км</div>
                    </div>
                    <input type="range" name="" id="">
                    <div class="sidebar-text-item">Категория</div>
                    <input type="text" value="Выберите категорию" class="sidebar-citi-input">
                    <div class="flex">
                        <div class="">Зарплата от </div>
                        <div class=" sidebar-zp ">Не важно</div>
                    </div>
                    <div class="sidebar-time">
                    <input type="radio" name="time" id="">
                    <input type="radio" name="time" id="">
                    <input type="radio" name="time" id="">
                    </div>
                    <div class="sidebar-text-item">Удаленная работа</div>
                    <input type="text" value="Выберите вид работы" class="sidebar-citi-input">
                    <div class="sidebar-text-item">График</div>
                    <div class="row">
                    <input type="checkbox" class="col-lg-2 sidebar-checkbox" name="" id="">
                    <div class="sidebar-checkbox-text">Неполный рабочий день</div>
                    </div>
                    <div class="row">
                    <input type="checkbox" class="col-lg-2 sidebar-checkbox" name="" id="">
                    <div class="sidebar-checkbox-text">Вахтовый метод</div>
                    </div>
                    <div class="sidebar-text-item">Условия работы</div>
                    <div class="row">
                    <input type="checkbox" class="col-lg-2 sidebar-checkbox" name="" id="">
                    <div class="sidebar-checkbox-text">Без опыта</div>
                    </div>
                    <div class="row">
                    <input type="checkbox" class="col-lg-2 sidebar-checkbox" name="" id="">
                    <div class="sidebar-checkbox-text">Можно до 18</div>
                    </div> 

                </div>
            </div>
        </div>
    </main>

</body>
<script src="js/index.js"></script>
</html>