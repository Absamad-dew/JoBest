<?php
session_start();
require_once 'php/connection.php';
$link = mysqli_connect($host, $user, $password, $database)
    or die("Ошибка " . mysqli_error($link));
     $login = $_SESSION;
   if($login == ''){
       header("location:index.php");
   }
$result = mysqli_query($link, "SELECT * FROM vacancy");
$test_result = mysqli_query($link, "SELECT * FROM people");
//    echo $_SESSION['points'],$_SESSION['password'],$_SESSION['login'],$_SESSION['points'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf8mb4_unicode_ci">
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
                <div class="col-lg-3 header-categories">Здраствуйте <?php echo $_SESSION['login']  ?></div>
                <div class="col-lg-2 header-categories"> Баланс- <?php echo $_SESSION['points'] ?></div>
                <div href="#" class="col-lg-2 header-categories"><button onclick="replenish()">Пополнить</button>
                    <div id="balance" class="balance ">
                        <a href="php/10points.php" class="balance_price">
                            5 point
</a>
<iframe src="https://money.yandex.ru/quickpay/button-widget?targets=5%20points&default-sum=5&button-text=12&any-card-payment-type=on&button-size=m&button-color=black&successURL=https%3A%2F%2Fjobest%2Fphp%2F10points.php&quickpay=small&account=4100115015280290&" width="184" height="36" frameborder="0" allowtransparency="true" scrolling="no"></iframe>                        <button class="balance_price">
                            10 points
                        </button>
                        <iframe src="https://money.yandex.ru/quickpay/button-widget?targets=10%20points&default-sum=10&button-text=12&any-card-payment-type=on&button-size=m&button-color=black&successURL=http%3A%2F%2Fjobest%2Fphp%2F10points.php&quickpay=small&account=4100115015280290&" width="184" height="36" frameborder="0" allowtransparency="true" scrolling="no"></iframe>
                        <button class="balance_price">
                            20 points
                        </button>
                        <iframe src="https://money.yandex.ru/quickpay/button-widget?targets=10%20points&default-sum=10&button-text=12&any-card-payment-type=on&button-size=m&button-color=black&successURL=http%3A%2F%2Fjobest%2Fphp%2F10points.php&quickpay=small&account=4100115015280290&" width="184" height="36" frameborder="0" allowtransparency="true" scrolling="no"></iframe>
                    </div>
                </div>
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
                        <form  action="php/search.php" method="POST" class="col-lg-2  flex">
                            <div class="main-icon">
                                <input type="submit" class="main-icon-search"> 
                            </div>
                            <input  type="text" name="search" value="Поиск работы" class="main-input">
                        </form>
                        <div class="col-lg-1"></div>
                        <div class="col-lg-2 main-search-text">в Москве</div>
                        <div class="col-lg-3"></div>
                        <div class="col-lg-1">
                            <div class="main-search-hr "></div>
                        </div>
                        <div class="col-lg-3 flex">
                            <div class="main-icon">
                                <div class="main-icon-people"> </div>
                            </div>
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
                <div class="col-lg-12 main-row-hr">
                    <div class="pink"></div>
                </div>
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
                    if ($result) {
                        $rows = mysqli_num_rows($result);
                        for ($i = 0; $i < $rows; ++$i) {
                            $row = mysqli_fetch_row($result);
                            echo "<form action=\"php/view_post.php\" method=\"POST\" class=\"main-grey-vacancy\">
                               <div class=\"main-vacancy-title\">$row[1]</div>
                               <input value=\"$row[0]\" name=\"id\" class=\"main-vacancy-title no_visible\">
                               <div class=\"main-vacancy-subtitle\">От $row[2]р до $row[3]р за месяц</div>
                               <div class=\"main-vacancy-description\">$row[4]</div>
                               <!-- row -->
                               <div class=\"main-vacancy-location-title\">$row[7]</div>
                               <div class=\"main-vacancy-location-subtitle\">$row[8]</div>
                               <div class=\"main-vacancy-actions\">
                               <div class=\"row\">
                                   <input type=\"submit\" placeholder=\"Откликнуться\" class=\"col-lg-4 main-vacancy-actions-item\">
                                   <a href=\"$row[10]\" class=\"col-lg-4 main-vacancy-actions-item\">Подробнее</a>
                               </div>
                           </div>
                           </form>";
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
    <!-- Пополнение баланса  -->


</body>
<script src="js/index.js"></script>

</html>