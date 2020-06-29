<?php
session_start();
require_once 'connection.php';
$link = mysqli_connect($host, $user, $password, $database)
    or die("Ошибка " . mysqli_error($link));
$id =  mysqli_real_escape_string($link,$_POST['id'] );
$login = $_SESSION['login'];
$test = "SELECT * FROM people WHERE Login = '$login'";
$points = $_SESSION['points'] - 1;
$result = mysqli_query($link, "UPDATE `people` SET `Points` = '$points' WHERE `people`.`Login` = '$login'"); 
$result = mysqli_query($link, "SELECT * FROM vacancy WHERE `id` = '$id'");
$test_result = mysqli_query($link, "SELECT * FROM people");
//    echo $_SESSION['points'],$_SESSION['password'],$_SESSION['login'],$_SESSION['points'];
$_SESSION['points'] = $points;
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

    <div class="container row">
    </div>
    <div class="header">
        <div class="container">
            <div class="row header-row">
                <a href="../reg.php" class="col-lg-3 logo">
                    JoBest
</a>
                <div class="col-lg-3 header-categories">Здраствуйте <?php echo $_SESSION['login']  ?></div>
                <div class="col-lg-2 header-categories"> Баланс- <?php echo $_SESSION['points'] ?></div>
                <div href="#" class="col-lg-2 header-categories"><button onclick="replenish()">Пополнить</button>
                    <div id="balance" class="balance ">
                        <a href="php/10points.php" class="balance_price">
                            5 point
</a>
                        <iframe src="https://money.yandex.ru/quickpay/button-widget?targets=10%20points&default-sum=10&button-text=12&any-card-payment-type=on&button-size=m&button-color=black&successURL=http%3A%2F%2Fjobest%2Fphp%2F10points.php&quickpay=small&account=4100115015280290&" width="184" height="36" frameborder="0" allowtransparency="true" scrolling="no"></iframe>
                        <button class="balance_price">
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
                        <div class="col-lg-2  flex">
                            <div class="main-icon">
                                <div class="main-icon-search"> </div>
                            </div>
                            <input type="text" value="Поиск работы" class="main-input">
                        </div>
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
                    <?php
                    if ($result) {
                        $rows = mysqli_num_rows($result);
                        for ($i = 0; $i < $rows; ++$i) {
                            $row = mysqli_fetch_row($result);
                            echo "<form class=\"main-grey-vacancy\">
                               <div class=\"main-vacancy-title\">$row[1]</div>
                               <div class=\"main-vacancy-subtitle\">От $row[2]р до $row[3]р за месяц</div>
                               <div class=\"main-vacancy-description\">$row[4]</div>
                               <!-- row -->
                               <div class=\"main-vacancy-location-title\">$row[7]</div>
                               <div class=\"main-vacancy-location-subtitle\">$row[8]</div>
                               <div class=\"main-vacancy-location-subtitle\">$row[12]</div>
                               <div class=\"main-vacancy-location-subtitle\">$row[13]</div>
                               <input type=\"text\" placeholder=\"Введите свое собщение\" class=\"main-vacancy-actions_input\" name=\"message\">
                               <div class=\"main-vacancy-actions\">
                               <div class=\"row\">
                                   <a href=\"../reg.php\" class=\"col-lg-4 main-vacancy-actions-item\">Отправить сообщение</a>
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